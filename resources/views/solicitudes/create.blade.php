<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->


    @section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Registro Proyección Preliminar') }}</div>
    
                    <div class="card-body">
                        <form >
                            {{-- method="POST" action="{{ route('proyeccion_store') }}"
                            @csrf --}}

                            <!-- información proyección -->
                                <!-- 1 -->
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label for="id_programa_academico" class="col-form-label text-md-right">{{ __('Programa Académico') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_programa_academico" class="form-control" required>
                                            @foreach($programas_usuario as $prog_aca)
                                                <option value="{{$prog_aca['id']}}" selected>{{$prog_aca['programa_academico']}}</option>  
                                            @endforeach
                                        </select>
                                        @error('id_programa_academico')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-2">
                                        <label for="id_semestre_asignatura" class="col-form-label text-md-right">{{ __('Sem.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="num_estudiantes_aprox" type="text" class="form-control @error('num_estudiantes_aprox') is-invalid @enderror" name="num_estudiantes_aprox" 
                                        value="" required autocomplete="off" autofocus>
                                       
                                        @error('id_semestre_asignatura')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    <div class="col-md-5">
                                        <label for="id_espacio_academico" class="col-form-label text-md-right">{{ __('Espacio Académico') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_espacio_academico" class="form-control" required>
                                            @foreach($espacios_academicos as $esp_aca)
                                                <option value="{{$esp_aca->id}}" selected>{{$esp_aca->espacio_academico}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_espacio_academico')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-1">
                                        <label for="id_semestre_asignatura" class="col-form-label text-md-right">{{ __('Sem.') }}</label>
                                        <span class="hs-form-required" title="Semestre Académico">*</span>
                                        <select name="id_semestre_asignatura" class="form-control" required>
                                            @foreach($semestres_asignaturas as $sem_asig)
                                                <option value="{{$sem_asig->id}}" selected>{{$sem_asig->semestre_asignatura}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_semestre_asignatura')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-1">
                                        <label for="id_periodo_academico" class="col-form-label text-md-right">{{ __('Per.') }}</label>
                                        <span class="hs-form-required" title="Período Asignatura">*</span>
                                        <select name="id_periodo_academico" class="form-control" required>
                                            @foreach($periodos_academicos as $per_aca)
                                                <option value="{{$per_aca->id}}" selected>{{$per_aca->periodo_academico}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_periodo_academico')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- 1 -->

                                <!-- 2 -->
                                <div  class="form-group row">
                                    <div class="col-md-2">
                                        <label for="num_estudiantes_aprox" class="col-form-label text-md-left">{{ __('Estudiantes') }}</label>
                                        <span class="hs-form-required" title="Número Estudiantes">*</span>
                                        <input id="num_estudiantes_aprox" type="text" class="form-control @error('num_estudiantes_aprox') is-invalid @enderror" name="num_estudiantes_aprox" 
                                        value="" required autocomplete="off" autofocus onchange="calc_viaticos_RP()">
                                        
                                        @error('num_estudiantes_aprox')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="cant_grupos" class="col-form-label text-md-left">{{ __('Cant. Grupos') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="cant_grupos" type="number" max="4" min="1" class="form-control @error('cant_grupos') is-invalid @enderror" name="cant_grupos" 
                                        value="1" autocomplete="off" autofocus required>
                                        
                                        @error('cant_grupos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label for="num_acompaniantes" class="col-form-label text-md-left" title="Número Acompañantes Adicionales Al Docente">{{ __('Acompañantes') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="num_acompaniantes" type="number" max="3" min="0" class="form-control @error('num_acompaniantes') is-invalid @enderror" name="num_acompaniantes" 
                                        value="" autocomplete="off" autofocus onchange="calc_viaticos_RP()">
                                        
                                        @error('num_acompaniantes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="num_apoyo" class="col-form-label text-md-left" title="Número Docentes De Apoyo">{{ __('Docent. Apoyo') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="num_apoyo" type="number" max="3" min="0" class="form-control @error('num_apoyo') is-invalid @enderror" name="num_apoyo" 
                                        value="" autocomplete="off" autofocus onchange="calc_viaticos_RP()">
                                        
                                        @error('num_apoyo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 2 -->

                                <!-- 2.1 -->
                                <div  class="form-group row"  id="Grupos">
                                    <div class="col-md-2" id="gp_1">
                                        <label for="grupo_1" class="col-form-label text-md-left">{{ __('Gp 1') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
                                        value="" autocomplete="off" autofocus>
                                        
                                        @error('grupo_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2" id="gp_2">
                                        <label for="grupo_2" class="col-form-label text-md-left">{{ __('Gp 2') }}</label>
                                        <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2" id="gp_3">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Gp 3') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2" id="gp_4">
                                        <label for="grupo_4" class="col-form-label text-md-left">{{ __('Gp 4') }}</label>
                                        <input id="grupo_4" type="text" class="form-control @error('grupo_4') is-invalid @enderror" name="grupo_4" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <!-- 2.1 -->

                                <!-- 2.2 -->
                                <div  class="form-group row"  id="acompa">
                                    <div class="col-md-4" id="ac_1">
                                        <label for="acompa_1" class="col-form-label text-md-left">{{ __('Acompañante 1') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="acompa_1" type="text" class="form-control @error('acompa_1') is-invalid @enderror" name="acompa_1" 
                                        value="" autocomplete="off" autofocus>
                                        
                                        @error('acompa_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_2">
                                        <label for="acompa_2" class="col-form-label text-md-left">{{ __('Acompañante 2') }}</label>
                                        <input id="acompa_2" type="text" class="form-control @error('acompa_2') is-invalid @enderror" name="acompa_2" 
                                        value="" autocomplete="off" autofocus>
                                        @error('acompa_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_3">
                                        <label for="acompa_3" class="col-form-label text-md-left">{{ __('Acompañante 3') }}</label>
                                        <input id="acompa_3" type="text" class="form-control @error('acompa_3') is-invalid @enderror" name="acompa_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('acompa_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-4" id="ac_4">
                                        <label for="grupo_1" class="col-form-label text-md-left">{{ __('Gp 1') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('grupo_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_5">
                                        <label for="grupo_2" class="col-form-label text-md-left">{{ __('Gp 2') }}</label>
                                        <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_6">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Gp 3') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_7">
                                        <label for="grupo_1" class="col-form-label text-md-left">{{ __('Gp 1') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('grupo_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_8">
                                        <label for="grupo_2" class="col-form-label text-md-left">{{ __('Gp 2') }}</label>
                                        <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_9">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Gp 3') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ac_10">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Gp 3') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    
                                </div>

                                <!-- 2.2 -->

                                <!-- 2.3 -->
                                <div  class="form-group row"  id="apoyo">
                                    <div class="col-md-4" id="ap_1">
                                        <label for="apoyo_1" class="col-form-label text-md-left">{{ __('Docente Apoyo 1') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="apoyo_1" type="text" class="form-control @error('apoyo_1') is-invalid @enderror" name="apoyo_1" 
                                        value="" autocomplete="off" autofocus>
                                        
                                        @error('apoyo_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_2">
                                        <label for="apoyo_2" class="col-form-label text-md-left">{{ __('Docente Apoyo 2') }}</label>
                                        <input id="apoyo_2" type="text" class="form-control @error('apoyo_2') is-invalid @enderror" name="apoyo_2" 
                                        value="" autocomplete="off" autofocus>
                                        @error('apoyo_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_3">
                                        <label for="apoyo_3" class="col-form-label text-md-left">{{ __('Docente Apoyo 3') }}</label>
                                        <input id="apoyo_3" type="text" class="form-control @error('apoyo_3') is-invalid @enderror" name="apoyo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('apoyo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-4" id="ap_4">
                                        <label for="grupo_1" class="col-form-label text-md-left">{{ __('Docente Apoyo 4') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('grupo_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_5">
                                        <label for="grupo_2" class="col-form-label text-md-left">{{ __('Docente Apoyo 5') }}</label>
                                        <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_6">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Docente Apoyo 6') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_7">
                                        <label for="grupo_1" class="col-form-label text-md-left">{{ __('Docente Apoyo 7') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('grupo_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_8">
                                        <label for="grupo_2" class="col-form-label text-md-left">{{ __('Docente Apoyo 8') }}</label>
                                        <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_9">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Docente Apoyo 9') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" id="ap_10">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Docente Apoyo 10') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="" autocomplete="off" autofocus>
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    
                                </div>
                                <!-- 2.3 -->

                            <!-- información proyección -->

                            <br>
                            <h4>Ruta Principal (Destino para cumplir los objetivos de la práctica)</h4>
                            <hr class="divider">
                            <br>

                            <!-- ruta principal -->
                                <!-- 3 -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="destino_rp" class="col-form-label text-md-left">{{ __('Destino Ruta Principal') }}</label>
                                        <span class="hs-form-required" title="Nombre Asociado A La Ruta">*</span>
                                        <input id="destino_rp" type="text" class="form-control @error('destino_rp') is-invalid @enderror" name="destino_rp" value="" required autocomplete="off" autofocus>

                                        @error('destino_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 3 -->

                                <!-- 4 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="ruta_principal" class="col-form-label text-md-left">{{ __('Ruta Principal') }}</label>
                                        <span class="hs-form-required" title="ULR Google">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" value="" required autocomplete="off" autofocus>
                                        
                                        @error('ruta_principal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 4 -->

                                <!-- 5 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="det_recorrido_interno_rp" class="col-form-label text-md-left">{{ __('Detalle Recorrido') }}</label>
                                        <span class="hs-form-required" title="Detalle Diario De La Práctica">*</span>
                                        <textarea id="det_recorrido_interno_rp" style="min-height:5rem;" type="text" class="form-control @error('det_recorrido_interno_rp') is-invalid @enderror" name="det_recorrido_interno_rp" 
                                        value="" required autocomplete="off" autofocus></textarea>
                                        
                                        @error('det_recorrido_interno_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 5 -->

                                <!-- 6 -->
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="lugar_salida_rp" class="col-form-label text-md-left">{{ __('Punto Encuentro Salida') }}</label>
                                        <span class="hs-form-required" title="URL Google">*</span>
                                        <input id="lugar_salida_rp" type="text" class="form-control @error('lugar_salida_rp') is-invalid @enderror" name="lugar_salida_rp" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('lugar_salida_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="fecha_salida_aprox_rp" class="col-form-label text-md-left">{{ __('Fecha Salida') }}</label>
                                        <span class="hs-form-required">*</span>
                                          <div class="input-group">
                                             <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          <input class="inputDate form-control datetimepicker data-create" id="fecha_salida_aprox_rp" name="fecha_salida_aprox_rp" type="text" required
                                          onchange="duracionRP2(this.value)">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="lugar_regreso_rp" class="col-form-label text-md-left">{{ __('Punto Encuentro Regreso') }}</label>
                                        <span class="hs-form-required" title="URL Google">*</span>
                                        <input id="lugar_regreso_rp" type="text" class="form-control @error('lugar_regreso_rp') is-invalid @enderror" name="lugar_regreso_rp" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('lugar_regreso_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="fecha_regreso_aprox_rp" class="col-form-label text-md-left">{{ __('Fecha Regreso') }}</label>
                                        <span class="hs-form-required">*</span>
                                          <div class="input-group">
                                             <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          <input class="inputDate form-control datetimepicker" id="fecha_regreso_aprox_rp" name="fecha_regreso_aprox_rp" type="text" required
                                          onchange="duracionRP(this.value)">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="duracion_rp" class="col-form-label text-md-left">{{ __('Duración Días') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="duracion_rp" type="text" class="form-control @error('duracion_rp') is-invalid @enderror" name="duracion_rp" 
                                        value="" autocomplete="off" autofocus  readonly>
                                        
                                        @error('duracion_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- 6 -->

                                <!-- 7 -->
                                {{-- <div class="form-group row">

                                    <div class="col-md-2">
                                        <label for="cant_transporte_rp" class="col-form-label text-md-left">{{ __('Cant. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="cant_transporte_rp" type="text" class="form-control @error('cant_transporte_rp') is-invalid @enderror" name="cant_transporte_rp" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('cant_transporte_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <!-- 7 -->

                                <!-- 8 transporte_rp_1 -->
                                <div class="form-group row">
                                    <div class="col-md-12" id="transporte_rp">
                                        <div class="row" id="transporte_rp_children">
                                            <div class="col-md-2">
                                                <label for="id_tipo_transporte_rp_[]" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <select name="id_tipo_transporte_rp_[]" class="form-control" required onchange="otroTransporte(this.value,1)">
                                                    @foreach($tipos_transportes as $tp_trans)
                                                        <option value="{{$tp_trans->id}}" selected>{{$tp_trans->tipo_transporte}}</option>  

                                                    @endforeach
                                                </select>
                                                @error('id_tipo_transporte_rp_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="otro_transporte_rp_1" class="col-form-label text-md-left">{{ __('Cuál?') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <input id="otro_transporte_rp_1" type="text" class="form-control @error('otro_transporte_rp_1') is-invalid @enderror" name="otro_transporte_rp_1" 
                                                value=""  autocomplete="off" autofocus required>

                                                @error('otro_transporte_rp_1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="vlr_otro_transporte_rp_1" class="col-form-label text-md-left">{{ __('Valor Transp.?') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <input id="vlr_otro_transporte_rp_1" type="text" class="form-control @error('vlr_otro_transporte_rp_1') is-invalid @enderror" name="vlr_otro_transporte_rp_1" 
                                                value=""  autocomplete="off" autofocus required  onkeyup="formatVlr(this)" onchange="formatVlr(this)">

                                                @error('vlr_otro_transporte_rp_1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="capac_transporte_rp_[]" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                                <span class="hs-form-required" title="Número De Personas A Transportar">*</span>
                                                <input id="capac_transporte_rp_[]" type="text" class="form-control @error('capac_transporte_rp_[]') is-invalid @enderror" name="capac_transporte_rp_[]" 
                                                value="" required autocomplete="off" autofocus>

                                                @error('capac_transporte')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="det_tipo_transporte_rp_[]" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                                {{-- <span class="hs-form-required" title="Observaciones Del Vehículo">*</span> --}}
                                                <input id="det_tipo_transporte_rp_[]" type="text" class="form-control @error('det_tipo_transporte_rp_[]') is-invalid @enderror" name="det_tipo_transporte_rp_[]" 
                                                value="" autocomplete="off" autofocus>

                                                @error('det_tipo_transporte_rp_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-5">
                                                <label for="docente_resp_transp_rp_[]" class="col-form-label text-md-left">{{ __('Docente Responsable') }}</label>
                                                <span class="hs-form-required" title="">*</span>
                                                <input id="docente_resp_transp_rp_[]" type="text" class="form-control @error('docente_resp_transp_rp_[]') is-invalid @enderror" name="docente_resp_transp_rp_[]" 
                                                value="{{ $nombre_usuario }}" required autocomplete="off" autofocus>
                                                
                                                @error('docente_resp_transp_rp_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exclusiv_tiempo_rp_1" class="col-form-label text-md-left">{{ __('Disponibilidad Permanente?') }}</label>
                                                    <span class="hs-form-required" title="Disponibilidad Permanente?">*</span>
                                                    <div class="row">

                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1" id="exclusiv_tiempo_rp_1" value="1" checked>
                                                            <label class="form-check-label" for="">Si</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1" id="exclusiv_tiempo_rp_1" value="0">
                                                                <label class="form-check-label" for="">No</label>
                                                            </div>
                                                        </div>

                                                        <a class="add_transp_rp imgButton" id="add_transp_rp" title="Add field"><img src="{{asset('img/add-icon.png')}}"/></a>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-1">
                                            </div> --}}
                                        </div>

                                    </div>

                                </div>
                                <!-- 8 transporte_rp_1 -->

                                <!-- 8 transporte_rp_2 -->
                                {{-- <div class="form-group row" id="id_tipo_transporte_rp_2" style="visibility:hidden;">
                                    <div class="col-md-3">
                                        <label for="id_tipo_transporte_rp_2" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_tipo_transporte_rp_2" class="form-control" required>
                                            @foreach($tipos_transportes as $tp_trans)
                                                <option value="{{$tp_trans->id}}" selected>{{$tp_trans->tipo_transporte}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_tipo_transporte_rp_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="capac_transporte_rp_21" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="capac_transporte_rp_2" type="text" class="form-control @error('capac_transporte_rp_2') is-invalid @enderror" name="capac_transporte_rp_2" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('capac_transporte_rp_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="det_tipo_transporte_rp_2" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="det_tipo_transporte_rp_2" type="text" class="form-control @error('det_tipo_transporte_rp_') is-invalid @enderror" name="det_tipo_transporte_rp_2" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('det_tipo_transporte_rp_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="exclusiv_tiempo_rp_2">{{ __('Tiempo Completo') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <div class="row">

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_2" value="1" checked>
                                                    <label class="form-check-label" for="">Si</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_2"  value="0">
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- 8 transporte_rp_2 -->

                                <!-- 8 transporte_rp_3 -->
                                {{-- <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="id_tipo_transporte_rp_3" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_tipo_transporte_rp_3" class="form-control" required>
                                            @foreach($tipos_transportes as $tp_trans)
                                                <option value="{{$tp_trans->id}}" selected>{{$tp_trans->tipo_transporte}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_tipo_transporte_rp_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="capac_transporte_rp_3" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="capac_transporte_rp_3" type="text" class="form-control @error('capac_transporte_rp_3') is-invalid @enderror" name="capac_transporte_rp_1" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('capac_transporte_rp_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="det_tipo_transporte_rp_3" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="det_tipo_transporte" type="text" class="form-control @error('det_tipo_transporte_rp_3') is-invalid @enderror" name="det_tipo_transporte_rp_3" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('det_tipo_transporte_rp_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="exclusiv_tiempo_rp_3">{{ __('Tiempo Completo') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <div class="row">

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_3" value="1" checked>
                                                    <label class="form-check-label" for="">Si</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_3"  value="0">
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- 8 transporte_rp_3 -->

                                <!-- materiales -->
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="det_materiales_rp" class="col-form-label text-md-left" title="Materiales">{{ __('Materiales') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="det_materiales_rp" type="text"  class="form-control @error('det_materiales_rp') is-invalid @enderror" name="det_materiales_rp" 
                                        value="" autocomplete="off" autofocus>
                                        
                                        @error('det_materiales_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="vlr_materiales_rp" class="col-form-label text-md-left" title="Valor Total Materiales">{{ __('Valor Total Materiales') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="vlr_materiales_rp" type="text"  class="form-control @error('vlr_materiales_rp') is-invalid @enderror" name="vlr_materiales_rp" 
                                        value="" autocomplete="off" autofocus onkeyup="formatVlr(this)" onchange="formatVlr(this)">
                                        
                                        @error('vlr_materiales_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- materiales -->

                                <!-- preguntas -->
                                <div class="form-group row">
                                    <!-- 1 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="areas_acuaticas_rp">{{ __('Esta sálida desarrolla maniobras sobre áreas acuáticas(Ríos, lagos, lagunas, humedales, mares, etc...?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="areas_acuaticas_rp" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 1 -->

                                    <!-- 2 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="alturas_rp">{{ __('Esta sálida desarrolla actividades de escalada o trabajo de alturas?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="alturas_rp" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 2 -->

                                    <!-- 3 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="riesgo_biologico_rp">{{ __('Esta sálida desarrolla actividades al interior de bosques o lugares con riesgo biológico?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="riesgo_biologico_rp" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 3 -->

                                    <!-- 4 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="espacios_confinados_rp">{{ __('Esta sálida desarrolla actividades en espacios confinados?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="espacios_confinados_rp" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 4 -->

                                </div>
                                <!-- preguntas -->

                                <!-- viaticos -->
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="vlr_apoyo_docentes_rp" class="col-form-label text-md-left" title="Apoyo económico para los docentes">{{ __('Valor Apoyo Docentes') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="vlr_apoyo_docentes_rp" type="text"  class="form-control @error('vlr_apoyo_docentes_rp') is-invalid @enderror" name="vlr_apoyo_docentes_rp" 
                                        value="" autocomplete="off" autofocus readonly>
                                        
                                        @error('vlr_apoyo_docentes_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="vlr_apoyo_estudiantes_rp" class="col-form-label text-md-left" title="Apoyo económico para los estudiantes">{{ __('Valor Apoyo Estudiantes') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="vlr_apoyo_estudiantes_rp" type="text"  class="form-control @error('vlr_apoyo_estudiantes_rp') is-invalid @enderror" name="vlr_apoyo_estudiantes_rp" 
                                        value="" autocomplete="off" autofocus readonly>
                                        
                                        @error('vlr_apoyo_estudiantes_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-3">
                                        <label for="trasnp_menor_rp" class="col-form-label text-md-left" title="Valor total del transporte menor">{{ __('Total Transporte Menor') }}</label>
                                        <input id="trasnp_menor_rp" type="text"  class="form-control @error('trasnp_menor_rp') is-invalid @enderror" name="trasnp_menor_rp" 
                                        value="" autocomplete="off" autofocus readonly>
                                        
                                        @error('trasnp_menor_rp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                </div>
                                <!-- viaticos -->

                            <!-- ruta principal -->

                            <br>
                            <h4>Ruta Contingencia (Destino para cumplir propósitos de práctica pero por fallas en la vía, clima o demás se adopta como ruta principal de destino)</h4>
                            <hr class="divider">
                            <br>

                            <!-- ruta alterna -->
                                <!-- 9 -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="destino_ra" class="col-form-label text-md-left">{{ __('Destino Ruta Alterna') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="destino_ra" type="text" class="form-control @error('destino_ra') is-invalid @enderror" name="destino_ra" value="" required autocomplete="off" autofocus>
                                        
                                        @error('destino_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 9 -->
                                
                                <!-- 10 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="ruta_alterna" class="col-form-label text-md-left">{{ __('Ruta Alterna') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_alterna') is-invalid @enderror" name="ruta_alterna" value="" required autocomplete="off" autofocus>
                                        
                                        @error('ruta_alterna')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 10 -->

                                <!-- 11 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="det_recorrido_interno_ra" class="col-form-label text-md-left">{{ __('Detalle Recorrido') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <textarea id="det_recorrido_interno_ra" style="min-height:5rem;" type="text" class="form-control @error('det_recorrido_interno_ra') is-invalid @enderror" name="det_recorrido_interno_ra" 
                                        value="" required autocomplete="off" autofocus></textarea>
                                        
                                        @error('det_recorrido_interno_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 11 -->

                                <!-- 12 -->
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="lugar_salida_ra" class="col-form-label text-md-left">{{ __('Punto Encuentro Salida') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_salida_ra" type="text" class="form-control @error('lugar_salida_ra') is-invalid @enderror" name="lugar_salida_ra" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('lugar_salida_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="fecha_salida_aprox_ra" class="col-form-label text-md-left">{{ __('Fecha Salida') }}</label>
                                        <span class="hs-form-required">*</span>
                                          <div class="input-group">
                                             <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          <input class="inputDate form-control datetimepicker data-create" id="fecha_salida_aprox_ra" name="fecha_salida_aprox_ra" type="text" required
                                          onchange="duracionRA2(this.value)">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="lugar_regreso_ra" class="col-form-label text-md-left">{{ __('Punto Encuentro Regreso') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_regreso_ra" type="text" class="form-control @error('lugar_regreso_ra') is-invalid @enderror" name="lugar_regreso_ra" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('lugar_regreso_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="fecha_regreso_aprox_ra" class="col-form-label text-md-left">{{ __('Fecha Regreso') }}</label>
                                        <span class="hs-form-required">*</span>
                                          <div class="input-group">
                                             <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          <input class="inputDate form-control datetimepicker" id="fecha_regreso_aprox_ra" name="fecha_regreso_aprox_ra" type="text" required
                                          onchange="duracionRA(this.value)">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="duracion_ra" class="col-form-label text-md-left">{{ __('Duración Días') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="duracion_ra" type="text" class="form-control @error('duracion_ra') is-invalid @enderror" name="duracion_ra" 
                                        value="" autocomplete="off" autofocus readonly>
                                        
                                        @error('duracion_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- 12 -->

                                <!-- 13 -->
                                {{-- <div class="form-group row">

                                    <div class="col-md-2">
                                        <label for="cant_transporte_ra" class="col-form-label text-md-left">{{ __('Cant. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="cant_transporte_ra" type="text" class="form-control @error('cant_transporte_ra') is-invalid @enderror" name="cant_transporte_ra" 
                                        value="" required autocomplete="off" autofocus>
                                        
                                        @error('cant_transporte_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <!-- 13 -->

                                <!-- 14 transporte_ra_1 -->
                                <div class="form-group row">
                                    <div class="col-md-12" id="transporte_ra">
                                        <div class="row" id="transporte_ra_children">
                                            <div class="col-md-2">
                                                <label for="id_tipo_transporte_ra_[]" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <select name="id_tipo_transporte_ra_[]" class="form-control" required onchange="otroTransporte2(this.value,1)">
                                                    @foreach($tipos_transportes as $tp_trans)
                                                        <option value="{{$tp_trans->id}}" selected>{{$tp_trans->tipo_transporte}}</option>  

                                                    @endforeach
                                                </select>
                                                @error('id_tipo_transporte_ra_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="otro_transporte_ra_1" class="col-form-label text-md-left">{{ __('Cuál?') }}</label>
                                                <input id="otro_transporte_ra_1" type="text" class="form-control @error('otro_transporte_ra_1') is-invalid @enderror" name="otro_transporte_ra_1" 
                                                value="" autocomplete="off" autofocus required>

                                                @error('otro_transporte_ra_1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="vlr_otro_transporte_ra_1" class="col-form-label text-md-left">{{ __('Valor Transp.?') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <input id="vlr_otro_transporte_ra_1" type="text" class="form-control @error('vlr_otro_transporte_ra_1') is-invalid @enderror" name="vlr_otro_transporte_ra_1" 
                                                value=""  autocomplete="off" autofocus required onkeyup="formatVlr(this)" onchange="formatVlr(this)">

                                                @error('vlr_otro_transporte_ra_1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="capac_transporte_ra_[]" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <input id="capac_transporte_ra_[]" type="text" class="form-control @error('capac_transporte_ra_[]') is-invalid @enderror" name="capac_transporte_ra_[]" 
                                                value="" required autocomplete="off" autofocus>
                                                
                                                @error('capac_transporte_ra_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="det_tipo_transporte_ra_[]" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                                {{-- <span class="hs-form-required">*</span> --}}
                                                <input id="det_tipo_transporte_ra_[]" type="text" class="form-control @error('det_tipo_transporte_ra_[]') is-invalid @enderror" name="det_tipo_transporte_ra_[]" 
                                                value=""  autocomplete="off" autofocus>

                                                @error('det_tipo_transporte_ra_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-md-5">
                                                <label for="docente_resp_transp_ra_[]" class="col-form-label text-md-left">{{ __('Docente Responsable') }}</label>
                                                <span class="hs-form-required" title="">*</span>
                                                <input id="docente_resp_transp_ra_[]" type="text" class="form-control @error('docente_resp_transp_ra_[]') is-invalid @enderror" name="docente_resp_transp_ra_[]" 
                                                value="{{ $nombre_usuario }}" required autocomplete="off" autofocus>
                                                
                                                @error('docente_resp_transp_ra_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exclusiv_tiempo_ra_1" class="col-form-label text-md-left">{{ __('Disponibilidad Permanente') }}</label>
                                                    <span class="hs-form-required">*</span>
                                                    <div class="row">
                                                    
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1" id="exclusiv_tiempo_ra_1" value="1" checked>
                                                            <label class="form-check-label" for="">Si</label>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1" id="exclusiv_tiempo_ra_1" value="0">
                                                                <label class="form-check-label" for="">No</label>
                                                            </div>
                                                        </div>

                                                        <a class="add_transp_ra imgButton" id="add_transp_ra" title="Add field"><img src="{{asset('img/add-icon.png')}}"/></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            {{-- <div class="col-md-1">
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- 14 transporte_ra_1 -->

                                <!-- 14 transporte_ra_2 -->
                                {{-- <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="id_tipo_transporte" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_tipo_transporte" class="form-control" required>
                                            @foreach($tipos_transportes as $tp_trans)
                                                <option value="{{$tp_trans->id}}" selected>{{$tp_trans->tipo_transporte}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_tipo_transporte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="capac_transporte" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="capac_transporte" type="text" class="form-control @error('capac_transporte') is-invalid @enderror" name="capac_transporte" value="{{ old('capac_transporte') }}" required autocomplete="off" autofocus>
                                        
                                        @error('capac_transporte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="det_tipo_transporte" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="det_tipo_transporte" type="text" class="form-control @error('det_tipo_transporte') is-invalid @enderror" name="det_tipo_transporte" value="{{ old('det_tipo_transporte') }}" required autocomplete="off" autofocus>
                                        
                                        @error('det_tipo_transporte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="exclusiv_tiempo">{{ __('Tiempo Completo') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <div class="row">

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exclusiv_tiempo" value="1" checked>
                                                    <label class="form-check-label" for="">Si</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="exclusiv_tiempo"  value="2">
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- 14 transporte_ra_2 -->

                                <!-- 14 transporte_ra_3 -->
                                {{-- <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="id_tipo_transporte" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_tipo_transporte" class="form-control" required>
                                            @foreach($tipos_transportes as $tp_trans)
                                                <option value="{{$tp_trans->id}}" selected>{{$tp_trans->tipo_transporte}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_tipo_transporte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="capac_transporte" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="capac_transporte" type="text" class="form-control @error('capac_transporte') is-invalid @enderror" name="capac_transporte" value="{{ old('capac_transporte') }}" required autocomplete="off" autofocus>
                                        
                                        @error('capac_transporte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="det_tipo_transporte" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="det_tipo_transporte" type="text" class="form-control @error('det_tipo_transporte') is-invalid @enderror" name="det_tipo_transporte" value="{{ old('det_tipo_transporte') }}" required autocomplete="off" autofocus>
                                        
                                        @error('det_tipo_transporte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="exclusiv_tiempo">{{ __('Tiempo Completo') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <div class="row">

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exclusiv_tiempo" value="1" checked>
                                                    <label class="form-check-label" for="">Si</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="exclusiv_tiempo"  value="2">
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- 14 transporte_ra_3 -->

                                <!-- materiales -->
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="det_materiales_ra" class="col-form-label text-md-left" title="Materiales">{{ __('Materiales') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="det_materiales_ra" type="text"  class="form-control @error('det_materiales_ra') is-invalid @enderror" name="det_materiales_ra" 
                                        value="" autocomplete="off" autofocus>
                                        
                                        @error('det_materiales_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="vlr_materiales_ra" class="col-form-label text-md-left" title="Valor Total Materiales">{{ __('Valor Total Materiales') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="vlr_materiales_ra" type="text"  class="form-control @error('vlr_materiales_ra') is-invalid @enderror" name="vlr_materiales_ra" 
                                        value="" autocomplete="off" autofocus onkeyup="formatVlr(this)" onchange="formatVlr(this)">
                                        
                                        @error('vlr_materiales_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- materiales -->

                                <!-- preguntas -->
                                <div class="form-group row">
                                    <!-- 1 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="areas_acuaticas_ra">{{ __('Esta sálida desarrolla maniobras sobre áreas acuáticas(Ríos, lagos, lagunas, humedales, mares, etc...?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="areas_acuaticas_ra" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 1 -->

                                    <!-- 2 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="alturas_ra">{{ __('Esta sálida desarrolla actividades de escalada o trabajo de alturas?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="alturas_ra" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 2 -->

                                    <!-- 3 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="riesgo_biologico_ra">{{ __('Esta sálida desarrolla actividades al interior de bosques o lugares con riesgo biológico?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="riesgo_biologico_ra" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 3 -->

                                    <!-- 4 -->
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="espacios_confinados_ra">{{ __('Esta sálida desarrolla actividades en espacios confinados?)') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group" style="margin-right: 15px;">
                                            <label class="switch">
                                                <input type="checkbox" name="espacios_confinados_ra" onchange="customAlerts(this, 1)">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 4 -->

                                </div>
                                <!-- preguntas -->

                                <!-- modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                                        <h4 class="modal-title">Ventana Confirmación</h4>
                                        </div>
                                        <div class="modal-body">
                                        <p id="textModal"></p>
                                        <p id="textModalConfirm"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" id="modal-btn-si">Si</button>
                                            <button type="button" class="btn btn-secondary" id="modal-btn-no">No</button>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>

                                <!-- modal -->

                                <!-- viaticos -->
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="vlr_apoyo_docentes_ra" class="col-form-label text-md-left" title="Apoyo económico para los docentes">{{ __('Valor Apoyo Docentes') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="vlr_apoyo_docentes_ra" type="text"  class="form-control @error('vlr_apoyo_docentes_ra') is-invalid @enderror" name="vlr_apoyo_docentes_ra" 
                                        value="" autocomplete="off" autofocus readonly>
                                        
                                        @error('vlr_apoyo_docentes_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="vlr_apoyo_estudiantes_ra" class="col-form-label text-md-left" title="Apoyo económico para los estudiantes">{{ __('Valor Apoyo Estudiantes') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="vlr_apoyo_estudiantes_ra" type="text"  class="form-control @error('vlr_apoyo_estudiantes_ra') is-invalid @enderror" name="vlr_apoyo_estudiantes_ra" 
                                        value="" autocomplete="off" autofocus readonly>
                                        
                                        @error('vlr_apoyo_estudiantes_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-3">
                                        <label for="trasnp_menor_ra" class="col-form-label text-md-left" title="Valor total del transporte menor">{{ __('Total Transporte Menor') }}</label>
                                        <input id="trasnp_menor_ra" type="text"  class="form-control @error('trasnp_menor_ra') is-invalid @enderror" name="trasnp_menor_ra" 
                                        value="" autocomplete="off" autofocus readonly>
                                        
                                        @error('trasnp_menor_ra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                </div>
                                <!-- viaticos -->

                            <!-- ruta alterna -->

                            {{-- <br>
                            <h4>Observaciones</h4>
                            <hr class="divider">
                            <br>
                            <!-- observaciones -->

                            @if(Auth::user()->coordinador() || Auth::user()->docente())
                                <!-- 15 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="observ_coordinador" class="col-form-label text-md-left">{{ __('Observaciones Coordinador') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <textarea id="observ_coordinador" style="min-height:5rem;" type="text" class="form-control @error('observ_coordinador') is-invalid @enderror" name="observ_coordinador" value="{{ old('observ_coordinador') }}" required autocomplete="off" autofocus></textarea>
                                        
                                        @error('observ_coordinador')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 15 -->

                                <!-- 16 -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-5 offset-md-5">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Agregar') }}
                                        </button>
                                    </div>
                                </div>
                                <!-- 16 -->
                                @endif

                                @if(Auth::user()->decano())
                                <!-- 17 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="observ_decano" class="col-form-label text-md-left">{{ __('Observaciones Decano') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <textarea id="observ_decano" style="min-height:5rem;" type="text" class="form-control @error('observ_decano') is-invalid @enderror" name="observ_decano" value="{{ old('observ_decano') }}" required autocomplete="off" autofocus></textarea>
                                        
                                        @error('observ_decano')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 17 -->

                                <!-- 18 -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-5 offset-md-5">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Agregar') }}
                                        </button>
                                    </div>
                                </div>
                                <!-- 18 -->
                                
                                <br>
                                @endif --}}

                            <!-- observaciones -->

                            <!-- 19 -->
                            <div class="form-group row mb-0">
                                <div class="col-md-5 offset-md-5">
                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear') }}
                                    </button>
                                </div>
                            </div>
                            <!-- 19 -->
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
        
    @endsection  