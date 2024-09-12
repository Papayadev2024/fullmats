<div class="w-full" >
 <div class="bg-[#f1f1f1]">
  <div class="h-[600px] flex flex-col relative z-20 pt-[35px] lg:pt-[70px] max-w-6xl mx-auto gap-6 lg:gap-8 px-[5%]">
    
    <h1 class="text-3xl lg:text-6xl font-medium text-center font-Helvetica_Medium">{{ $item->title }}</h1>
   
    <div class="flex flex-col items-center justify-center w-full max-w-4xl mx-auto">
      <h3 class="text-lg text-center font-Helvetica_Light font-normal leading-snug lg:leading-loose">{{ $item->description }}</h3>
    </div>
    
    <div class="flex flex-col items-center justify-center  mx-auto mt-3">
      <a href="{{ $item->link2 }}"
        class="bg-[#FD1F4A] text-base font-Helvetica_Medium text-white text-center px-5 py-3 rounded-3xl flex items-center justify-center"
        type="button">
        {{ $item->botontext2 }}
        <img src="{{ asset('images/img/Vector.png') }}" alt="Icono" class="ml-2">
      </a>
    </div>

  </div>
 </div>
  <div class=" lg:h-[450px]  z-10 max-w-6xl mx-auto -mt-72 flex flex-col items-end justify-end">
    <img class="block h-full  mx-auto object-contain object-bottom "
      src="{{ asset($item->url_image . $item->name_image) }}" alt=""  onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';">
  </div>
</div>
