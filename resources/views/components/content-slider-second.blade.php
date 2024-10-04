<div class="w-full">
    <div class="pt-[136px] pb-[100px] h-[600px] max-h-[700px]" style="background-image: url({{ asset('images/img/portada_fm.webp') }})">
        <div
            class="flex flex-col relative z-20 py-[35px] lg:py-[70px] max-w-4xl mx-auto gap-6 lg:gap-8 px-[5%]">

            <h1 class="text-3xl lg:text-6xl font-medium text-center text-[#FF560A] font-aeoniktrial_bold line-clamp-3 ">{{ $item->title }}</h1>

            <div class="flex flex-col items-center justify-center w-full max-w-4xl mx-auto">
                <h3 class="text-lg text-center font-aeoniktrial_regular font-medium text-white  leading-snug">
                    {{ $item->description }}</h3>
            </div>

            <div class="flex flex-col items-center justify-center  mx-auto mt-3">
                <a href="{{ $item->link2 }}"
                    class="bg-[#FF3D02] text-base font-aeoniktrial_regular font-medium text-white text-center px-5 py-2 rounded-lg flex items-center justify-center"
                    type="button">
                    {{ $item->botontext2 }}
                    <img src="{{ asset('images/img/Vector.png') }}" alt="Icono" class="ml-2">
                </a>
            </div>

        </div>
    </div>
</div>
