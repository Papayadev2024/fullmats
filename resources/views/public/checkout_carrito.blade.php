@extends('components.public.matrix', ['pagina' => ''])

@section('css_importados')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


@stop
<style>
  .fixedWhastapp {
    right: 128px !important;
  }
</style>

@section('content')

  <section
            class='flex relative flex-col justify-center items-center px-[5%] pt-[136px] text-base font-medium min-h-[100px] text-neutral-900'>
            <img loading="lazy" src={{ asset('images/img/portada_fm.webp') }} alt=""
                class="object-cover absolute inset-0 size-full" />     
  </section>

  <main>
    <section class="font-aeoniktrial_regular font-semibold w-11/12 mx-auto my-8 flex flex-col gap-5">
      <x-breadcrumb>
        <x-breadcrumb.item>Carrito</x-breadcrumb.item>
      </x-breadcrumb>
      {{-- <div>
        <a href="index.html" class="font-normal text-[14px] text-[#6C7275]">Home</a>
        <span>/</span>
        <a href="carrito.html" class="font-semibold text-[14px] text-[#141718]">Carrito</a>
      </div> --}}

      {{-- <div class="flex flex-col">
        <label for="email" class="font-medium text-[12px] text-[#6C7275]">E-mail</label>

        <input id="email" type="email" placeholder="Correo electrónico" required name="email" value=""
          class=" py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
      </div> --}}
      <div class="flex md:gap-20 flex-col  md:flex-row">
        <div class="flex justify-between items-center md:basis-8/12 w-full md:w-auto">
          <x-ecommerce.gateway.container>
            <div class="flex flex-col 2lg:flex-row pb-5  border-[#E8ECEF] gap-5">
              <table>
                <tbody id="itemsCarritoCheck">

                </tbody>
              </table>
            </div>
          </x-ecommerce.gateway.container>
        </div>
        <div class="basis-4/12 flex flex-col justify-start gap-5">
          <h2 class="font-semibold text-[20px] tracking-wide text-[#151515] font-aeoniktrial_bold">
            Resumen de la compra
          </h2>
          <div>
            <div class="flex flex-col gap-5 font-aeoniktrial_regular">
              <div class="text-[#151515] flex justify-between items-center">
                <p class="text-[14px] font-semibold">Subtotal</p>
                <span id="itemSubtotal" class="font-semibold text-[14px]">s/ 114.00</span>
              </div>
              <div class="text-[#151515] flex justify-between items-center">
                <p class="font-semibold text-[20px]">Total</p>
                <span id="itemTotal" class="font-semibold text-[20px]">s/ 0.00</span>
              </div>
              <a id="btnSiguiente" href="/pago"
                class="text-white bg-[#ff3d02] w-full py-3 rounded-xl cursor-pointer tracking-wider font-aeoniktrial_regular font-semibold text-lg inline-block text-center">Siguiente</a>
            </div>
          </div>
        </div>
      </div>
      @if ($destacados->count() > 0)
        <h1 class="text-2xl md:text-3xl font-semibold font-aeoniktrial_regular text-[#323232] mb-2 mt-4">Aprovecha estas ofertas
          especiales
          antes de completar tu compra</h1>
        <div class="relative">

          <div class="swiper-container">
            <div class="swiper-wrapper">
              @foreach ($destacados as $item)
                <div class="swiper-slide">
                  <x-product.container width="w-1/5" bgcolor="bg-[#FFFFFF]" :item="$item" />
                </div>
              @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>

      @endif

    </section>
  </main>
  <style>
    .swiper-horizontal>.swiper-pagination-bullets,
    .swiper-pagination-bullets.swiper-pagination-horizontal,
    .swiper-pagination-custom,
    .swiper-pagination-fraction {
      position: absolute;
      bottom: -50px !important;
      /* Ajusta este valor según sea necesario */
      width: 100%;
      text-align: center;
      /* bottom: 0% !important; */

    }


    .custom-pagination-bullet {
      background: #000;
      /* Cambia el color de los bullets si es necesario */
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 5,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 40,
          },
        },
      });
    });
  </script>


