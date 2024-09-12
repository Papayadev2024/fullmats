@extends('components.public.matrix', ['pagina' => 'contacto'])

@section('css_importados')

@stop




@section('content')

    <main>

        <section
            class="flex relative flex-col justify-center items-center px-[5%] py-28 text-base font-medium min-h-[345px] text-neutral-900 max-md:py-24">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/1f15375dac970433a2abe3921fa2c31e35c32f7b26a37b841431aaba1861d380?placeholderIfAbsent=true&apiKey=72fae0f4c808496790606e16dad566da"
                alt="" class="object-cover absolute inset-0 size-full opacity-15" />
            <div class="flex relative flex-col max-w-full w-[499px]">
                <h2 class="self-center text-rose-600 font-Helvetica_Medium">FAQs</h2>
                <h3 class="mt-3 text-5xl text-center max-md:max-w-full font-Helvetica_Medium">Centro de ayuda</h3>
                <p class="mt-3 text-lg font-light text-center max-md:max-w-full ">
                    Donec vehicula, lectus vel pharetra semper, justo massa pharetra nunc, non venenatis ante augue quis
                    est.
                </p>
            </div>
        </section>



        <section class="flex flex-col py-12 lg:py-20 font-Helvetica_Light">
            <div class="flex flex-col lg:flex-row gap-10 items-start px-[5%] lg:px-[8%] w-full">
                
                <div class="flex flex-col grow shrink w-full lg:w-2/5">
                    <header class="flex flex-col max-w-full text-neutral-900 w-[488px]">
                        <h1 class="text-5xl font-medium max-md:max-w-full font-Helvetica_Medium">Preguntas frecuentes</h1>
                        <p class="mt-3 text-base font-light max-md:max-w-full">Todo lo que necesitas saber sobre nuestro
                            servicio.</p>
                    </header>

                </div>

                <div class="flex flex-col grow shrink justify-center px-0 w-full lg:w-3/5">
                        <div class="relative px-0 lg:px-6">
                            <div class="mx-auto px-0 lg:px-5">
                                <div class="mx-auto grid max-w-[800px] divide-y divide-neutral-200">
                                  @foreach($faqs as $faq)
                                     <div class="py-3">
                                        <details class="group">
                                            <summary
                                                class="flex cursor-pointer list-none items-center justify-between font-medium">
                                                <span class="text-lg font-Helvetica_Medium text-[#FD1F4A] tracking-normal">
                                                   {{$faq->pregunta}}</span>
                                                <span class="transition group-open:rotate-180">
                                                    <svg width="15" height="15" viewBox="0 0 18 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                                                            stroke="#FD1F4A" stroke-width="3.33333" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </summary>
                                            <p class="group-open:animate-fadeIn mt-3 text-[#111111] font-Helvetica_Light text-base">
                                                {{$faq->respuesta}}
                                            </p>
                                        </details>
                                    </div>
                                  @endforeach  
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </section>

        <section class="px-[5%] lg:px-[8%] mb-10 lg:mb-20">
            <div class="flex flex-col items-center p-8 text-center rounded-sm bg-[#F5F5F7] max-md:px-5">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/1d7149afca12f9df6b222decab2b6aa440fcedd62f3f9103979de6f32ac8d09f?placeholderIfAbsent=true&apiKey=72fae0f4c808496790606e16dad566da"
                    class="object-contain max-w-full aspect-[2.14] w-[120px]" alt="Company logo" />
                <div class="flex flex-col mt-8 max-w-full text-neutral-900 w-[768px]">
                    <h2 class="text-2xl font-medium max-md:max-w-full font-Helvetica_Medium">¿Aún tienes preguntas?</h2>
                    <p class="self-center mt-2 text-base font-light max-md:max-w-full font-Helvetica_Light">¿No encuentras
                        la respuesta que
                        buscas? Por favor chatee con nuestro amigable equipo.</p>
                </div>
                <a href="{{route('contacto')}}"
                    class="gap-2.5  px-4 py-3 tracking-wider mt-8 text-base font-bold text-white bg-rose-600 rounded-3xl min-h-[43px] font-Helvetica_Medium">
                    Ponerse en contacto
                </a>
            </div>
        </section>


    </main>


