@extends('components.public.matrix', ['pagina' => 'contacto'])

@section('css_importados')

@stop

@section('content')



    <main>

        <section
            class='flex relative flex-col justify-center items-center px-[5%] pt-[136px] text-base font-medium min-h-[100px] text-neutral-900'>
            <img loading="lazy" src={{ asset('images/img/portada_fm.webp') }} alt=""
                class="object-cover absolute inset-0 size-full" />     
        </section>


        <section class="flex flex-col mt-8 lg:mt-16 font-Helvetica_Light">
            <div class="flex flex-wrap gap-10 items-start px-[5%] lg:px-[8%] w-full">
                <div class="flex flex-col grow shrink min-w-[240px] w-[390px] max-md:max-w-full">
                    <header class="flex flex-col max-w-full text-neutral-900 w-[488px]">
                        <h1 class="text-3xl sm:tex-4xl lg:text-5xl font-medium max-md:max-w-full font-aeoniktrial_bold">A nuestro amable equipo le
                            encantaría saber de
                            usted</h1>
                        <p class="mt-3 text-lg font-aeoniktrial_light max-md:max-w-full">Donec vehicula, lectus vel pharetra semper,
                            justo massa pharetra nunc, non venenatis ante augue quis est.</p>
                    </header>
                    <aside class="flex flex-col mt-12 max-w-full w-full max-md:mt-10">
                        <div class="flex flex-col w-full">
                            <h2 class="text-xl font-medium text-[#ff560a] font-aeoniktrial_bold">Horario de oficina</h2>
                            <p class="flex flex-col mt-2 max-w-full text-lg font-aeoniktrial_light text-neutral-900 w-full">
                                @if ($general->schedule)
                                    <span>{{ $general->schedule }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="flex flex-col mt-8 w-full">
                            <h2 class="text-xl font-medium text-[#ff560a] font-aeoniktrial_bold">Nuestra dirección</h2>
                            <div class="flex flex-col mt-2 max-w-full text-lg font-aeoniktrial_light text-neutral-900 w-full">
                                @if ($general->address && is_null($general->inside))
                                    <span>{{ $general->address }}</span>
                                @elseif(is_null($general->address) && $general->inside)
                                    <span>{{ $general->inside }}</span>
                                @elseif($general->address && $general->inside)
                                    <span>{{ $general->address }}, {{ $general->inside }}</span>
                                @endif

                                @if ($general->district && is_null($general->city))
                                    <span>{{ $general->district }}</span>
                                @elseif(is_null($general->district) && $general->city)
                                    <span>{{ $general->city }}</span>
                                @elseif($general->district && $general->city)
                                    <span>{{ $general->district }}, {{ $general->city }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="flex flex-col mt-8 w-full">
                            <h2 class="text-xl font-medium text-[#ff560a] font-aeoniktrial_bold">Ponerse en contacto</h2>
                            <p class="flex flex-col mt-2 max-w-full text-lg font-aeoniktrial_light text-neutral-900 w-full">
                                @if ($general->cellphone)
                                    <a href="tel:+51{{ $general->cellphone }}">{{ $general->cellphone }}</a>
                                @endif

                                @if ($general->office_phone)
                                    <a href="tel:+51{{ $general->office_phone }}">{{ $general->office_phone }}</a>
                                @endif
                            </p>
                        </div>
                    </aside>
                </div>
                <div class="flex flex-col grow shrink justify-center px-0 lg:px-10 min-w-[240px] w-[494px]">
                    <header class="flex flex-col w-full text-neutral-900 max-md:max-w-full">
                        <h2 class="text-3xl font-medium max-md:max-w-full font-aeoniktrial_bold">Ponerse en contacto</h2>
                        <p class="mt-4 text-lg font-aeoniktrial_light max-md:max-w-full">Donec vehicula, lectus vel pharetra semper,
                            justo massa pharetra nunc, non venenatis ante augue quis est.</p>
                    </header>
                    <form class="flex flex-col mt-12 w-full max-md:mt-10 max-md:max-w-full" id="formContactos">
                        <div class="flex flex-wrap gap-4 items-start w-full text-neutral-900 max-md:max-w-full">
                            <div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                                <label for="nombre" class="text-[15px] font-medium font-aeoniktrial_bold">Nombre</label>
                                <input id="nombre" type="text" placeholder="Ingresa tu nombre" name="name"
                                    class="px-4 py-3 mt-1.5 w-full text-base font-aeoniktrial_light bg-white rounded-lg border border-gray-300 border-solid focus:ring-[#ff560a] focus:border-[#ff560a] shadow-sm"
                                    aria-label="Ingresa tu nombre">
                            </div>
                            <div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                                <label for="apellido" class="text-[15px] font-medium font-aeoniktrial_bold">Apellido</label>
                                <input id="apellido" type="text" placeholder="Ingresa tu apellido" name="lastname"
                                    class="px-4 py-3 mt-1.5 w-full text-base font-aeoniktrial_light bg-white rounded-lg border border-gray-300 border-solid focus:ring-[#ff560a] focus:border-[#ff560a] shadow-sm"
                                    aria-label="Ingresa tu apellido">
                            </div>
                        </div>
                        <div class="flex flex-col mt-6 w-full text-neutral-900 max-md:max-w-full">
                            <label for="email" class="text-[15px] font-medium font-aeoniktrial_bold">E-mail</label>
                            <input id="email" type="email" placeholder="Ingresa tu dirección de correo electrónico"
                                name="email"
                                class="px-4 py-3 mt-1.5 w-full text-base font-aeoniktrial_light bg-white rounded-lg border border-gray-300 border-solid focus:ring-[#ff560a] focus:border-[#ff560a] shadow-sm max-md:max-w-full"
                                aria-label="Ingresa tu dirección de correo electrónico">
                        </div>
                        <div class="flex flex-col mt-6 w-full whitespace-nowrap text-neutral-900 max-md:max-w-full">
                            <label for="telefono"
                                class="text-[15px] font-medium max-md:max-w-full font-aeoniktrial_bold">Telefono</label>
                            <input id="telefono" type="tel" placeholder="+51..." name="phone"
                                class="px-4 py-3 mt-1.5 w-full text-base font-aeoniktrial_light bg-white rounded-lg border border-gray-300 border-solid focus:ring-[#ff560a] focus:border-[#ff560a] shadow-sm max-md:max-w-full"
                                aria-label="Ingresa tu número de teléfono">
                        </div>
                        <div class="flex flex-col mt-6 w-full text-neutral-900 max-md:max-w-full">
                            <label for="mensaje"
                                class="text-[15px] font-medium max-md:max-w-full font-aeoniktrial_bold">Escribe un
                                mensaje</label>
                            <textarea id="mensaje" placeholder="Escríbenos tu pregunta aquí" name="message"
                                class="px-4 py-3 mt-1.5 w-full text-base font-aeoniktrial_light bg-white rounded-lg border border-gray-300 border-solid focus:ring-[#ff560a] focus:border-[#ff560a] shadow-sm max-md:max-w-full"
                                rows="3" aria-label="Escribe tu mensaje"></textarea>
                        </div>
                        <div class="flex flex-wrap gap-3 items-center mt-6 w-full max-md:max-w-full">
                            <input type="checkbox" id="privacy-policy" required
                                class="w-5 h-5 bg-white rounded-md border border-gray-300 border-solid text-[#ff560a] focus:ring-0">
                            <label for="privacy-policy"
                                class="text-[15px] font-light text-neutral-900 font-aeoniktrial_light">Usted acepta nuestra
                                amigable política de privacidad.</label>
                        </div>
                        <button type="submit"
                            class="font-aeoniktrial_regular tracking-wider gap-2.5 self-stretch px-4 py-3 mt-8 w-full text-base font-bold text-center text-white bg-[#ff560a] rounded-3xl min-h-[43px] max-md:max-w-full">Enviar
                            mensaje</button>
                    </form>
                </div>
            </div>
            <div class="flex flex-row items-start justify-start">
                {{-- <img loading="lazy" src="{{ asset('images/img/fondofwc.png') }}"
                    class="object-contain self-center mt-10 lg:-mt-20 max-w-full aspect-[1.84] shadow-[-179px_91px_56px_rgba(0,0,0,0)] w-full lg:w-2/3 "
                    alt=""> --}}
            </div>
        </section>

        <section class="flex flex-col py-12 lg:py-20 font-Helvetica_Light">
            <div class="flex flex-col lg:flex-row gap-10 items-start px-[5%] lg:px-[8%] w-full">
                
                <div class="flex flex-col grow shrink w-full lg:w-2/5">
                    <header class="flex flex-col max-w-full text-neutral-900 w-[488px]">
                        <h1 class="text-3xl sm:tex-4xl lg:text-5xl font-medium max-md:max-w-full font-aeoniktrial_bold">Preguntas frecuentes</h1>
                        <p class="mt-3 text-lg font-aeoniktrial_light max-md:max-w-full">Todo lo que necesitas saber sobre nuestro
                            servicio.</p>
                    </header>

                </div>

                <div class="flex flex-col grow shrink justify-center px-0 w-full lg:w-3/5">
                        <div class="relative px-0 lg:px-6">
                            <div class="mx-auto px-0 lg:px-5">
                                <div class="mx-auto grid max-w-[800px] divide-y divide-neutral-200">
                                  @foreach($faqs as $faq)
                                     <div class="py-3">
                                        <details class="group">
                                            <summary
                                                class="flex cursor-pointer list-none items-center justify-between font-medium">
                                                <span class="text-lg font-bold font-aeoniktrial_regular text-[#ff560a] tracking-normal">
                                                   {{$faq->pregunta}}</span>
                                                <span class="transition group-open:rotate-180">
                                                    <svg width="15" height="15" viewBox="0 0 18 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                                                            stroke="#ff560a" stroke-width="3.33333" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </summary>
                                            <p class="group-open:animate-fadeIn mt-3 text-[#111111] font-aeoniktrial_light text-base">
                                                {{$faq->respuesta}}
                                            </p>
                                        </details>
                                    </div>
                                  @endforeach  
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </section>

        <section class="px-[5%] lg:px-[8%] mb-10 lg:mb-20">
            <div class="flex flex-col items-center p-8 text-center rounded-sm bg-[#F5F5F7] max-md:px-5">
                <img loading="lazy"
                    src={{asset('images/img/mensajes.png')}}
                    class="object-contain max-w-full aspect-[2.14] w-[120px]" alt="Company logo" />
                <div class="flex flex-col mt-8 max-w-full text-neutral-900 w-[768px]">
                    <h2 class="text-2xl font-medium max-md:max-w-full font-aeoniktrial_bold">¿Aún tienes preguntas?</h2>
                    <p class="self-center mt-2 text-lg font-light max-md:max-w-full font-aeoniktrial_light">¿No encuentras
                        la respuesta que
                        buscas? Por favor chatee con nuestro amigable equipo.</p>
                </div>
                <a href="{{route('contacto')}}"
                    class="gap-2.5  px-4 py-3 tracking-wider mt-8 text-base font-bold text-white bg-[#ff560a] rounded-3xl min-h-[43px] font-aeoniktrial_regular">
                    Ponerse en contacto
                </a>
            </div>
        </section>

    </main>


@section('scripts_importados')
    <script>
        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarEmail(value) {
            console.log(value)
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("El campo email no es válido");
                return false;
            }
            return true;
        }

        $('#formContactos').submit(function(event) {
            // Evita que se envíe el formulario automáticamente
            //console.log('evcnto')
            let btnEnviar = $('#btnEnviar');
            btnEnviar.prop('disabled', true);
            btnEnviar.text('Enviando...');
            btnEnviar.css('cursor', 'not-allowed');

            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarEmail($('#email').val())) {
                btnEnviar.prop('disabled', false);
                btnEnviar.text('Enviar Mensaje');
                btnEnviar.css('cursor', 'pointer');
                return;
            };


            /* console.log(formDataArray); */
            $.ajax({
                url: '{{ route('guardarContactos') }}',
                method: 'POST',
                data: $(this).serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Enviando...',
                        text: 'Por favor, espere',
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.close(); // Close the loading message
                    $('#formContactos')[0].reset();
                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    if (!window.location.href.includes('#formularioenviado')) {
                        window.location.href = window.location.href.split('#')[0] +
                        '#formularioenviado';
                    }
                    btnEnviar.prop('disabled', false);
                    btnEnviar.text('Enviar Mensaje');
                    btnEnviar.css('cursor', 'pointer');
                },
                error: function(error) {
                    Swal.close(); // Close the loading message
                    const obj = error.responseJSON.message;
                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key][0];
                            Swal.fire({
                                title: error.message,
                                text: e,
                                icon: "error",
                            });
                            flag = true; // Marcar como mostrado
                        }
                    });
                    btnEnviar.prop('disabled', false);
                    btnEnviar.text('Enviar Mensaje');
                    btnEnviar.css('cursor', 'pointer');
                }
            });
        })
    </script>

    <script>
        $(document).ready(function() {


            function capitalizeFirstLetter(string) {
                string = string.toLowerCase()
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        })
        $('#disminuir').on('click', function() {
            console.log('disminuyendo')
            let cantidad = Number($('#cantidadSpan span').text())
            if (cantidad > 0) {
                cantidad--
                $('#cantidadSpan span').text(cantidad)
            }


        })
        // cantidadSpan
        $('#aumentar').on('click', function() {
            console.log('aumentando')
            let cantidad = Number($('#cantidadSpan span').text())
            cantidad++
            $('#cantidadSpan span').text(cantidad)

        })
    </script>
    <script>
        let articulosCarrito = [];


        function deleteOnCarBtn(id, operacion) {
            console.log('Elimino un elemento del carrito');
            console.log(id, operacion)
            const prodRepetido = articulosCarrito.map(item => {
                if (item.id === id && item.cantidad > 0) {
                    item.cantidad -= Number(1);
                    return item; // retorna el objeto actualizado 
                } else {
                    return item; // retorna los objetos que no son duplicados 
                }

            });
            Local.set('carrito', articulosCarrito)
            limpiarHTML()
            PintarCarrito()


        }

        function calcularTotal() {
            let articulos = Local.get('carrito')
            console.log(articulos)
            let total = articulos.map(item => {
                let monto
                if (Number(item.descuento) !== 0) {
                    monto = item.cantidad * Number(item.descuento)
                } else {
                    monto = item.cantidad * Number(item.precio)

                }
                return monto

            })
            const suma = total.reduce((total, elemento) => total + elemento, 0);

            $('#itemsTotal').text(`S/. ${suma} `)

        }

        function addOnCarBtn(id, operacion) {
            console.log('agrego un elemento del cvarrio');
            console.log(id, operacion)

            const prodRepetido = articulosCarrito.map(item => {
                if (item.id === id) {
                    item.cantidad += Number(1);
                    return item; // retorna el objeto actualizado 
                } else {
                    return item; // retorna los objetos que no son duplicados 
                }

            });
            console.log(articulosCarrito)
            Local.set('carrito', articulosCarrito)
            // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
            limpiarHTML()
            PintarCarrito()


        }

        function deleteItem(id) {
            console.log('borrando elemento')
            articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

            Local.set('carrito', articulosCarrito)
            limpiarHTML()
            PintarCarrito()
        }

        var appUrl = <?php echo json_encode($url_env); ?>;
        console.log(appUrl);
        $(document).ready(function() {
            articulosCarrito = Local.get('carrito') || [];

            PintarCarrito();
        });

        function limpiarHTML() {
            //forma lenta 
            /* contenedorCarrito.innerHTML=''; */
            $('#itemsCarrito').html('')


        }



        // function PintarCarrito() {
        //   console.log('pintando carrito ')

        //   let itemsCarrito = $('#itemsCarrito')

        //   articulosCarrito.forEach(element => {
        //     let plantilla = `<div class="flex justify-between bg-white font-Inter_Regular border-b-[1px] border-[#E8ECEF] pb-5">
    //         <div class="flex justify-center items-center gap-5">
    //           <div class="bg-[#F3F5F7] rounded-md p-4">
    //             <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
    //           </div>
    //           <div class="flex flex-col gap-3 py-2">
    //             <h3 class="font-semibold text-[14px] text-[#151515]">
    //               ${element.producto}
    //             </h3>
    //             <p class="font-normal text-[12px] text-[#6C7275]">

    //             </p>
    //             <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
    //               <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span  class="text-[20px]">-</span>
    //               </button>
    //               <div class="w-8 h-8 flex justify-center items-center">
    //                 <span  class="font-semibold text-[12px]">${element.cantidad }</span>
    //               </div>
    //               <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span class="text-[20px]">+</span>
    //               </button>
    //             </div>
    //           </div>
    //         </div>
    //         <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
    //           <p class="font-semibold text-[14px] text-[#151515]">
    //             S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
    //           </p>
    //           <div class="flex items-center">
    //             <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
    //             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    //               <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
    //             </svg>
    //             </button>

    //           </div>
    //         </div>
    //       </div>`

        //     itemsCarrito.append(plantilla)

        //   });

        //   calcularTotal()
        // }






        $('#btnAgregarCarrito').on('click', function() {
            let url = window.location.href;
            let partesURl = url.split('/')
            let item = partesURl[partesURl.length - 1]
            let cantidad = Number($('#cantidadSpan span').text())
            item = item.replace('#', '')



            // id='nodescuento'


            $.ajax({

                url: `{{ route('carrito.buscarProducto') }}`,
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    id: item,
                    cantidad

                },
                success: function(success) {
                    console.log(success)
                    let {
                        producto,
                        id,
                        descuento,
                        precio,
                        imagen,
                        color
                    } = success.data
                    let cantidad = Number(success.cantidad)
                    let detalleProducto = {
                        id,
                        producto,
                        descuento,
                        precio,
                        imagen,
                        cantidad,
                        color

                    }
                    let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id)
                    if (existeArticulo) {
                        //sumar al articulo actual 
                        const prodRepetido = articulosCarrito.map(item => {
                            if (item.id === detalleProducto.id) {
                                item.cantidad += Number(detalleProducto.cantidad);
                                return item; // retorna el objeto actualizado 
                            } else {
                                return item; // retorna los objetos que no son duplicados 
                            }

                        });
                    } else {
                        articulosCarrito = [...articulosCarrito, detalleProducto]

                    }

                    Local.set('carrito', articulosCarrito)
                    let itemsCarrito = $('#itemsCarrito')
                    let ItemssubTotal = $('#ItemssubTotal')
                    let itemsTotal = $('#itemsTotal')
                    limpiarHTML()
                    PintarCarrito()

                },
                error: function(error) {
                    console.log(error)
                }

            })



            // articulosCarrito = {...articulosCarrito , detalleProducto }
        })
        // $('#openCarrito').on('click', function() {
        //   console.log('abriendo carrito ');
        //   $('.main').addClass('blur')
        // })
        // $('#closeCarrito').on('click', function() {
        //   console.log('cerrando  carrito ');

        //   $('.cartContainer').addClass('hidden')
        //   $('#check').prop('checked', false);
        //   $('.main').removeClass('blur')


        // })
    </script>

    <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
