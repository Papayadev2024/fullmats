@extends('components.public.matrix', ['pagina' => 'index'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
@section('content')
  
  <div class="flex flex-col max-w-4xl mx-auto py-12 lg:pt-20 lg:pb-10 gap-10">

        <!-- Primer div -->
        <div class="w-full text-[#151515] flex justify-center items-center font-Helvetica_Medium max-w-2xl mx-auto">
            <div class="w-5/6 flex flex-col gap-5">
                <div class="flex flex-col gap-5 text-center md:text-left">
                    <h1 class="font-semibold font-Helvetica_Medium text-center text-4xl tracking-normal">Crear una cuenta
                    </h1>
                    <p class="text-center text-base font-Helvetica_Light tracking-normal">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="font-bold font-Helvetica_Light text-lg text-[#FD1F4A]">Iniciar
                            Sesión</a>
                    </p>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
                        @csrf
                        <div>
                            <span for="name"
                                class="font-Helvetica_Light font-semibold text-[#111111] text-[15px] tracking-wide">Nombre
                                completo</span>
                            <input type="text" placeholder="Ingresa tu nombre" id="name" name="name"
                                :value="old('name')" required autofocus
                                class="font-Helvetica_Light mt-2 w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <span for="email"
                                class="font-Helvetica_Light font-semibold text-[#111111] text-[15px] tracking-wide">Email</span>
                            <input type="text" placeholder="Tu correo electrónico" id="email" name="email"
                                :value="old('email')" required
                                class="font-Helvetica_Light mt-2 w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative w-full">
                            <!-- Input -->
                            <span for="password"
                                class="font-Helvetica_Light font-semibold text-[#111111] text-[15px] tracking-wide">Contraseña</span>
                            <div class="relative w-full mt-2">
                                <input type="password" placeholder="Tu contraseña" id="password" name="password" required
                                    autocomplete="new-password"
                                    class="font-Helvetica_Light mt-2 w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />

                                <!-- Imagen -->
                                <img src="./images/svg/pass_eyes.svg" alt="password"
                                    class="absolute right-4 top-8 transform -translate-y-1/2 cursor-pointer ojopassWord" />
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative w-full">
                            <!-- Input -->
                            <input type="password" placeholder="Confirma tu contraseña" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password"
                                class="font-Helvetica_Light mt-2 w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                            <!-- Imagen -->
                            <img src="./images/svg/pass_eyes.svg" alt="password"
                                class="absolute right-4 top-8 transform -translate-y-1/2 cursor-pointer ojopassWord_confirmation" />
                            @error('password_confirmation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-3 my-4">
                            <input type="checkbox" id="acepto_terminos"
                                class="w-5 h-5 appearance-none rounded-[0.25rem] border border-solid  outline-none focus:ring-[#CF072C] checked:bg-[#CF072C] text-[#CF072C] focus:ring-0 focus:border-[#CF072C] border-[#CF072C]"
                                required />
                            <label name="newsletter" id="newsletter" class="font-normal text-base font-Helvetica_Light">

                                Acepto la
                                <span class="font-bold text-[#CF072C] cursor-pointer open-modal font-Helvetica_Light"
                                    data-tipo='PoliticaPriv'> Política de
                                    Privacidad</span>
                                y los
                                <span class="font-bold text-[#CF072C] cursor-pointer open-modal font-Helvetica_Light"
                                    data-tipo='terminosUso'>
                                    Términos de Uso
                                </span>
                            </label>
                        </div>

                        <div class="">
                            <input type="submit" value="Crear cuenta"
                                class="text-white bg-[#CF072C] w-full py-3 rounded-2xl cursor-pointer font-Helvetica_Light font-semibold text-base tracking-wider" />
                        </div>
                    </form>
                    <x-validation-errors class="mt-4" />
                </div>
            </div>
        </div>

        <!-- Segundo div -->
        <div>
            <img src= "{{ asset('images/img/fondofwc.png') }}" class="object-contain bg-center w-full h-full">
        </div>

    </div>

  <div id="modaalpoliticas" class="modal modalbanner">
    <div class="p-2" id="modal-content">
      <h1 id="modal-title">MODAL POLITICAS</h1>
      <div id="modal-body-content"></div>
    </div>
  </div>

  <script>
    const politicas = @json($politicas);
    const terminos = @json($terminos);

    $(document).on('click', '.open-modal', function() {
      var tipo = $(this).data('tipo');
      var title = '';
      var content = '';
      console.log(politicas)
      console.log(terminos)

      if (tipo == 'PoliticaPriv') {
        title = 'Política de Privacidad';
        content = politicas.content;
      } else if (tipo == 'terminosUso') {
        title = 'Términos y condiciones';
        content = terminos.content;
      }

      $('#modal-title').text(title);
      $('#modal-body-content').html(content);

      $('#modaalpoliticas').modal({
        show: true,
        fadeDuration: 100
      });
    });

    $(document).on("click", '.ojopassWord', function() {


      var input = $(this).siblings('input');

      // Alterna el tipo de entrada entre 'password' y 'text'
      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }

    })
    $(document).on("click", '.ojopassWord_confirmation', function() {
      var input = $(this).siblings('input');

      // Alterna el tipo de entrada entre 'password' y 'text'
      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }


    })
  </script>

@stop