@section('scripts_importados')
    <script>
        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarEmail(value) {
            console.log(value)
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("El campo email no es válido");
                return false;
            }
            return true;
        }

        $('#formContactos').submit(function(event) {
            // Evita que se envíe el formulario automáticamente
            //console.log('evcnto')

            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarEmail($('#email').val())) {
                return;
            };

            /* console.log(formDataArray); */
            $.ajax({
                url: '{{ route('guardarContactos') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#formContactos')[0].reset();
                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    if (!window.location.href.includes('#formularioenviado')) {
                        window.location.href = window.location.href.split('#')[0] +
                            '#formularioenviado';
                    }

                },
                error: function(error) {
                    const obj = error.responseJSON.message;
                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key][0];
                            Swal.fire({
                                title: error.message,
                                text: e,
                                icon: "error",
                            });
                            flag = true; // Marcar como mostrado
                        }
                    });
                }
            });
        })
    </script>

    <script>
        $(document).ready(function() {


            function capitalizeFirstLetter(string) {
                string = string.toLowerCase()
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        })
        $('#disminuir').on('click', function() {
            console.log('disminuyendo')
            let cantidad = Number($('#cantidadSpan span').text())
            if (cantidad > 0) {
                cantidad--
                $('#cantidadSpan span').text(cantidad)
            }


        })
        // cantidadSpan
        $('#aumentar').on('click', function() {
            console.log('aumentando')
            let cantidad = Number($('#cantidadSpan span').text())
            cantidad++
            $('#cantidadSpan span').text(cantidad)

        })
    </script>

    <script>
        let articulosCarrito = [];


        function deleteOnCarBtn(id, operacion) {
            console.log('Elimino un elemento del carrito');
            console.log(id, operacion)
            const prodRepetido = articulosCarrito.map(item => {
                if (item.id === id && item.cantidad > 0) {
                    item.cantidad -= Number(1);
                    return item; // retorna el objeto actualizado 
                } else {
                    return item; // retorna los objetos que no son duplicados 
                }

            });
            Local.set('carrito', articulosCarrito)
            limpiarHTML()
            PintarCarrito()


        }

        function calcularTotal() {
            let articulos = Local.get('carrito')
            console.log(articulos)
            let total = articulos.map(item => {
                let monto
                if (Number(item.descuento) !== 0) {
                    monto = item.cantidad * Number(item.descuento)
                } else {
                    monto = item.cantidad * Number(item.precio)

                }
                return monto

            })
            const suma = total.reduce((total, elemento) => total + elemento, 0);

            $('#itemsTotal').text(`S/. ${suma} `)

        }

        function addOnCarBtn(id, operacion) {
            console.log('agrego un elemento del cvarrio');
            console.log(id, operacion)

            const prodRepetido = articulosCarrito.map(item => {
                if (item.id === id) {
                    item.cantidad += Number(1);
                    return item; // retorna el objeto actualizado 
                } else {
                    return item; // retorna los objetos que no son duplicados 
                }

            });
            console.log(articulosCarrito)
            Local.set('carrito', articulosCarrito)
            // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
            limpiarHTML()
            PintarCarrito()


        }

        function deleteItem(id) {
            console.log('borrando elemento')
            articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

            Local.set('carrito', articulosCarrito)
            limpiarHTML()
            PintarCarrito()
        }

        var appUrl = <?php echo json_encode($url_env); ?>;
        console.log(appUrl);
        $(document).ready(function() {
            articulosCarrito = Local.get('carrito') || [];

            PintarCarrito();
        });

        function limpiarHTML() {
            //forma lenta 
            /* contenedorCarrito.innerHTML=''; */
            $('#itemsCarrito').html('')


        }



        // function PintarCarrito() {
        //   console.log('pintando carrito ')

        //   let itemsCarrito = $('#itemsCarrito')

        //   articulosCarrito.forEach(element => {
        //     let plantilla = `<div class="flex justify-between bg-white font-Inter_Regular border-b-[1px] border-[#E8ECEF] pb-5">
    //         <div class="flex justify-center items-center gap-5">
    //           <div class="bg-[#F3F5F7] rounded-md p-4">
    //             <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
    //           </div>
    //           <div class="flex flex-col gap-3 py-2">
    //             <h3 class="font-semibold text-[14px] text-[#151515]">
    //               ${element.producto}
    //             </h3>
    //             <p class="font-normal text-[12px] text-[#6C7275]">

    //             </p>
    //             <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
    //               <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span  class="text-[20px]">-</span>
    //               </button>
    //               <div class="w-8 h-8 flex justify-center items-center">
    //                 <span  class="font-semibold text-[12px]">${element.cantidad }</span>
    //               </div>
    //               <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span class="text-[20px]">+</span>
    //               </button>
    //             </div>
    //           </div>
    //         </div>
    //         <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
    //           <p class="font-semibold text-[14px] text-[#151515]">
    //             S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
    //           </p>
    //           <div class="flex items-center">
    //             <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
    //             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    //               <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
    //             </svg>
    //             </button>

    //           </div>
    //         </div>
    //       </div>`

        //     itemsCarrito.append(plantilla)

        //   });

        //   calcularTotal()
        // }






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
                    console.log(success)
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
                        color

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

                    Local.set('carrito', articulosCarrito)
                    let itemsCarrito = $('#itemsCarrito')
                    let ItemssubTotal = $('#ItemssubTotal')
                    let itemsTotal = $('#itemsTotal')
                    limpiarHTML()
                    PintarCarrito()

                },
                error: function(error) {
                    console.log(error)
                }

            })



            // articulosCarrito = {...articulosCarrito , detalleProducto }
        })
        // $('#openCarrito').on('click', function() {
        //   console.log('abriendo carrito ');
        //   $('.main').addClass('blur')
        // })
        // $('#closeCarrito').on('click', function() {
        //   console.log('cerrando  carrito ');

        //   $('.cartContainer').addClass('hidden')
        //   $('#check').prop('checked', false);
        //   $('.main').removeClass('blur')


        // })
    </script>

    <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
