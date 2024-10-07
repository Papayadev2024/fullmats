@extends('components.public.matrix', ['pagina' => ' '])

@section('css_importados')

@stop


@section('content')

  <section
            class='flex relative flex-col justify-center items-center px-[5%] pt-[136px] text-base font-medium min-h-[100px] text-neutral-900'>
            <img loading="lazy" src={{ asset('images/img/portada_fm.webp') }} alt=""
                class="object-cover absolute inset-0 size-full" />     
  </section>

  <main>
    <form id="modal-address" class="!max-w-[600px]" style="display: none; padding: 0">
      @csrf
      <input type="hidden" id="id" name="id" value="">
      <div class="flex flex-col gap-4 p-8">
        <p class="text-gray-500">Nota: En algunos casos podrías no encontrar tu ciudad. Eso quiere decir que no tenemos
          cobertura para dicho lugar.</p>
        <div class="flex flex-col gap-4">
          <div class="flex flex-col gap-4 md:flex-row">
            <div class="basis-1/3 flex flex-col gap-3 z-[45]">
              <label class="font-medium text-sm text-gray-600">Departamento <span class="text-red-500">*</span></label>
              <div>
                <div class="dropdown w-full">
                  <select name="departamento_id" id="departamento_id"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[100%]  pl-3 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 select2-hidden-accessible"
                    required>
                    <option value="">- Seleccione -</option>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="basis-1/3 flex flex-col gap-3 z-[40]">
              <label class="font-medium text-sm text-gray-600">Provincia <span class="text-red-500">*</span></label>
              <div>
                <div class="dropdown-provincia w-full">
                  <select name="provincia_id" id="provincia_id"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[100%]  pl-3 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 select2-hidden-accessible"
                    required>
                    <option value="">- Seleccione -</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="basis-1/3 flex flex-col gap-3 z-[30]">
              <label class="font-medium text-sm text-gray-600">Distrito <span class="text-red-500">*</span></label>
              <div>
                <div class="dropdown-distrito w-full">
                  <select name="distrito_id" id="distrito_id"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[100%] pl-3 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 select2-hidden-accessible"
                    required>
                    <option value="">- Seleccione -</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="flex flex-col gap-3">
            <label for="street" class="font-medium text-sm text-gray-600">Avenida / Calle / Jirón <span
                class="text-red-500">*</span></label>
            <input id="street" type="text" name="street" placeholder="Ingresa el nombre de la calle"
              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-base border-2 border-gray-200 rounded-xl text-gray-700"
              required>
          </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
          <div class="basis-1/3 flex flex-col gap-3">
            <label for="number" class="font-medium text-sm text-gray-600">Número <span
                class="text-red-500">*</span></label>
            <input id="number" name="number" type="text" placeholder="Ingresa el número de la calle"
              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-base border-2 border-gray-200 rounded-xl text-gray-700"
              required>
          </div>

          <div class="basis-2/3 flex flex-col gap-3">
            <label for="description" class="font-medium text-sm text-gray-600">Dpto./ Interior/ Piso/ Lote/ Bloque
              (opcional)</label>
            <input id="description" type="text" name="description" placeholder="Ejem. Casa 3, Dpto 101"
              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-base border-2 border-gray-200 rounded-xl text-gray-700">
          </div>
        </div>
        <button type="submit"
          class="w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Agregar direccion
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </button>
      </div>
    </form>

    <!--  -->
    <section class="font-poppins my-8 md:my-16">
      <div class="flex flex-col gap-12 md:flex-row md:gap-24 w-full md:w-11/12 mx-auto">
        <x-side-section-dashboard :user="$user" />

        <div class="basis-7/12 font-poppins w-11/12 md:w-full mx-auto">
          <div
            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
              <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Mi lista de direcciones</h5>
              <a id="btn-add" href="#modal-address" rel="modal:open"
                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                + Agregar
              </a>
            </div>
            <div class="flow-root">
              <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($addresses as $address)
                  @php
                    $isFree = $address->price->price == 0;
                  @endphp
                  <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                          {{ $address->price->district->province->department->description }},
                          {{ $address->price->district->province->description }},
                          {{ $address->price->district->description }}

                          <span
                            class="inline-flex items-center {{ $isFree ? 'bg-green-100' : 'bg-blue-100' }} {{ $isFree ? 'text-green-800' : 'text-blue-800' }} text-xs font-medium px-2.5 py-0.5 rounded-full dark:{{ $isFree ? 'bg-green-900' : 'bg-blue-900' }} dark:{{ $isFree ? 'text-green-300' : 'text-blue-300' }}">
                            <span class="w-2 h-2 me-1 {{ $isFree ? 'bg-green-500' : 'bg-blue-500' }} rounded-full"></span>
                            {{ $isFree ? 'Gratis' : 'S/. ' . $address->price->price }}
                          </span>
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                          {{ $address->street }} - {{ $address->number }} - {{ $address->description }}
                        </p>
                      </div>
                      <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                          <button id="btn-edit" data-address="{{ $address }}" type="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                            title="Editar direccion" tippy>
                            <i class="fa fa-pen"></i>
                          </button>
                          <button @if (!$address->isDefault) id="btn-default" data-id="{{ $address->id }}" @endif
                            type="button"
                            class="{{ $address->isDefault ? 'text-yellow-400 cursor-default' : 'text-gray-900 hover:text-yellow-400' }} px-3 py-2 text-sm font-medium  bg-white border-t border-b border-gray-200 hover:bg-gray-100  focus:z-10 focus:ring-2 focus:ring-yellow-500 focus:text-yellow-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-yellow-500 dark:focus:text-white"
                            @if (!$address->isDefault) title="Marcar direccion como predeterminado" @endif tippy>
                            <i class="fa fa-star"></i>
                          </button>
                          <button id="btn-delete" data-id="{{ $address->id }}" type="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-red-500 focus:z-10 focus:ring-2 focus:ring-red-500 focus:text-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-red-500 dark:focus:text-white"
                            title="Eliminar direccion" tippy>
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
    const provinces = @json($provinces);
    const districts = @json($districts);

    $('#departamento_id').select2()
    $('#provincia_id').select2()
    $('#distrito_id').select2()

    $('#departamento_id').on('change', function(e) {
      const department_id = this.value
      $('#provincia_id').html('<option value>- Seleccione -</option>')
      $('#distrito_id').html('<option value>- Seleccione -</option>')
      provinces
        .filter((x) => x.department_id == department_id)
        .forEach((x) => {
          const option = $('<option>', {
            value: x.id,
            text: x.description
          })
          $('#provincia_id').append(option)
        })
      $('#provincia_id').select2()
    })

    $('#provincia_id').on('change', function(e) {
      const province_id = this.value
      $('#distrito_id').html('<option value>- Seleccione -</option>')
      districts
        .filter((x) => x.province_id == province_id)
        .forEach((x) => {
          const option = $('<option>', {
            value: x.id,
            text: x.description,
            'price-id': x.price_id
          })
          $('#distrito_id').append(option)
        })
      $('#distrito_id').select2()
    })

    $('#modal-address').on('submit', async (e) => {
      e.preventDefault()
      const request = {
        id: $('#id').val(),
        _token: $('[name="_token"]').val(),
        price_id: $('#distrito_id option:selected').attr('price-id'),
        street: $('#street').val(),
        number: $('#number').val(),
        description: $('#description').val()
      }
      try {
        const res = await fetch("{{ route('address.save') }}", {
          method: 'POST',
          headers: {
            'Content-type': 'application/json',
            'XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
          },
          body: JSON.stringify(request)
        })
        if (!res.ok) throw new Error('Ocurrio un error al guardar la direccion')

        Swal.fire({
          title: `Exito!!`,
          text: `Direccion guardada correctamente`,
          icon: "success",
        });

        location.reload()
      } catch (error) {
        Swal.fire({
          title: `Ups!!`,
          text: error.message,
          icon: "error",
        });
      }
    })

    $(document).on('click', '#btn-delete', async function() {
      const id = $(this).attr('data-id')
      try {
        const result = await Swal.fire({
          title: "Seguro?",
          text: 'Esta accion no se puede revertir',
          showCancelButton: true,
          confirmButtonText: "Eliminar",
          cancelButtonText: `Cancelar`
        })
        if (!result.isConfirmed) return
        const res = await fetch(`/api/address/${id}`, {
          method: 'DELETE',
          headers: {
            'Content-type': 'application/json',
            'XSRF-TOKEN': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
          },
          body: JSON.stringify({
            _token: $('[name="_token"]').val()
          })
        })
        if (!res.ok) throw new Error('Ocurrio un error al guardar la direccion')

        Swal.fire({
          title: `Exito!!`,
          text: `Se ha eliminado la direccion correctamente`,
          icon: "success",
        });

        location.reload()
      } catch (error) {
        Swal.fire({
          title: `Ups!!`,
          text: error.message,
          icon: "error",
        });
      }
    })

    $(document).on('click', '#btn-default', async function() {
      const id = $(this).attr('data-id')
      try {
        const res = await fetch("{{ route('address.markasfavorite') }}", {
          method: 'patch',
          headers: {
            'Content-type': 'application/json',
            'XSRF-TOKEN': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
          },
          body: JSON.stringify({
            _token: $('[name="_token"]').val(),
            id
          })
        })
        if (!res.ok) throw new Error('Ocurrio un error al marcar la direccion como favorita')

        Swal.fire({
          title: `Exito!!`,
          text: `La direccion se marco como favorito`,
          icon: "success",
        });

        location.reload()
      } catch (error) {
        Swal.fire({
          title: `Ups!!`,
          text: error.message,
          icon: "error",
        });
      }
    })

    $(document).on('click', '#btn-edit', function() {
      const data = $(this).data('address')

      $('#id').val(data.id)
      $('#departamento_id')
        .val(data.price.district.province.department.id)
        .trigger('change')
      $('#provincia_id')
        .val(data.price.district.province.id)
        .trigger('change')
      $('#distrito_id')
        .val(data.price.district.id)
        .trigger('change')

      $('#street').val(data.street)
      $('#number').val(data.number)
      $('#description').val(data.description)

      $('#modal-address').modal('show')
    })

    $(document).on('click', '#btn-add', function() {
      const data = $(this).data('address')

      $('#id').val(null)
      $('#departamento_id')
        .val(null)
        .trigger('change')
      $('#street').val(null)
      $('#number').val(null)
      $('#description').val(null)

      $('#modal-address').modal('show')
    })
  </script>


