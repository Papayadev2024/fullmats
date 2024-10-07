@extends('components.public.matrix', ['pagina' => 'index'])

@section('content')

    <section
        class='flex relative flex-col justify-center items-center px-[5%] pt-[136px] text-base font-medium min-h-[100px] text-neutral-900'>
        <img loading="lazy" src={{ asset('images/img/portada_fm.webp') }} alt=""
            class="object-cover absolute inset-0 size-full" />     
    </section>

    <div class="flex flex-col max-w-4xl mx-auto py-12 lg:py-20 gap-10">

        <!-- Primer div -->
        <div class="w-full text-[#151515] flex justify-center items-center font-Helvetica_Medium max-w-2xl mx-auto">
            <div class="w-5/6 flex flex-col gap-5">
                <div class="flex flex-col gap-5 text-center md:text-left">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="font-semibold font-aeoniktrial_bold text-center text-4xl lg:text-5xl tracking-normal">Iniciar Sesión</h1>
                    <p class="text-center text-lg font-aeoniktrial_light tracking-normal">
                        Inicie sesión utilizando los detalles de la cuenta a continuación.
                    </p>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
                        @csrf
                        <div>
                            <span for="email"
                                class="font-aeoniktrial_light font-semibold text-[#111111] text-[15px] tracking-wide">Email</span>
                            <input type="text" placeholder="Correo electrónico" name="email" id="email"
                                type="email" :value="old('email')" required autofocus
                                class="font-aeoniktrial_light w-full mt-2 py-3 px-3 focus:outline-none text-[#ff3d02] placeholder-[#ff3d02] focus:placeholder-[#ff3d02] text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#ff3d02] focus:ring-0" />
                        </div>

                        <div class="relative w-full ">
                            <span for="password"
                                class="font-aeoniktrial_light font-semibold text-[#111111] text-[15px] tracking-wide">Contraseña</span>
                            <input type="password" placeholder="Contraseña" id="password" name="password" required
                                autocomplete="current-password"
                                class="font-aeoniktrial_light mt-2 w-full py-3 px-3 focus:outline-none text-[#ff3d02] placeholder-[#ff3d02] focus:placeholder-[#ff3d02] text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#ff3d02] focus:ring-0" />
                            <!-- Imagen -->
                            <img src="./images/svg/pass_eyes.svg" alt="password"
                                class="absolute right-4 top-11  cursor-pointer ojopassWord" />
                        </div>

                        <div class="flex gap-3 justify-between">
                            <div class="flex flex-row justify-start items-center gap-3">
                                <input type="checkbox" id="acepto_terminos"
                                    class="w-5 h-5 appearance-none rounded-[0.25rem] border border-solid  outline-none focus:ring-[#ff3d02] checked:bg-[#ff3d02] text-[#ff3d02] focus:ring-0 focus:border-[#ff3d02] border-[#ff3d02]" />
                                <label for="acepto_terminos"
                                    class="font-aeoniktrial_light font-semibold text-[#111111] text-[15px] tracking-wide">Acuérdate
                                    de mí
                                </label>
                            </div>

                            <div>
                                <input type="submit" value="Iniciar Sesión"
                                    class="text-white bg-[#ff3d02] px-6 py-3 rounded-2xl cursor-pointer font-aeoniktrial_light font-semibold text-base tracking-wider" />
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3 justify-between mt-4">
                            <p class="text-base font-aeoniktrial_light">No tienes una cuenta aun? <a href="/register"
                                    class="font-aeoniktrial_light font-bold text-[#ff3d02]">Registrate</a>
                            </p>
                            @if (Route::has('password.request'))
                                <div>
                                    <a class="text-base underline hover:no-underline font-aeoniktrial_light font-bold text-[#ff3d02]"
                                        href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </form>
                    <x-validation-errors class="mt-4" />
                </div>
            </div>
        </div>

        <!-- Segundo div -->
        {{-- <div>
            <img src= "{{ asset('images/img/fondofwc.png') }}" class="object-contain bg-center w-full h-full">
        </div> --}}
    </div>

    <script>
        $(document).on("click", '.ojopassWord', function() {


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
