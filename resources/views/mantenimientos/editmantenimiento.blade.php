{{--@foreach($datosMantenimientos as $datoMantenimiento)
    @endforeach--}}
@extends('layouts.layoutmaster')
@section('title')
    EDITAR MANTENIMIENTO
@endsection
@section('styles')
    {{--#################### START CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_css')
    {{--#################### END CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--##################### START CAROUSEL CSS #####################--}}
    @include('components.links_css_js.carousel.carousel_css')
    {{--##################### END CAROUSEL CSS #####################--}}

@endsection

{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Editar Mantenimiento')
        {{--<li class="breadcrumb-item">SECCION 3</li>
        <li class="breadcrumb-item">MANTENIMIENTOS</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Registrar Nuevo Mantenimiento</a>
        </li>--}}
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}

@section('hero_cuadro_bienvenida')

@endsection
@section('content')
    @include('components.alerts.alerttre')
    @if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{csrf_field()}}
    <!-- Basic -->

    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">FORMULARIO</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('mantenimiento.update',$datosMantenimientos->mantenimiento_id)}}" method="POST" enctype="multipart/form-data"
                  id="">
                @csrf
                @method('PUT')
                {{-- ############### FORMULARIO EN EL CENTRO ############--}}
                <div class="row push">
                    <div class="col-lg-2">
                        <p class="font-size-sm text-muted">
                            .
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicio_mant">FECHA INCIO MANTENIMIENTO: <span class="text-danger">*</span></label>
                                    <input type="text" class="js-flatpickr form-control bg-white"
                                           id="fecha_inicio_mant"
                                           name="fecha_inicio_mant"
                                           value="{{$datosMantenimientos->fecha_inicio_mant}}"
                                           placeholder="Año-mes-dia"
                                           data-date-format="Y-m-d" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="placa_id_mant">PLACA: <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control"
                                            id="placa_id_mant" name="placa_id_mant"
                                            style="width: 100%;" data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datosvehiculo as $datovehiculo)
                                            <option value="{{$datovehiculo->placa_id}}" {{$datovehiculo->placa_id == $datosMantenimientos->placa_id_mant ? "selected":""}} >
                                                {{$datovehiculo->placa_id}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle_mant">DETALLE MANTENIMIENTO: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control js-maxlength"
                                           maxlength="191" data-always-show="true"
                                           data-placement="top"
                                           name="detalle_mant"
                                           value="{{$datosMantenimientos->detalle_mant}}"
                                           id="detalle_mant" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_mant">TIPO DE MANTENIMIENTO: <span
                                            class="text-danger">*</span></label>
                                    <select class="js-select2 form-control"
                                            id="tipo_mant" name="tipo_mant"
                                            style="width: 100%;" data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($tiposMant as $tipoMant)
                                            <option
                                                value="{{$tipoMant->tipo_mantenimiento_descripcion}}" {{$tipoMant->tipo_mantenimiento_descripcion == $datosMantenimientos->tipo_mant ? "selected":""}}>
                                                {{$tipoMant->tipo_mantenimiento_descripcion}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="empresa_encargada_mant">EMPRESA ENCARGADA: <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control js-maxlength"
                                           maxlength="191" data-always-show="true"
                                           data-placement="top"
                                           name="empresa_encargada_mant"
                                           value="{{$datosMantenimientos->empresa_encargada_mant}}"
                                           id="empresa_encargada_mant" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_fin_mant">FECHA FIN MANTENIMIENTO (opcional al crear): </label>
                                    <input type="text" class="js-flatpickr form-control bg-white"
                                           id="fecha_fin_mant"
                                           @if (empty($datosMantenimientos))
                                                value=""
                                               @else
                                               value="{{$datosMantenimientos->fecha_fin_mant}}"
                                           @endif
                                           name="fecha_fin_mant" placeholder="Año-mes-dia"
                                           data-date-format="Y-m-d">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="justify-content-center">IMAGEN ANTES (opcional)</h3>
                                <div class="row">
                                    <div class="col" data-toggle="appear" data-class="animated zoomIn">
                                        <!-- Team Member -->
                                        <div class="block">
                                            <div class="block-content">
                                                <img src="{{asset('imagenes_store/mantenimientos/'.$datosMantenimientos->imagen_antes)}}" width="100%"
                                                     height="100%" id="src_imagen_perfil_a"
                                                     class="justify-content-center">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                                       id="input_imagen_perfil_a"
                                                       name="imagen_antes">
                                                <label class="custom-file-label" for="">Carge
                                                    Imagen antes de mant...</label>
                                            </div>
                                        </div>
                                        <!-- END Team Member -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3>IMAGEN DESPUES (opcional)</h3>
                                <div class="row">
                                    <div class="col" data-toggle="appear" data-class="animated zoomIn">
                                        <!-- Team Member -->
                                        <div class="block">
                                            <div class="block-content">
                                                <img src="{{asset('imagenes_store/mantenimientos/'.$datosMantenimientos->imagen_despues)}}" width="100%"
                                                     height="100%" id="src_imagen_perfil_b"
                                                     class="justify-content-center">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                                       id="input_imagen_perfil_b"
                                                       name="imagen_despues">
                                                <label class="custom-file-label" for="">Carge
                                                    Imagen despues de mant...</label>
                                            </div>
                                        </div>
                                        <!-- END Team Member -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8"></div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                            style="float: right; width: 100%">
                                        GUARDAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <p class="font-size-sm text-muted">
                            .
                        </p>
                    </div>
                </div>
            </form>
        </div>
        {{--<div id="mensaje_respuesta_form_subir_devolucion"></div>--}}
        {{--@if(session()->has('alert-success'))
            <div class='alert alert-success d-flex align-items-center' role='alert'>
                <div class='flex-00-auto'>
                    <i class='fa fa-fw fa-check'></i>
                </div>
                <div class='flex-fill ml-3'>
                    <p class='mb-0'>  {{ session()->get('alert-success') }}<a class='alert-link'
                                                                              href='javascript:void(0)'></a>!</p>
                </div>
            </div>
        @endif--}}
        @if (session('status'))
            <div class='alert alert-success d-flex align-items-center' role='alert'>
                <div class='flex-00-auto'>
                    <i class='fa fa-fw fa-check'></i>
                </div>
                <div class='flex-fill ml-3'>
                    <p class='mb-0'>  {{ session('status') }}<a class='alert-link' href='javascript:void(0)'></a>!</p>
                </div>
            </div>
        @endif
    </div>

    <div class="d-none">
        <button type="button" class="js-swal-success btn btn-light push" id="boton_exito">
            <i class="fa fa-check-circle text-success mr-1"></i> Launch Dialog
        </button>
    </div>
@endsection
@section('js_script_import')

    {{--############################ START SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_js')
    {{--############################ END SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--###################### START SCRIPT JS CARROUSEL ####################--}}
    @include('components.links_css_js.carousel.carousel_js')
    {{--###################### END SCRIPT JS CARROUSEL ####################--}}


    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ SCRIPT PERSONAL $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    <script>
        /*###########################################################################################################*/
        $('#input_imagen_perfil_a').change(function (e) {
            var file = e.target.files[0];
            /*$('#nombre_de_archivo_imagen').val(file.name);*/
            var imageType = 'image.*';
            if (!file.type.match(imageType))
                return;
            $reader = "reader";
            $reader = new FileReader();
            $reader.onload = fileOnloada;
            $reader.readAsDataURL(file);
        });

        /*esto de aqui previsulaiza la imagen*/
        function fileOnloada(e) {
            var result = e.target.result;
            $('#src_imagen_perfil_hero_a').attr("src", result);
            $('#src_imagen_perfil_a').attr("src", result);
        }
        /*##########################################################################################################*/
        /*cunado SE CAMBIE EL INPUT FILE DE IMAGEN_PERFIL PARA LA BD CAMBIA EN DOM EN LOS <IMG SRC=[AquiVaLasIMg] >*/
        $('#input_imagen_perfil_b').change(function (e) {
            var file = e.target.files[0];
            /*$('#nombre_de_archivo_imagen').val(file.name);*/
            var imageType = 'image.*';
            if (!file.type.match(imageType))
                return;
            $reader = "reader";
            $reader = new FileReader();
            $reader.onload = fileOnloadb;
            $reader.readAsDataURL(file);
        });

        /*esto de aqui previsulaiza la imagen*/
        function fileOnloadb(e) {
            var result = e.target.result;
            $('#src_imagen_perfil_hero_b').attr("src", result);
            $('#src_imagen_perfil_b').attr("src", result);
        }
        /*##########################################################################################################*/
        function cambioDeNombre() {
            var apellidos = $('#apellidos').val();
            var nombres = $('#nombres').val();
            $('#name_perfil_hero').text(apellidos + " " + nombres);
        }

        /*##########################################################################################################*/
        /*JQUERY PARA ENVIAR FORM DE DATOS VEHÍCULO*/
        /* $('#form_subir_funcionario').submit(function () {
             $.ajax({
                 method: $(this).attr('method'),
                 url: $(this).attr('action'),
                 data: $(this).serialize(),
                 success: function (data) {
                     $('#boton_exito').click();
                     $('#mensaje_respuesta_form_subir_funcionario').append(
                         "<div class='alert alert-success d-flex align-items-center' role='alert'>" +
                         "<div class='flex-00-auto'>" +
                         "<i class='fa fa-fw fa-check'></i>" +
                         "</div>" +
                         "<div class='flex-fill ml-3'>" +
                         "<p class='mb-0'>" + data + " <a class='alert-link' href='javascript:void(0)'></a>!</p>" +
                         "</div>"
                     );
                 }
             });
             return false;
         });*/

    </script>

    {{--#################################################### JAVA SCRIPT PERSONAL############################################################--}}
    <script type="text/javascript">
        /*COMO AVERIGUAR DONDE EN DONDE ESTA NUESTRO PROYECTO, POR EJEMPLO SI ESTAMOS EN localhost/proyecto3/proyectosLaravel/GAmeaAutoParkSys/public
        *   NOS MUESTRA EL URL POR MAS QUE ESTE EN VARIAS DIRECIONES HASTA PUBLIC*/
        var APP_URL = {!! json_encode(url('/')) !!};
        console.log(APP_URL);
    </script>
    {{--########################################################################################################################################--}}
    <script>
        /* $(function () {
             $(document).on('change', '#input_file_image', function () {
                 $('#label_file_image').text($(this).val());
             });
         });*/
    </script>

    {{--##############################$ PREVISUALIZAR IMAGEN DESDE INPUT FILE, EN ESCUCHA $##############################--}}
    <script>
        /* $('#input_file_image').change(function (e) {
             var file = e.target.files[0];

             $('#nombre_de_archivo_imagen').val(file.name);

             var imageType = 'image.*';
             if (!file.type.match(imageType))
                 return;
             $reader = "reader";
             $reader = new FileReader();
             $reader.onload = fileOnload;
             $reader.readAsDataURL(file);
         });

         function fileOnload(e) {
             var result = e.target.result;
             $('#images_file').attr("src", result);
         }*/
    </script>
    {{--#################################################################################--}}
    <script>
        function asignarPlacaIdATodaLaPagina() {
            placavehiculo = $('#placa_id').val();

            $('#placa_id_subida_docs_prop_vehiculo').val(placavehiculo);
            $('#placa_id_subida_imgs_perfil_vehiculo').val(placavehiculo);
            $('#placa_id_subida_docs_renov_vehicular').val(placavehiculo);
            $('#placa_id_subir_seguro').val(placavehiculo);
            $('#placa_id_subida_estado_servicio_vehicular').val(placavehiculo);
        }
    </script>

@endsection

