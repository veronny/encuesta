@extends('layouts.app') @section('content')

<form class="form-horizontal" method="POST" action="{{ route('guarda_emergencia') }}">
    {{ csrf_field() }}
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="text-md-center">
                <strong>ENCUESTA PARA EVALUAR LA SATISFACCIÓN DE LOS USUARIOS ATENDIDOS EN EL SERVICIO DE EMERGENCIA EN ESTABLECIMIENTOS DEL NIVEL II y III</strong>
            </h4>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DATOS PERSONALES</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Card Tiulo -->
                        <div class="alert alert-primary" role="alert">
                            Estimado usuario (a), estamos interesados en conocer su opinión sobre la calidad de la atención que recibió en el servicio de Emergencia del establecimiento de salud. Sus respuestas son totalmente confidenciales. Agradeceremos su participación.
                        </div>

                        <div class="form-row">
                            <!----- Establecimiento ----->
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="establecimiento">{{ __('Establecimiento de Salud') }}</label>
                                    <input id="establecimiento" type="text" class="form-control @error('establecimiento') is-invalid @enderror" name="establecimiento" value="{{ old('establecimiento') }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <!----- Establecimiento ----->
                            <div class="form-group col-md-3">
                                <label for="">{{ __('Condición del encuestado') }}</label>
                                <select class="form-control" name="condicion" id="condicion" onchange="filterCity();">
                            <option value="0">-- Seleccione --</option>
                            <option value="USUARIO">USUARIO/PACIENTE</option>
                            <option value="ACOMPAÑANTE">ACOMPAÑANTE</option>
                        </select>
                            </div>
                            <!----- edad ----->
                            <div class="form-group col-md-3">
                                <label for="edad">{{ __('edad') }}</label>
                                <input id="edad" type="number" class="form-control @error('edad') is-invalid @enderror" name="edad" value="0" min="10" max="100" autofocus>
                            </div>
                            <!----- sexo ----->
                            <div class="form-group col-md-3">
                                <label for="sexo">{{ __('sexo') }}</label>
                                <select id="sexo" class="form-control" name="sexo">
                                <option>-- Seleccione --</option>
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                            </div>
                            <!----- estudios ----->
                            <div class="form-group col-md-3">
                                <label for="estudios">{{ __('Nivel de estudios') }}</label>
                                <select id="estudios" class="form-control" name="estudios">
                                <option>-- Seleccione --</option>
                                <option>Analfabeto</option>
                                <option>Primaria</option>
                                <option>Secundaria</option>
                                <option>Superior tecnico</option>
                                <option>Superior Universitario</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <!----- seguro ----->
                            <div class="form-group col-md-3">
                                <label for="seguro">{{ __('Tipo de seguro por el cual se atiende') }}</label>
                                <select id="seguro" class="form-control" name="seguro">
                                <option>-- Seleccione --</option>
                                <option>SIS</option>
                                <option>ESSALUD</option>
                                <option>SOAT</option>
                                <option>Ninguno</option>
                                <option>Otro</option>
                            </select>
                            </div>
                            <!----- estudios ----->
                            <div class="form-group col-md-3">
                                <label for="tipo_usuario">{{ __('Tipo de usuario') }}</label>
                                <select id="tipo_usuario" class="form-control" name="tipo_usuario">
                                <option>-- Seleccione --</option>
                                <option>Nuevo (primera atencion)</option>
                                <option>Continuador</option>
                            </select>
                            </div>
                            <!----- estudios ----->
                            <div class="form-group col-md-6">
                                <label for="especialidad">{{ __('Especialidad') }}</label>
                                <input id="especialidad" type="text" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad" value="{{ old('especialidad') }}" autofocus>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- EXPECTATIVAS -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">EXPECTATIVAS</h6>
                    </div>
                    <div class="card-body">
                        <!-- titulo 1 -->
                        <div class="alert alert-warning" role="alert">
                            En primer lugar, califique las expectativas, que se refieren a la IMPORTANCIA que usted le otorga a la atención que espera recibir en el servicio de Emergencia (Nivel II y III). Utilice una escala numérica del 1 al 7.Considere 1 como la menor calificación y 7 como la mayor calificación.
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="border-bottom">
                                    <tr class="small text-uppercase text-muted">
                                        <th width="80%" class="text-left">Pregunta</th>
                                        <th width="1px" class="text-left">1</th>
                                        <th width="1px" class="text-left">2</th>
                                        <th width="1px" class="text-left">3</th>
                                        <th width="1px" class="text-left">4</th>
                                        <th width="1px" class="text-left">5</th>
                                        <th width="1px" class="text-left">6</th>
                                        <th width="1px" class="text-left">7</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- PREGUNTA NRO 1-->
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="small text-muted d-none d-md-block">1. Qué los pacientes sean atendidos inmediatamente a su llegada a emergencia, sin importar su condición socio económica</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta1_1" name="pregunta1" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta1_1" name="pregunta1" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta1_1" name="pregunta1" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta1_1" name="pregunta1" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta1_1" name="pregunta1" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta1_1" name="pregunta1" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta1_1" name="pregunta1" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 2-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">2. Qué la atención en emergencia se realice considerando la gravedad de la salud del paciente
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta2_1" name="pregunta2" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta2_1" name="pregunta2" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta2_1" name="pregunta2" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta2_1" name="pregunta2" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta2_1" name="pregunta2" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta2_1" name="pregunta2" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta2_1" name="pregunta2" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 3-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">3. Qué su atención en emergencia esté a cargo del médico</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta3_1" name="pregunta3" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta3_1" name="pregunta3" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta3_1" name="pregunta3" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta3_1" name="pregunta3" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta3_1" name="pregunta3" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta3_1" name="pregunta3" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta3_1" name="pregunta3" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 4-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">4. Qué el médico mantenga suficiente comunicación con usted o sus familiares para explicarles el seguimiento de su problema de salud</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta4_1" name="pregunta4" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta4_1" name="pregunta4" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta4_1" name="pregunta4" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta4_1" name="pregunta4" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta4_1" name="pregunta4" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta4_1" name="pregunta4" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta4_1" name="pregunta4" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 5-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">5. Qué la farmacia de emergencia cuente con los medicamentos que recetará el médico</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta5_1" name="pregunta5" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta5_1" name="pregunta5" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta5_1" name="pregunta5" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta5_1" name="pregunta5" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta5_1" name="pregunta5" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta5_1" name="pregunta5" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta5_1" name="pregunta5" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 6-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">6. Qué la atención en caja o el módulo de admisión sea rápida</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta6_1" name="pregunta6" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta6_2" name="pregunta6" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta6_3" name="pregunta6" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta6_4" name="pregunta6" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta6_5" name="pregunta6" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta6_6" name="pregunta6" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta6_7" name="pregunta6" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 7-->
                                    <tr class="border-bottom">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">7. Qué la atención para tomarse los análisis de laboratorio sea rápida</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta7_1 " name="pregunta7" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta7_2 " name="pregunta7" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta7_3 " name="pregunta7" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta7_4 " name="pregunta7" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta7_5 " name="pregunta7" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta7_6 " name="pregunta7" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta7_7 " name="pregunta7" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 8-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">8. Qué la atención para tomarse los exámenes radiológicos (radiografías, ecografías, otros) sea rápida</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta8_1" name="pregunta8" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta8_2" name="pregunta8" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta8_3" name="pregunta8" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta8_4" name="pregunta8" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta8_5" name="pregunta8" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta8_6" name="pregunta8" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta8_7" name="pregunta8" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 9-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">9. Qué la atención en la farmacia de emergencia sea rápida
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta9_1" name="pregunta9" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta9_2" name="pregunta9" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta9_3" name="pregunta9" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta9_4" name="pregunta9" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta9_5" name="pregunta9" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta9_6" name="pregunta9" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="pregunta9_7" name="pregunta9" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>º
                                    <!-- PREGUNTA NRO 10-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">10. Qué el médico le brinde el tiempo necesario para contestar sus dudas o preguntas sobre su problema de salud</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta10_1" name="pregunta10" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta10_2" name="pregunta10" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta10_3" name="pregunta10" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta10_4" name="pregunta10" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta10_5" name="pregunta10" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta10_6" name="pregunta10" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta10_7" name="pregunta10" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 11-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">11. Qué durante su atención en emergencia se respete su privacidad</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta11_1" name="pregunta11" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta11_2" name="pregunta11" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta11_3" name="pregunta11" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta11_4" name="pregunta11" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta11_5" name="pregunta11" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta11_6" name="pregunta11" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta11_7" name="pregunta11" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 12-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">12. Qué el médico realice un examen físico completo y minucioso por el problema de salud por el cual será atendido</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta12_1" name="pregunta12" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta12_2" name="pregunta12" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta12_3" name="pregunta12" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta12_4" name="pregunta12" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta12_5" name="pregunta12" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta12_6" name="pregunta12" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta12_7" name="pregunta12" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 13-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">13. Qué el problema de salud por el cual será atendido se resuelva o mejore</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta13_1" name="pregunta13" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta13_2" name="pregunta13" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta13_3" name="pregunta13" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta13_4" name="pregunta13" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta13_5" name="pregunta13" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta13_6" name="pregunta13" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta13_7" name="pregunta13" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 14-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">14. Qué el personal de emergencia le trate con amabilidad, respeto y paciencia</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta14_1" name="pregunta14" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta14_2" name="pregunta14" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta14_3" name="pregunta14" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta14_4" name="pregunta14" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta14_5" name="pregunta14" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta14_6" name="pregunta14" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta14_7" name="pregunta14" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 15-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">15. Qué el personal de emergencia le muestre interés para solucionar cualquier dificultad que se presente durante su atención</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta15_1" name="pregunta15" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta15_2" name="pregunta15" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta15_3" name="pregunta15" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta15_4" name="pregunta15" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta15_5" name="pregunta15" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta15_6" name="pregunta15" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta15_7" name="pregunta15" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 16-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">16. Qué usted comprenda la explicación que el médico le brindará sobre el problema de salud o resultado de la atención</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta16_1" name="pregunta16" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta16_2" name="pregunta16" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta16_3" name="pregunta16" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta16_4" name="pregunta16" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta16_5" name="pregunta16" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta16_6" name="pregunta16" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta16_7" name="pregunta16" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 17-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">17. Qué usted comprenda la explicación que el médico le brindará sobre los procedimientos o análisis que le realizarán</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta17_1" name="pregunta17" style="cursor:pointer" value="1" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta17_2" name="pregunta17" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta17_3" name="pregunta17" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta17_4" name="pregunta17" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta17_5" name="pregunta17" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta17_6" name="pregunta17" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta17_7" name="pregunta17" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 18-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">18. Qué usted comprenda la explicación que el médico le brindará sobre el tratamiento que recibirá: tipo de medicamentos, dosis y efectos adversos</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta18_1" name="pregunta18" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta18_2" name="pregunta18" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta18_3" name="pregunta18" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta18_4" name="pregunta18" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta18_5" name="pregunta18" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta18_6" name="pregunta18" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta18_7" name="pregunta18" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 19-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">19. Qué los carteles, letreros y flechas del servicio de emergencia sean adecuados para orientar a los pacientes</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta19_1" name="pregunta19" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta19_2" name="pregunta19" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta19_3" name="pregunta19" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta19_4" name="pregunta19" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta19_5" name="pregunta19" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta19_6" name="pregunta19" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta19_7" name="pregunta19" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 20-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">20. Qué la emergencia cuente con personal para informar y orientar a los pacientes</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta20_1" name="pregunta20" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta20_2" name="pregunta20" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta20_3" name="pregunta20" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta20_4" name="pregunta20" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta20_5" name="pregunta20" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta20_6" name="pregunta20" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta20_7" name="pregunta20" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 21-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">21. Qué la emergencia cuente con equipos disponibles y materiales necesarios para su atención</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta21_1" name="pregunta21" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta21_2" name="pregunta21" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta21_3" name="pregunta21" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta21_4" name="pregunta21" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta21_5" name="pregunta21" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta21_6" name="pregunta21" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta21_7" name="pregunta21" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 21-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">22. Qué los ambientes del servicio de emergencia sean limpios y cómodos
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta22_1" name="pregunta22" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta22_2" name="pregunta22" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta22_3" name="pregunta22" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta22_4" name="pregunta22" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta22_5" name="pregunta22" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta22_6" name="pregunta22" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="pregunta22_7" name="pregunta22" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PERCEPCIONES COLUMNA -->
            <div class="col-lg-6 mb-4 ">

                <!-- PERCEPCIONES -->
                <div class="card shadow mb-4 ">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">PERCEPCIONES</h6>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            En segundo lugar, califique las percepciones que se refieren a como usted HA RECIBIDO, la atención en el servicio de Emergencia (Nivel II y III). Utilice una escala numérica del 1 al 7. Considere 1 como la menor calificación y 7 como la mayor calificación.
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="border-bottom">
                                    <tr class="small text-uppercase text-muted">
                                        <th width="80%" class="text-left">Pregunta</th>
                                        <th width="1px" class="text-left">1</th>
                                        <th width="1px" class="text-left">2</th>
                                        <th width="1px" class="text-left">3</th>
                                        <th width="1px" class="text-left">4</th>
                                        <th width="1px" class="text-left">5</th>
                                        <th width="1px" class="text-left">6</th>
                                        <th width="1px" class="text-left">7</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- PREGUNTA PERCEPCIONES NRO 1-->
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="small text-muted d-none d-md-block">1. ¿Usted o su familiar fueron atendidos inmediatamente a su llegada a emergencia, sin importar su condición socioeconómica?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta1_1" name="per_pregunta1" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta1_2" name="per_pregunta1" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta1_3" name="per_pregunta1" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta1_4" name="per_pregunta1" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta1_5" name="per_pregunta1" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta1_6" name="per_pregunta1" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta1_7" name="per_pregunta1" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 2-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">2.¿Usted o su familiar fueron atendidos considerando la gravedad de su salud?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta2_1" name="per_pregunta2" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta2_2" name="per_pregunta2" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta2_3" name="per_pregunta2" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta2_4" name="per_pregunta2" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta2_5" name="per_pregunta2" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta2_6" name="per_pregunta2" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta2_7" name="per_pregunta2" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 3-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">3. ¿Su atención en emergencia estuvo a cargo del médico?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta3_1" name="per_pregunta3" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta3_2" name="per_pregunta3" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta3_3" name="per_pregunta3" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta3_4" name="per_pregunta3" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta3_5" name="per_pregunta3" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta3_6" name="per_pregunta3" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta3_7" name="per_pregunta3" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 4-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">4. ¿El médico que lo atendió mantuvo suficiente comunicación con usted o sus familiares para explicarles el seguimiento de su problema de salud?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta4_1" name="per_pregunta4" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta4_2" name="per_pregunta4" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta4_3" name="per_pregunta4" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta4_4" name="per_pregunta4" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta4_5" name="per_pregunta4" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta4_6" name="per_pregunta4" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta4_7" name="per_pregunta4" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 5-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">5. ¿La farmacia de emergencia contó con los medicamentos que recetó el médico?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta5_1" name="per_pregunta5" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta5_2" name="per_pregunta5" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta5_3" name="per_pregunta5" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta5_4" name="per_pregunta5" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta5_5" name="per_pregunta5" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta5_6" name="per_pregunta5" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta5_7" name="per_pregunta5" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 6-->
                                    <tr class="border-bottom">
                                        <td width="80px">
                                            <div class="small text-muted d-none d-md-block">6.¿La atención en caja o el módulo de admisión fue rápida?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta6_1" name="per_pregunta6" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta6_2" name="per_pregunta6" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta6_3" name="per_pregunta6" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta6_4" name="per_pregunta6" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta6_5" name="per_pregunta6" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta6_6" name="per_pregunta6" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta6_7" name="per_pregunta6" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 7-->
                                    <tr class="border-bottom">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">7.¿La atención en el laboratorio de emergencia fue rápida?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta7_1" name="per_pregunta7" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta7_2" name="per_pregunta7" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta7_3" name="per_pregunta7" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta7_4" name="per_pregunta7" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta7_5" name="per_pregunta7" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta7_6" name="per_pregunta7" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta7_7" name="per_pregunta7" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 8-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">8.¿La atención para tomarse exámenes radiológicos fue rápida?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta8_1" name="per_pregunta8" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta8_2" name="per_pregunta8" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta8_3" name="per_pregunta8" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta8_4" name="per_pregunta8" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta8_5" name="per_pregunta8" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta8_6" name="per_pregunta8" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta8_7" name="per_pregunta8" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 9-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">9.¿La atención en la farmacia de emergencia fue rápida?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta9_1" name="per_pregunta9" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta9_2" name="per_pregunta9" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta9_3" name="per_pregunta9" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta9_4" name="per_pregunta9" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta9_5" name="per_pregunta9" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta9_6" name="per_pregunta9" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline ">
                                                <input type="radio" class="form-check-input" id="per_pregunta9_7" name="per_pregunta9" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>º
                                    <!-- PREGUNTA NRO 10-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">10. ¿El médico que le atendió le brindó el tiempo necesario para contestar sus dudas o preguntas sobre su problema de salud?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta10_1" name="per_pregunta10" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta10_2" name="per_pregunta10" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta10_3" name="per_pregunta10" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta10_4" name="per_pregunta10" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta10_5" name="per_pregunta10" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta10_6" name="per_pregunta10" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta10_7" name="per_pregunta10" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 11-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">11.¿Durante su atención en emergencia se respetó su privacidad?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta11_1" name="per_pregunta11" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta11_2" name="per_pregunta11" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta11_3" name="per_pregunta11" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta11_4" name="per_pregunta11" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta11_5" name="per_pregunta11" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta11_6" name="per_pregunta11" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta11_7" name="per_pregunta11" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 12-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">12. ¿El médico que le atendió le realizó un examen físico completo y minucioso por el problema de salud por el cual fue atendido?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta12_1" name="per_pregunta12" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta12_2" name="per_pregunta12" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta12_3" name="per_pregunta12" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta12_4" name="per_pregunta12" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta12_5" name="per_pregunta12" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta12_6" name="per_pregunta12" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta12_7" name="per_pregunta12" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 13-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">13. ¿El problema de salud por el cual usted fue atendido se ha resuelto o mejorado?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta13_1" name="per_pregunta13" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta13_2" name="per_pregunta13" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta13_3" name="per_pregunta13" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta13_4" name="per_pregunta13" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta13_5" name="per_pregunta13" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta13_6" name="per_pregunta13" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta13_7" name="per_pregunta13" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 14-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">14. ¿El personal de emergencia lo trató con amabilidad, respeto y paciencia?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta14_1" name="per_pregunta14" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta14_2" name="per_pregunta14" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta14_3" name="per_pregunta14" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta14_4" name="per_pregunta14" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta14_5" name="per_pregunta14" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta14_6" name="per_pregunta14" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta14_7" name="per_pregunta14" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 15-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">15. ¿El personal de emergencia le mostró interés para solucionar cualquier problema que se presentó durante su atención?
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta15_1" name="per_pregunta15" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta15_2" name="per_pregunta15" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta15_3" name="per_pregunta15" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta15_4" name="per_pregunta15" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta15_5" name="per_pregunta15" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta15_6" name="per_pregunta15" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta15_7" name="per_pregunta15" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 16-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">16. ¿Usted comprendió la explicación que el médico le brindó sobre el problema de salud o resultado de la atención?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta16_1" name="per_pregunta16" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta16_2" name="per_pregunta16" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta16_3" name="per_pregunta16" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta16_4" name="per_pregunta16" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta16_5" name="per_pregunta16" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta16_6" name="per_pregunta16" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta16_7" name="per_pregunta16" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 17-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">17. ¿Usted comprendió la explicación que el médico le brindó sobre los procedimientos o análisis que le realizaron?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta17_1" name="per_pregunta17" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta17_2" name="per_pregunta17" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta17_3" name="per_pregunta17" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta17_4" name="per_pregunta17" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta17_5" name="per_pregunta17" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta17_6" name="per_pregunta17" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta17_7" name="per_pregunta17" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 18-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">18. ¿Usted comprendió la explicación que el médico le brindó sobre el tratamiento que recibió: tipo de medicamentos, dosis y efectos adversos?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta18_1" name="per_pregunta18" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta18_2" name="per_pregunta18" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta18_3" name="per_pregunta18" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta18_4" name="per_pregunta18" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta18_5" name="per_pregunta18" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta18_6" name="per_pregunta18" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta18_7" name="per_pregunta18" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 19-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">19. ¿Los carteles, letreros y flechas del servicio de emergencia le parecen adecuados para orientar a los pacientes?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta19_1" name="per_pregunta19" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta19_2" name="per_pregunta19" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta19_3" name="per_pregunta19" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta19_4" name="per_pregunta19" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta19_5" name="per_pregunta19" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta19_6" name="per_pregunta19" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta19_7" name="per_pregunta19" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 20-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">20. ¿La emergencia contó con personal para informar y orientar a los pacientes?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta20_1" name="per_pregunta20" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta20_2" name="per_pregunta20" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta20_3" name="per_pregunta20" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta20_4" name="per_pregunta20" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta20_5" name="per_pregunta20" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta20_6" name="per_pregunta20" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta20_7" name="per_pregunta20" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 21-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">21. ¿La emergencia contó con equipos disponibles y materiales necesarios para su atención?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta21_1" name="per_pregunta21" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta21_2" name="per_pregunta21" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta21_3" name="per_pregunta21" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta21_4" name="per_pregunta21" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta21_5" name="per_pregunta21" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta21_6" name="per_pregunta21" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta21_7" name="per_pregunta21" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 22-->
                                    <tr class="border-bottom ">
                                        <td width="80px ">
                                            <div class="small text-muted d-none d-md-block">22. ¿Los ambientes del servicio de emergencia estuvieron limpios y cómodos?</div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta22_1" name="per_pregunta22" style="cursor:pointer" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta22_2" name="per_pregunta22" style="cursor:pointer" value="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta22_3" name="per_pregunta22" style="cursor:pointer" value="3">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta22_4" name="per_pregunta22" style="cursor:pointer" value="4">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta22_5" name="per_pregunta22" style="cursor:pointer" value="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta22_6" name="per_pregunta22" style="cursor:pointer" value="6">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="per_pregunta22_7" name="per_pregunta22" style="cursor:pointer" value="7">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12 col-lg-offset-4" style="text-align: center">
            <button type="submit" class="btn btn-lg btn-success">
                Enviar Encuesta
            </button>
        </div>
    </div>

</form>
@endsection