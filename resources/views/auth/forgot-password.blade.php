@extends('components.public.matrix', ['pagina' => 'index'])

@section('content')
    <div class="flex flex-col max-w-4xl mx-auto py-12 lg:pt-20 lg:pb-10 gap-10">
        <!-- Primer div -->
        <div class="w-full text-[#151515] flex justify-center items-center font-Helvetica_Medium max-w-2xl mx-auto">
            <div class="w-5/6 flex flex-col gap-5">
                <div class="flex flex-col gap-5 text-center md:text-left">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="font-semibold font-Helvetica_Medium text-center text-4xl tracking-normal">Recuperar contraseña</h1>
                    <p class="text-center text-base font-Helvetica_Light tracking-normal">
                        Le enviaremos un correo electrónico para restablecer su contraseña.
                    </p>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
                        @csrf
                        <div>
                            <span for="email" class="font-Helvetica_Light font-semibold text-[#111111] text-[15px] tracking-wide">Email</span>
                            <input type="text" placeholder="Correo electrónico" name="email" id="email"
                                type="email" :value="old('email')" required autofocus
                                class="mt-2 font-Helvetica_Light mt-2 w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                        </div>

                        <div class="">
                            <input type="submit" value="Enviar"
                                class="text-white bg-[#CF072C] w-full px-6 py-3 rounded-2xl cursor-pointer font-Helvetica_Light font-bold text-base tracking-wider" />
                        </div>

                        <div class="flex flex-row justify-center items-centerpx-4">
                            <a href="{{ route('login') }}"
                                class="text-[#CF072C] px-6 py-3 rounded-2xl cursor-pointer font-Helvetica_Light font-semibold text-base tracking-wider">Cancelar</a>
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
@stop
