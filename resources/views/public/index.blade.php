@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop

@php
  $bannersBottom = array_filter($banners, function ($banner) {
      return $banner['potition'] === 'bottom' && $banner['url_page'] === 'home';
  });
  $bannerMid = array_filter($banners, function ($banner) {
      return $banner['potition'] === 'mid' && $banner['url_page'] === 'home';
  });
@endphp

<style>
  @media (max-width: 600px) {
    .fixedWhastapp {
      right: 13px !important;
    }
  }
</style>



@section('content')

   <main class="z-[15]">

   @if (count($slider) > 0) 
    <section class="">
      <x-swipper-card :items="$slider" />
    </section>
   @endif

   @if (count($logos) > 0) 
    <section class="w-full px-[5%] py-12 lg:py-20 flex flex-col gap-10">
         <div class="flex flex-col md:flex-row justify-between w-full gap-5 md:gap-10">
            <div class="flex flex-col w-full md:w-1/2">
              <h3 class="text-[#001429] font-aeoniktrial_bold text-3xl md:text-5xl">Explora Nuestras <span class="text-[#FF560A]">Marcas de Pisos</span></h3>
            </div>
            <div class="flex flex-col items-start justify-center gap-3 w-full md:w-1/2">
              <h1 class="text-lg font-medium font-aeoniktrial_regular text-[#001429]">
                Selecciona la marca, modelo y año de tu vehículo para descubrir los pisos que encajan a la perfección. Protege el interior de tu auto con estilo y durabilidad.
              </h1>
              <a href="/catalogo" class="bg-[#FF3D02] text-base font-medium text-white text-center font-aeoniktrial_regular px-6 py-2 rounded-lg flex items-center justify-center w-auto">
                Ver todas las marcas</a>
            </div>
          </div>
          
        <div class="swiper logos flex flex-row w-full">
          <div class="swiper-wrapper">
            @foreach ($logos as $logo)
              <div class="swiper-slide">
                  <img class="h-28 object-contain mx-auto" src="{{ asset($logo->url_image) }}" />
              </div>
            @endforeach
          </div>
        </div>
    </section>
   @endif
 
    {{-- seccion Productos populares  --}}
    @if ($productosPupulares->count() > 0)
      @php
        $productosPorMarca = $productosPupulares->groupBy('valor');
      @endphp
      
      @foreach ($productosPorMarca as $marca => $productos)
        <section>
          <div class="w-full px-[5%] pt-5 pb-5">
            <div class="flex flex-col md:flex-row justify-between w-full gap-3">
              <div class="flex flex-col">
                <h3 class="text-[#001429] font-aeoniktrial_bold text-3xl">Pisos para Autos <span class="text-[#FF560A]">{{ $marca }}</span></h3>
              </div>
              <div class="flex flex-col items-start justify-center">
                <a href="/catalogo" class="bg-[#FF3D02] text-base font-medium text-white text-center font-aeoniktrial_regular px-6 py-2 rounded-lg flex items-center justify-center w-auto">
                  Ver todos
                </a>
              </div>
            </div>
          
              <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 md:flex-row gap-4 mt-5 w-full">
                @foreach ($productos as $item)
                  <x-product.container width="w-1/4" bgcolor="bg-[#FFFFFF]" :item="$item" />
                @endforeach
              </div>
          
          </div>
        </section>
      @endforeach
    @endif
    
    {{-- seccion Gran Descuento  --}}
    @if (count($bannerMid) > 0)
      <section class="mt-5">
        <x-banner-section-cover :banner="$bannerMid" />
      </section>
    @endif


    {{-- seccion Ultimos Productos  --}}
    @if ($ultimosProductos->count() > 0)
      <section>
        <div class="w-full px-[5%] py-14 lg:py-20">
          <div class="flex flex-col md:flex-row justify-between w-full gap-3">
            <div class="flex flex-col">
              <h3 class="text-[#001429] font-aeoniktrial_bold text-3xl">Los Pisos<span class="text-[#FF560A]"> Más Vendidos</span></h3>
            </div>
            <div class="flex flex-col items-start justify-center">
              <a href="/catalogo" class="bg-[#FF3D02] text-base font-medium text-white text-center font-aeoniktrial_regular px-6 py-2 rounded-lg flex items-center justify-center w-auto">
                Ver todos
              </a>
            </div>
          </div>
          @foreach ($ultimosProductos->chunk(4) as $taken)
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 md:flex-row gap-4 mt-5 w-full">
              @foreach ($taken as $item)
                <x-product.container width="w-full" bgcolor="bg-[#FFFFFF]" :item="$item" />
                {{-- <x-productos-card width="w-1/4" bgcolor="bg-[#FFFFFF]" :item="$item" /> --}}
              @endforeach
            </div>
          @endforeach
        </div>
      </section>
    @endif

    
    <section class="flex flex-col lg:flex-row bg-[#001429] gap-6">
      <div class="flex flex-col w-full lg:w-2/5 h-full py-10 lg:py-20 gap-6 pl-[5%]">

          <h3 class="text-white font-aeoniktrial_bold text-3xl">Protegiendo el Interior de
            tu<span class="text-[#FF560A]"> Auto con Estilo</span></h3>

          <p class="text-lg text-left font-aeoniktrial_regular font-medium text-white  leading-snug">
            En FullMats, nos especializamos en ofrecer pisos para autos de alta calidad que combinan protección, 
            estilo y durabilidad. Con años de experiencia en el mercado, trabajamos directamente con los mejores 
            fabricantes para asegurarnos de que cada producto cumpla con los estándares más exigentes.
          </p>

          <p class="text-lg text-left font-aeoniktrial_regular font-medium text-white  leading-snug">
            Nuestro compromiso es ofrecer una experiencia de compra sencilla y personalizada, ayudando a cada 
            cliente a encontrar el piso ideal para su vehículo, sea cual sea la marca o modelo.
          </p>

          <div class="flex flex-col items-start justify-center">
            <a href="/catalogo" class="bg-[#FF3D02] text-base font-medium text-white text-center font-aeoniktrial_regular px-6 py-2 rounded-lg flex items-center justify-center w-auto">
              Nosotros
            </a>
          </div>

          <div class="grid grid-cols-2 lg:grid-cols-3 gap-7 mt-3">
              <div class="flex flex-col gap-1">
                  <h2 class="font-aeoniktrial_regular font-semibold text-white text-5xl">40<span class="text-[#FF560A] font-black font-aeoniktrial_bold pl-1">+</span></h2>
                  <p class="font-aeoniktrial_regular font-medium text-white">Modelos</p>
              </div>
              <div class="flex flex-col gap-1">
                <h2 class="font-aeoniktrial_regular font-semibold text-white text-5xl">15<span class="text-[#FF560A] font-black font-aeoniktrial_bold pl-1">+</span></h2>
                <p class="font-aeoniktrial_regular font-medium text-white">Marcas de auto</p>
              </div>
              <div class="flex flex-col gap-1">
                <h2 class="font-aeoniktrial_regular font-semibold text-white text-5xl">99<span class="text-[#FF560A] font-black font-aeoniktrial_bold pl-1">%</span></h2>
                <p class="font-aeoniktrial_regular font-medium text-white">Clientes satisfechos</p>
            </div>
          </div>
      </div>

      <div class="w-full lg:w-3/5 flex flex-col items-center gap-8 justify-end bg-contain bg-right-top bg-no-repeat" style="background-image: url('{{ asset('images/img/textura_fm.png')}}');">
            <img class="object-bottom" src="{{ asset('images/img/portadaf_fm.png') }}" />
      </div>
    </section>


    {{-- Seccion Blog --}}
    {{-- @if ($blogs->count() > 0)
      <section class="w-full px-[5%] py-7 lg:py-14" data-aos="fade-up">
        <div class="flex flex-col md:flex-row justify-between w-full gap-3">
          <h1 class="text-2xl md:text-3xl font-semibold font-Inter_Medium text-[#323232]">Blog & Eventos</h1>
          <a href="/blog/0" class="flex items-center text-base font-Inter_Medium font-semibold text-[#006BF6]">Ver todos
            las Publicaciones <img src="{{ asset('images/img/arrowBlue.png') }}" alt="Icono" class="ml-2 "></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 mt-14 gap-10 sm:gap-5">
          @foreach ($blogs as $post)
            <x-blog.container-post :post="$post" />
          @endforeach
        </div>

      </section>
    @endif --}}


    {{-- gran descuento --}}
    {{-- @if (count($bannersBottom) > 0)
      <section class="w-full px-[5%] mt-7 lg:mt-10 " data-aos="zoom-out-right">
        <div class="bg-gradient-to-b from-gray-50 to-white flex flex-col md:flex-row justify-between bg-[#EEEEEE]">
          <x-banner-section :banner="$bannersBottom" />
        </div>
      </section>
    @endif --}}
    @if (count($bannersBottom) > 0)
      <section class="mt-16">
        <x-banner-section-cover :banner="$bannersBottom" />
      </section>
    @endif


    {{-- @if ($benefit->count() > 0)
      <section class="py-10 lg:py-13 bg-[#F8F8F8] w-full px[5%]" data-aos="zoom-out-right">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
          @foreach ($benefit as $item)
            <div class="flex flex-col items-center w-full gap-1 justify-center text-center px-[10%] xl:px-[18%]">
              <img src="{{ asset($item->icono) }}" alt="">
              <h4 class="text-xl font-bold font-Inter_Medium"> {{ $item->titulo }} </h4>
              <div class="text-lg leading-8 text-[#444444] font-Inter_Medium">{!! $item->descripcionshort !!}</div>
            </div>
          @endforeach
        </div>
      </section>
    @endif --}}



  </main>



  <!-- Main modal -->
  <div id="modalofertas" class="modal modalbanner">
    <!-- Modal body -->
    <div class="p-1 ">
      <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
    </div>
  </div>


@section('scripts_importados')

  <script>
    let pops = @json($popups);

    function calcularTotal() {
      let articulos = Local.get('carrito')
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

      $('#itemsTotal').text(`S/. ${suma.toFixed(2)} `)

    }
    $(document).ready(function() {
      console.log(pops.length)
      if (pops.length > 0) {
        $('#modalofertas').modal({
          show: true,
          fadeDuration: 100
        })

      }


      $(document).ready(function() {
        articulosCarrito = Local.get('carrito') || [];

        // PintarCarrito();
      });

    })


    var swiper = new Swiper(".logos", {
            slidesPerView: 6,
            spaceBetween: 10,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    
                },
                768: {
                    slidesPerView: 4,
                   
                },
                1024: {
                    slidesPerView: 5,
                },
            },
        });
  </script>


@stop

@stop