@section('scripts_importados')

  <script>
    const checkbox = document.getElementById("check");
    const bag = document.querySelector(".bag");
    const bodyModalCarrito = document.querySelector(".body");
    let isMenuOpen = false; // Variable para controlar el estado del menú
    const card = document.querySelector(".cartContainer");
    checkbox?.addEventListener("click", checkboxOnClick);

    // Agregar event listener al checkbox para controlar el estado del menú
    function checkboxOnClick() {
      // Cambiar el top del carrito
      const scrollTopPosition = window.scrollY;
      card.style.top = scrollTopPosition + "px";

      isMenuOpen = checkbox.checked;
      if (isMenuOpen) {
        bodyModalCarrito.classList.add("dark");
        bodyModalCarrito.classList.add("overflow-hidden");
        // Agregar el event listener al documento cuando se abre el menú
        document.addEventListener("click", handleDocumentClick);
      } else {
        bodyModalCarrito.classList.remove("dark");
        bodyModalCarrito.classList.remove("overflow-hidden");
        // Quitar el event listener del documento cuando se cierra el menú
        document.removeEventListener("click", handleDocumentClick);
      }
    }

    // Función para manejar el clic en el documento
    function handleDocumentClick(event) {
      // Verificar si el menú está abierto y si el clic no ocurrió dentro del nav ni en el checkbox
      if (isMenuOpen && !bag.contains(event.target) && event.target !== checkbox) {
        bag.classList.add("hidden"); // Ocultar el nav
        checkbox.checked = false; // Desmarcar el checkbox
        bodyModalCarrito.classList.remove("dark");
        bodyModalCarrito.classList.remove("overflow-hidden");
        isMenuOpen = false; // Actualizar el estado del menú
        // Quitar el event listener del documento después de cerrar el menú
        document.removeEventListener("click", handleDocumentClick);
      }
    }

    // Detener la propagación de clics dentro del nav para evitar cerrarlo al hacer clic dentro
    bag.addEventListener("click", function(event) {
      event.stopPropagation(); // Evitar que el clic se propague al documento
    });


    $("#upload_image").change(function() {

      const file = this.files[0];

      if (file) {
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', $('#avatarform input[name="_token"]').val());
        formData.append('id', $('#avatarform input[name="name"]').val());
        $.ajax({

          url: "{{ route('cambiofoto') }}",
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,

          success: function(success) {
            window.location.href = window.location.href;

          },
          error: function(error) {
            console.log(error)
          }

        })
      }

    });
  </script>
@stop

@stop
