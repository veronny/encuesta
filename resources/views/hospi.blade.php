@extends('layouts.app') @section('content')

<form class="form-horizontal" method="POST" action="{{ route('guarda_hospi') }}">
    {{ csrf_field() }}
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="text-md-center">
                <strong>Evaluación de la Satisfacción del usuario externo en establecimientos de salud del II y III nivel</strong>
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
                            Estimado usuario (a), estamos interesados en conocer su opinión y sugerencias sobre la calidad de la atención que recibió en el servicio de hospitalización del establecimiento de salud. Sus respuestas son totalmente confidenciales. Por favor, sírvase contestar todas las preguntas.
                        </div>

                        <div class="form-row">
                            <!----- Establecimiento ----->
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="establecimiento">{{ __('Establecimiento de Salud') }}</label>
                                    <select class="form-control" name="establecimiento" id="establecimiento">
                                        <option>-- Seleccione --</option>
                                        <optgroup label="RED CHANCHAMAYO">
                                            <option value="00000308">00000308 - HOSPITAL REGIONAL DOCENTE DE MEDICINA TROPICAL DR. JULIO CESAR DEMARINI CARO</option>
                                          </optgroup>
                                          <optgroup label="RED JAUJA">
                                            <option value="00000365">00000365 - HOSPITAL DOMINGO OLAVEGOYA</option>
                                          </optgroup>
                                          <optgroup label="RED JUNIN">
                                             <option value="00000519">00000519 - HOSPITAL	DE APOYO JUNIN</option>
                                          </optgroup>
                                          <optgroup label="NO PERTENECE A NINGUNA RED">
                                              <option value="00000753">00000753 -	HOSPITAL REGIONAL DOCENTE CLINICO QUIRURGICO DANIEL ALCIDES CARRION DE HUANCAYO</option>
                                              <option value="00027857">00027857 -	INSTITUTO REGIONAL DE ENFERMEDADES NEOPLÁSICAS DEL CENTRO - IREN CENTRO</option>
                                              <option value="00006615">00006615 -	REGIONAL DOCENTE MATERNO INFANTIL EL CARMEN</option>
                                          </optgroup>
                                          <optgroup label="RED PICHANAKI">
                                              <option value="00000340">00000340 -	HOSPITAL DE APOYO PICHANAKI</option>
                                          </optgroup>
                                          <optgroup label="RED SAN MARTIN DE PANGOA">
                                              <option value="00000442">00000442 -	HOSPITAL DE APOYO PANGOA</option>
                                          </optgroup>
                                          <optgroup label="RED SATIPO">
                                              <option value="00000432">00000432 -	HOSPITAL DE APOYO MANUEL HIGA ARAKAKI</option>
                                          </optgroup>
                                          <optgroup label="RED TARMA">
                                              <option value="00000520">00000520 -	HOSPITAL DE APOYO FELIX MAYORCA SOTO</option>
                                          </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!----- NOMBRE ----->
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="encuestador">{{ __('Usuario que realiza la encuesta (opcional)') }}</label>
                                    <input id="encuestador" type="text" class="form-control @error('encuestador') is-invalid @enderror" name="encuestador" value="{{ old('encuestador') }}" autofocus>
                                </div>
                            </div>
                            <!----- Fecha ----->
                            <div class="form-group col-md-2">
                                <div class="form-group col-md-12">
                                    <label for="fecha_atencion">{{ __('Fecha') }}</label>
                                    <input id="fecha_atencion" type="date" class="form-control @error('fecha_atencion') is-invalid @enderror" name="fecha_atencion" value="{{ old('fecha_atencion') }}" autofocus>
                                </div>
                            </div>
                            <!----- Hora Inicio ----->
                            <div class="form-group col-md-2">
                                <div class="form-group col-md-12">
                                    <label for="hora_inicio">{{ __('Hora Inicio') }}</label>
                                    <input id="hora_inicio" type="time" class="form-control @error('hora_inicio') is-invalid @enderror" name="hora_inicio" value="{{ old('hora_inicio') }}" autofocus>
                                </div>
                            </div>
                            <!----- Hora Final ----->
                            <div class="form-group col-md-2">
                                <div class="form-group col-md-12">
                                    <label for="hora_fin">{{ __('Hora Fin') }}</label>
                                    <input id="hora_fin" type="time" class="form-control @error('hora_fin') is-invalid @enderror" name="hora_fin" value="{{ old('hora_fin') }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <!----- Establelcimiento ----->
                            <div class="form-group col-md-3">
                                <label for="">{{ __('Condición del encuestado') }}</label>
                                <select class="form-control" name="condicion" id="condicion" onchange="filterCity();">
                            <option value="0">-- Seleccione --</option>
                            <option value="USUARIO">USUARIO/PACIENTE</option>
                            <option value="ACOMPAÑANTE">ACOMPAÑANTE</option>
                            <option value="ACOMPAÑANTE">PADRE</option>
                            <option value="ACOMPAÑANTE">MADRE</option>
                            <option value="ACOMPAÑANTE">OTROS</option>
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
                                <label for="estudios">{{ __('Grado de Instruccion') }}</label>
                                <select id="estudios" class="form-control" name="estudios">
                                <option>-- Seleccione --</option>
                                <option>Ninguno</option>
                                <option>Primaria</option>
                                <option>Secundaria</option>
                                <option>Superior</option>
                                <option>No sabe</option>
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
                                <label for="tipo_usuario">{{ __('Servicio donde permaneció hospitalizado') }}</label>
                                <input id="tipo_usuario" type="text" class="form-control @error('tipo_usuario') is-invalid @enderror" name="tipo_usuario" value="{{ old('tipo_usuario') }}" autofocus>
                            </select>
                            </div>
                            <!----- estudios ----->
                            <div class="form-group col-md-3">
                                <label for="especialidad">{{ __('Hospitalizacion en dias') }}</label>
                                <input id="especialidad" type="text" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad" value="{{ old('especialidad') }}" autofocus>
                            </div>
                            <!----- profesional ----->
                            <div class="form-group col-md-3">
                                <label for="profesional">{{ __('Profesional que le atendio') }}</label>
                                <select id="profesional" class="form-control" name="profesional">
                                <option>-- Seleccione --</option>
                                <option>AGENTE COMUNITARIO</option>
                                <option>ASISTENTA SOCIAL</option>
                                <option>AUXILIARES DE SALUD</option>
                                <option>BIOLOGO</option>
                                <option>ENFERMERA (O)</option>
                                <option>ESTADISTICO</option>
                                <option>INTERNO DE MEDICINA</option>
                                <option>INTERNOS NO MEDICOS</option>
                                <option>MEDICO CARDIOLOGO</option>
                                <option>MEDICO CIRUJANO GENERAL</option>
                                <option>MEDICO CIRUJANO ONCOLOGO</option>
                                <option>MEDICO DERMATOLOGO</option>
                                <option>MEDICO GASTROENTEROLOGO</option>
                                <option>MEDICO GENERAL</option>
                                <option>MEDICO GINECO-OBSTETRA</option>
                                <option>MEDICO NEFROLOGO</option>
                                <option>MEDICO NEUMOLOGO</option>
                                <option>MEDICO NEUROLOGO</option>
                                <option>MEDICO OFTALMOLOGO</option>
                                <option>MEDICO ONCOLOGO</option>
                                <option>MEDICO OTORRINOLARINGOLOGO</option>
                                <option>MEDICO OTRAS ESPECIALIDADES</option>
                                <option>MEDICO OTROS CIRUGIA</option>
                                <option>MEDICO PATOLOGO</option>
                                <option>MEDICO PEDIATRA</option>
                                <option>MEDICO PSIQUIATRA</option>
                                <option>MEDICO RADIOLOGO</option>
                                <option>MEDICO RESIDENTE</option>
                                <option>MEDICO TRAUMATOLOGO ORTOPEDISTA</option>
                                <option>MEDICO UROLOGO</option>
                                <option>NUTRICIONISTA</option>
                                <option>OBSTETRIZ</option>
                                <option>ODONTOLOGO</option>
                                <option>OTROS NO ESPECIFICADOS</option>
                                <option>OTROS TECNICOS Y AUXILIARES</option>
                                <option>PSICOLOGO</option>
                                <option>QUIMICO FARMACEUTICO</option>
                                <option>SERUMISTA ENFERMERA</option>
                                <option>SERUMISTA MEDICO</option>
                                <option>SERUMISTA OBSTETRIZ</option>
                                <option>SERUMISTA ODONTOLOGO</option>
                                <option>SERUMISTA PSICOLOGO</option>
                                <option>SERUMISTA SERVICIO SOCIAL</option>
                                <option>TECNICAS DE ENFERMERIA</option>
                                <option>TECNICO DE LABORATORIO</option>
                                <option>TECNICO DENTAL</option>
                                <option>TECNICO RADIOLOGO</option>
                                <option>TECNICO SANEAMIENTO AMBIENTAL</option>
                                <option>TECNICOS DE SALUD</option>
                                <option>TECNOLOGO MEDICO</option>
                                <option>VETERINARIO</option>
                            </select>
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
                            En primer lugar, califique las expectativas, que se refieren a la IMPORTANCIA que usted le otorga a la atención que espera recibir en el servicio de Hospitalización  (II y III). Utilice una escala numérica del 1 al 7.Considere 1 como la menor calificación y 7 como la mayor calificación.
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
                                    <!-- CARITAS -->
                                    <tr class="border-bottom">
                                        <td>

                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <p>&#128543;</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <p>&#128512;</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA NRO 1-->
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="small text-muted d-none d-md-block">1. Que todos los días reciba una visita médica
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">2. Que usted comprenda la explicación que los médicos le brindarán sobre la evolución de su problema de salud por el cual permanecerá hospitalizado
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
                                            <div class="small text-muted d-none d-md-block">3. Que usted comprenda la explicación que los médicos le brindarán sobre los medicamentos que recibirá durante su hospitalización: beneficios y efectos adversos
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">4. Que usted comprenda la explicación que los médicos le brindarán sobre los resultados de los análisis de laboratorio
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">5. Que al alta, usted comprenda la explicación que los médicos le brindarán sobre los medicamentos y los cuidados para su salud en casa
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">6. Que los trámites para su hospitalización sean rápidos
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">7. Que los análisis de laboratorio solicitados por los médicos se realicen rápido
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">8. Que los exámenes radiológicos (rayos X, ecografías, tomografías, otros ) se realicen rápido
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">9. Que los trámites para el alta sean rápidos
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
                                            <div class="small text-muted d-none d-md-block">10. Que los médicos muestren interés para mejorar o solucionar su problema de salud
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">11. Que los alimentos le entreguen a temperatura adecuada y de manera higiénica
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">12. Que se mejore o resuelva el problema de salud por el cual se hospitaliza
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">13. Que durante su hospitalización se respete su privacidad
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">14. Que el trato del personal de obstetricia y enfermería sea amable, respetuoso y con paciencia
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">15. Que el trato de los médicos sea amable, respetuoso y con paciencia
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">16. Que el trato del personal de nutrición sea amable, respetuoso y con paciencia
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">17. Que el trato del personal encargado de los trámites de admisión o alta sea amable, respetuoso y con paciencia
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">18. Que el personal de enfermería muestre interés en solucionar cualquier problema durante su hospitalización
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">19. Que los ambientes del servicio sean cómodos y limpios
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">20. Que los servicios higiénicos para los pacientes se encuentren limpios
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">21. Que los equipos se encuentren disponibles y se cuente con materiales necesarios para su atención
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">22. Que la ropa de cama, colchón y frazadas sean adecuados
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
                            En segundo lugar, califique las percepciones que se refieren a como usted A RECIBIDO, la atención en el servicio de Hospitalización (II y III). Utilice una escala numérica del 1 al 7.Considere 1 como la menor calificación y 7 como la mayor calificación.
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
                                    <!-- CARITAS -->
                                    <tr class="border-bottom">
                                        <td>

                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <p>&#128543;</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <p>&#128512;</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- PREGUNTA PERCEPCIONES NRO 1-->
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="small text-muted d-none d-md-block">1. ¿Durante su hospitalización recibió visita médica todos los días?</div>
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
                                            <div class="small text-muted d-none d-md-block">2. ¿Usted comprendió la explicación que los médicos le brindaron sobre la evolución de su problema de salud por el cual permaneció hospitalizado?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">3. ¿Usted comprendió la explicación de los médicos sobre los medicamentos que recibió durante su hospitalización: beneficios y efectos adversos?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">4. ¿Usted comprendió la explicación que los médicos le brindaron sobre los resultados de los análisis de laboratorio que le realizaron?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">5. ¿Al alta, usted comprendió la explicación que los médicos le brindaron sobre los medicamentos y los cuidados para su salud en casa?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">6. ¿Los trámites para su hospitalización fueron rápidos?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">7. ¿Los análisis de laboratorio solicitados por los médicos se realizaron rápido?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">8. ¿Los exámenes radiológicos (rayos X, ecografías, tomografías, otros) se realizaron rápido?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">9. ¿Los trámites para el alta fueron rápidos?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">10. ¿Los médicos mostraron interés para mejorar o solucionar su problema de salud?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">11. ¿Los alimentos le entregaron a temperatura adecuada y de manera higiénica?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">12. ¿Se mejoró o resolvió el problema de salud por el cual se hospitalizó?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">13. ¿Durante su hospitalización se respetó su privacidad?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">14. ¿El trato del personal de obstetricia y enfermería fue amable, respetuoso y con paciencia?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">15. ¿El trato de los médicos fue amable, respetuoso y con paciencia?
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
                                            <div class="small text-muted d-none d-md-block">16. ¿El trato del personal de nutrición fue amable, respetuoso y con paciencia?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">17. ¿El trato del personal encargado de los trámites de admisión o alta fue amable, respetuoso y con paciencia?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">18. ¿El personal de enfermería mostró interés en solucionar cualquier problema durante su hospitalización?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">19. ¿Los ambientes del servicio fueron cómodos y limpios?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">20. ¿Los servicios higiénicos para los pacientes se encontró limpios?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">21. ¿Los equipos se encontraron disponibles y se contó con materiales necesarios para su atención?
                                            </div>
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
                                            <div class="small text-muted d-none d-md-block">22. ¿La ropa de cama, colchón y frazadas son adecuados?
                                            </div>
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
