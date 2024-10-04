<div class="flex flex-col md:flex-row justify-between bg-[#00152B] h-auto lg:h-[400px]">
  <div class="w-full md:w-1/3 h-full">
    @foreach ($banner as $item)
    <img class="object-contain object-left-top h-28 sm:h-full" src="{{ asset($item['image']) }}" />
    @endforeach
  </div>
  <div class="w-full md:w-2/3 flex flex-col items-start gap-8 justify-center py-10 px-[5%] lg:pl-[8%] ">
    <h2 class="text-[#FF560A] text-3xl lg:text-5xl font-normal font-aeoniktrial_bold !leading-tight max-w-2xl">
      @foreach ($banner as $item)
        {{ $item['title'] }}
      @endforeach
    </h2>
    <h3 class="text-2xl font-medium font-aeoniktrial_light text-white">
      @foreach ($banner as $item)
        {{ $item['description'] }}
      @endforeach
    </h3>
    @foreach ($banner as $item)
      <a href="{{ $item['url_btn'] }}"
        class="bg-[#FF3D02] text-base font-medium text-white text-center font-aeoniktrial_regular px-6 py-2 rounded-lg flex items-center justify-center w-auto"
        type="button">
        {{ $item['title_btn'] }}
      </a>
    @endforeach
  </div>
  {{-- <div class="w-full lg:w-1/2 flex items-end justify-center content-center relative px-[5%] ">
    @foreach ($banner as $item)
      <img src="{{ asset($item['image']) }}" alt="" class="object-contain lg:-mt-24 object-bottom md:h-[400px] lg:h-[450px]">
    @endforeach
  </div> --}}
</div>