@section('scripts_importados')
  <script>
    $(document).ready(function() {
      calcularTotal()
    });

    // let articulosCarrito = [];
    let checkedRadio = false

    function calcularTotal() {
      console.log('Calculo el total');
      const precioProductos = getTotalPrice()
      $('#itemSubtotal').text(`S/. ${precioProductos.toFixed(2)}`)
      const precioEnvio = getCostoEnvio()
      const total = precioProductos + precioEnvio

      $('#itemTotal').text(`S/. ${total.toFixed(2)} `)
      $('#itemsTotal').text(`S/. ${total.toFixed(2)} `)
    }
    const getTotalPrice = () => {
      const carrito = Local.get('carrito') ?? []
      const productPrice = carrito.reduce((total, x) => {
        let price = Number(x.precio) * x.cantidad
        if (Number(x.descuento)) {
          price = Number(x.descuento) * x.cantidad
        }
        total += price
        return total
      }, 0)
      return productPrice
    }
    const getCostoEnvio = () => {
      if ($('[name="envio"]:checked').val() == 'recojo') return 0
      const priceStr = $('#distrito_id option:selected').attr('data-price')
      const price = Number(priceStr) || 0
      return price
    }

    /*  function deleteOnCarBtn(id, operacion) {
       console.log('Elimino un elemento del cvarrio');
       const prodRepetido = articulosCarrito.map(item => {
         if (item.id === id && item.cantidad > 0) {
           item.cantidad -= Number(1);
           return item; // retorna el objeto actualizado 
         } else {
           return item; // retorna los objetos que no son duplicados 
         }

       });

       Local.set("carrito", articulosCarrito)
       limpiarHTML()
       PintarCarrito()


     } */

    /*  function addOnCarBtn(id, operacion) {

       const prodRepetido = articulosCarrito.map(item => {
         if (item.id === id) {
           item.cantidad += Number(1);
           return item; // retorna el objeto actualizado 
         } else {
           return item; // retorna los objetos que no son duplicados 
         }

       });
       Local.set("carrito", articulosCarrito)
       // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
       limpiarHTML()
       PintarCarrito()


     } */

    /*  function deleteItem(id) {
       articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

       Local.set("carrito", articulosCarrito)
       limpiarHTML()
       PintarCarrito()
     } */

    var appUrl = <?php echo json_encode($url_env); ?>;
    $(document).ready(function() {
      articulosCarrito = Local.get('carrito') || [];

      // PintarCarrito();
    });

    function limpiarHTML() {
      $('#itemsCarrito').html('')
      $('#itemsCarritoCheck').html('')
    }

    $('#btnAgregarCarrito').on('click', function() {
      let url = window.location.href;
      let partesURl = url.split('/')
      let item = partesURl[partesURl.length - 1]
      let cantidad = Number($('#cantidadSpan span').text())
      item = item.replace('#', '')



      // id='nodescuento'


      $.ajax({

        url: `{{ route('carrito.buscarProducto') }}`,
        method: 'POST',
        data: {
          _token: $('input[name="_token"]').val(),
          id: item,
          cantidad

        },
        success: function(success) {
          let {
            producto,
            id,
            descuento,
            precio,
            imagen,
            color
          } = success.data
          let cantidad = Number(success.cantidad)
          let detalleProducto = {
            id,
            producto,
            descuento,
            precio,
            imagen,
            cantidad,
            color,
            tipo_envio: 0
          }
          let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id)
          if (existeArticulo) {
            //sumar al articulo actual 
            const prodRepetido = articulosCarrito.map(item => {
              if (item.id === detalleProducto.id) {
                item.cantidad += Number(detalleProducto.cantidad);
                return item; // retorna el objeto actualizado 
              } else {
                return item; // retorna los objetos que no son duplicados 
              }

            });
          } else {
            articulosCarrito = [...articulosCarrito, detalleProducto]

          }

          localStorage.setItem('carrito', JSON.stringify(articulosCarrito));

          limpiarHTML()
          PintarCarrito()

        },
        error: function(error) {
          console.log(error)
        }

      })
    })
    $('input[type="radio"][name="bordered-radio"]').on('click', function() {
      // Obtener el valor del radio button seleccionado
      const valorSeleccionado = $(this).val();


      articulosCarrito = Local.get('carrito') ?? []
      let carritoCheck = articulosCarrito.map(item => {
        let obj = {
          id: item.id,
          producto: item.producto,
          descuento: item.descuento,
          precio: item.precio,
          imagen: item.imagen,
          cantidad: item.cantidad,
          color: item.color,
          tipo_envio: Number(valorSeleccionado)
        };
        return obj
      })

      Local.set("carrito", carritoCheck)
      checkedRadio = true

      // Hacer algo con el valor seleccionado, por ejemplo, imprimirlo en la consola
      limpiarHTML()
      PintarCarrito()
    });
    $("#btnSiguiente").on('click', function(e) {
      const carrito = Local.get('carrito') ?? []
      if (carrito.length == 0) {
        e.preventDefault()
        Swal.fire({
          title: `Ups!!`,
          text: `Debes agregar al menos un producto al carrito`,
          icon: "error"
        });
      }
    })
  </script>
@stop

@stop
