<div class="flex flex-col md:flex-row justify-between bg-[#EEEEEE] bg-center bg-cover object-cover h-auto lg:h-[500px]"  @foreach ($banner as $item) style="background-image: url('{{ asset($item['image']) }}');"  @endforeach>
  <div class="w-full lg:w-1/2 flex flex-col items-start gap-8 justify-center py-10 px-[5%] lg:pl-[8%] ">
    <h2 class="text-white text-3xl lg:text-5xl font-normal font-Helvetica_Medium !leading-tight">
      @foreach ($banner as $item)
        {{ $item['title'] }}
      @endforeach
    </h2>
    <h3 class="text-lg font-normal font-Helvetica_Light text-white">
      @foreach ($banner as $item)
        {{ $item['description'] }}
      @endforeach
    </h3>
    @foreach ($banner as $item)
      <a href="{{ $item['url_btn'] }}"
        class="bg-[#FD1F4A] text-base font-normal text-white text-center font-Helvetica_Medium px-6 py-3 rounded-3xl flex items-center justify-center w-auto"
        type="button">
        {{ $item['title_btn'] }}
      </a>
    @endforeach
  </div>
  <div class="w-full lg:w-1/2 flex items-end justify-center content-center relative px-[5%] ">
    {{-- @foreach ($banner as $item)
      <img src="{{ asset($item['image']) }}" alt="" class="object-contain lg:-mt-24 object-bottom md:h-[400px] lg:h-[450px]">
    @endforeach --}}
  </div>
</div>