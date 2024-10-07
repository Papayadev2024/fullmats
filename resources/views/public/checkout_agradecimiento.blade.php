@extends('components.public.matrix', ['pagina' => ' '])

@section('css_importados')

@stop
<style>
  .fixedWhastapp {
    right: 128px !important;
  }
</style>

@section('content')

  <main>
    <section class="font-aeoniktrial_regular my-12 w-11/12 mx-auto">
      <div class="flex flex-col 2md:flex-row gap-32 md:gap-10 w-11/12 mx-auto items-center justify-center">
        <div class="md:basis-1/2 flex flex-col gap-10 basis-0">
          <x-breadcrumb>
            <x-breadcrumb.item>Orden completada</x-breadcrumb.item>
          </x-breadcrumb>

          <div class="flex md:gap-20">
            <div class="flex justify-between items-center  w-full md:w-auto">
              <x-ecommerce.gateway.container completed="{{ 3 }}">
                <div class="flex flex-col justify-start gap-10 max-w-[600px] mx-auto pt-10 text-center">
                  <div class="font-aeoniktrial_regular flex flex-col gap-4 justify-center items-center">
                    <p class="text-[#6C7275] font-medium text-[20px]">
                      Gracias por tu compra &#127881;
                    </p>
                    <h2 class="font-semibold text-[40px] text-[#151515]">
                      Tu orden ha sido recibida
                    </h2>
                    <p class="font-medium text-[16px] text-[#6C7275]">
                      Código de pedido
                    </p>
                    <p id="codigoPedido" class="font-semibold text-[16px] text-[#141718]">#{{ $code }}</p>
                  </div>

                  <div class="font-aeoniktrial_regular">
                    <div>
                      <div class="flex flex-col 2lg:flex-row pb-5 border-b-[2px] border-[#E8ECEF] gap-5">
                        <div class="w-full basis-5/12" id="itemsCarritoAgradecimientos">

                        </div>



                      </div>
                    </div>

                  </div>
                </div>

                <div class="flex flex-col gap-5">
                  <div>
                    <a href="{{ route('Catalogo.jsx') }}"
                      class="text-white bg-[#ff3d02] w-full py-3 rounded-2xl font-aeoniktrial_regular cursor-pointer font-semibold text-[16px] inline-block text-center">Seguir
                      comprando</a>
                  </div>

                  <div>
                    <a href="{{ route('pedidos') }}"
                      class="text-[#151515] bg-[#FFFFFF] w-full py-3 rounded-2xl font-aeoniktrial_regular cursor-pointer font-semibold text-[16px] inline-block text-center border-[1.5px] border-[#151515]">Historial
                      de compras</a>
                  </div>
                </div>
              </x-ecommerce.gateway.container>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@stop
