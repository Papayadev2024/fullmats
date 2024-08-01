<div x-data="{ showAmbiente: false }" @mouseenter="showAmbiente = true" @mouseleave="showAmbiente = false"
  class="flex flex-col relative w-full md:{{ $width }} {{ $bgcolor }}">
  <div class="{{ $bgcolor }} product_container basis-4/5 flex flex-col justify-center relative">
    {{-- @php
      echo json_encode($item->tags);
    @endphp --}}
    <div class="absolute top-2 left-2">
      @if ($item->tags)
        @foreach ($item->tags as $tag)
          <div class="px-4 mb-1">
            <span
              class="block font-semibold text-[8px] md:text-[12px] bg-black py-2 px-2 flex-initial w-24 text-center text-white rounded-[5px] relative top-[18px] z-10"
              style="background-color: {{ $tag->color }}">

              {{ $tag->name }}
            </span>
          </div>
        @endforeach
      @endif

    </div>
    <div>
      <div class="relative flex justify-center items-center h-[300px]">
        @php
          $category = $item->categoria();
        @endphp
        @if ($item->imagen)
          <img x-show="{{ isset($item->imagen_ambiente) }} || !showAmbiente"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            src="{{ asset($item->imagen) }}" alt="{{ $item->name }}"
            class="w-full h-[300px] object-{{ $category->fit }} absolute inset-0"
            onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
        @else
          <img x-show="{{ isset($item->imagen_ambiente) }} || !showAmbiente"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
            class="w-full h-[300px] object-{{ $category->fit }} absolute inset-0" />
        @endif
        @isset($item->imagen_ambiente)


          @if ($item->imagen_ambiente)
            <img x-show="showAmbiente" x-transition:enter="transition ease-out duration-300 transform"
              x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-300 transform"
              x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
              src="{{ asset($item->imagen_ambiente) }}" alt="{{ $item->name }}"
              class="w-full h-[300px] object-cover absolute inset-0"
              onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
          @else
            <img x-show="showAmbiente" x-transition:enter="transition ease-out duration-300 transform"
              x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-300 transform"
              x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
              src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
              class="w-full h-[300px] object-cover absolute inset-0" />
          @endif
        @endisset

      </div>
      <!-- ------ -->
      <div class="addProduct text-center flex justify-center h-0">
        <a href="{{ route('producto', $item->id) }}"
          class="font-semibold text-[16px]  bg-[#006BF6] py-2 px-4 text-center text-white rounded-3xl h-10">
          Ver producto {{ $item->id }}
        </a>
      </div>
    </div>
  </div>
  <a href="{{ route('producto', $item->id) }}">
    <h2 id="h2Container" class="text-base mt-4 text-center font-Inter_Medium tracking-tight  cortartexto tippy"
      title="{{ $item->producto }}">

      {{ mb_strimwidth($item->producto, 0, 50, '...') }}
    </h2>
    <div class="flex content-between flex-row gap-4 items-center justify-center font-Inter_Medium pb-4">
      @if ($item->descuento == 0)
        <span class="text-[#006BF6] text-base font-bold">S/. {{ $item->precio }}</span>
      @else
        <span class="text-[#006BF6] text-base font-bold">S/. {{ $item->descuento }}</span>
        <span class="text-sm text-[#15294C] opacity-60 line-through">S/. {{ $item->precio }}</span>
      @endif
    </div>
  </a>

</div>

<style>
  .cortartexto {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    max-height: 60px;
  }
</style>

<script>
  $(document).ready(function() {
    tippy('.tippy', {
      arrow: true,
      followCursor: true,
      placement: 'right',

    })
  })
</script>
