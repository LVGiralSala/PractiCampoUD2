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
                        <form method="POST" action="{{ route('proyeccion_update',$proyeccion_preliminar->id) }}">
                            @method('PUT')
                            @csrf

                            <!-- información proyección -->
                                <!-- 1 -->
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="id_programa_academico" class="col-form-label text-md-right">{{ __('Programa Académico') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_programa_academico" class="form-control" required>
                                            @foreach($programas_academicos as $pro_aca)
                                                <option <?php if($pro_aca->id==$proyeccion_preliminar->id_programa_academico) echo 'selected'?> value="{{$pro_aca->id}}">{{$pro_aca->programa_academico}}</option>  
                                            @endforeach
                                        </select>
                                        @error('id_programa_academico')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="id_espacio_academico" class="col-form-label text-md-right">{{ __('Espacio Académico') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_espacio_academico" class="form-control" required>
                                            @foreach($espacios_academicos as $esp_aca)
                                                <option <?php if($esp_aca->id==$proyeccion_preliminar->id_espacio_academico) echo 'selected'?> value="{{$esp_aca->codigo_espacio_academico}}">{{$esp_aca->espacio_academico}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_espacio_academico')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="id_periodo_academico" class="col-form-label text-md-right">{{ __('Per.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_periodo_academico" class="form-control" required>
                                            @foreach($periodos_academicos as $per_aca)
                                                <option <?php if($per_aca->id==$proyeccion_preliminar->id_periodo_academico) echo 'selected'?> value="{{$per_aca->id}}">{{$per_aca->periodo_academico}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_periodo_academico')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="id_semestre_asignatura" class="col-form-label text-md-right">{{ __('Sem.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_semestre_asignatura" class="form-control" required>
                                            @foreach($semestres_asignaturas as $sem_asig)
                                                <option <?php if($sem_asig->id==$proyeccion_preliminar->id_semestre_asignatura) echo 'selected' ?> value="{{$sem_asig->id}}">{{$sem_asig->semestre_asignatura}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_semestre_asignatura')
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
                                        <span class="hs-form-required">*</span>
                                        <input id="num_estudiantes_aprox" type="text" class="form-control @error('num_estudiantes_aprox') is-invalid @enderror" name="num_estudiantes_aprox" 
                                        value="{{$proyeccion_preliminar->num_estudiantes_aprox}}" required autocomplete="off" autofocus>
                                        
                                        @error('num_estudiantes_aprox')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="num_acompaniantes" class="col-form-label text-md-left">{{ __('Acompañantes') }}</label>
                                        {{-- <span class="hs-form-required">*</span> --}}
                                        <input id="num_acompaniantes" type="text" class="form-control @error('num_acompaniantes') is-invalid @enderror" name="num_acompaniantes" 
                                        value="{{$proyeccion_preliminar->num_acompaniantes}}" autocomplete="off" autofocus>
                                        
                                        @error('num_acompaniantes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="grupo_1" class="col-form-label text-md-left">{{ __('Grupo N° 1') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
                                        value="{{$proyeccion_preliminar->grupo_1}}" required autocomplete="off" autofocus>
                                        
                                        @error('grupo_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="grupo_2" class="col-form-label text-md-left">{{ __('Grupo N° 2') }}</label>
                                        <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
                                        value="{{$proyeccion_preliminar->grupo_2}}" autocomplete="off" autofocus>
                                        
                                        @error('grupo_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="grupo_3" class="col-form-label text-md-left">{{ __('Grupo N° 3') }}</label>
                                        <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                                        value="{{$proyeccion_preliminar->grupo_3}}" autocomplete="off" autofocus>
                                        
                                        @error('grupo_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="grupo_4" class="col-form-label text-md-left">{{ __('Grupo N° 4') }}</label>
                                        <input id="grupo_4" type="text" class="form-control @error('grupo_4') is-invalid @enderror" name="grupo_4" 
                                        value="{{$proyeccion_preliminar->grupo_4}}" autocomplete="off" autofocus>
                                        
                                        @error('grupo_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- 2 -->
                            <!-- información proyección -->

                            <br>
                            <h4>Ruta Principal</h4>
                            <hr class="divider">
                            <br>

                            <!-- ruta principal -->
                                <!-- 3 -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="destino_rp" class="col-form-label text-md-left">{{ __('Destino Ruta Principal') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="destino_rp" type="text" class="form-control @error('destino_rp') is-invalid @enderror" name="destino_rp" 
                                        value="{{$proyeccion_preliminar->destino_rp}}" required autocomplete="off" autofocus>

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
                                        <span class="hs-form-required">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" 
                                        value="{{$proyeccion_preliminar->ruta_principal}}" required autocomplete="off" autofocus>
                                        
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
                                        <span class="hs-form-required">*</span>
                                        <textarea id="det_recorrido_interno_rp" style="min-height:5rem;" type="text" class="form-control @error('det_recorrido_interno_rp') is-invalid @enderror" name="det_recorrido_interno_rp" 
                                        required autocomplete="off" autofocus><?php echo $proyeccion_preliminar->det_recorrido_interno_rp?></textarea>
                                        
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
                                    <div class="col-md-4">
                                        <label for="lugar_salida_rp" class="col-form-label text-md-left">{{ __('Lugar Salida') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_salida_rp" type="text" class="form-control @error('lugar_salida_rp') is-invalid @enderror" name="lugar_salida_rp" 
                                        value="{{$proyeccion_preliminar->lugar_salida_rp}}" required autocomplete="off" autofocus>
                                        
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
                                          <input class="form-control datetimepicker" name="fecha_salida_aprox_rp"  type="text" required
                                          value="{{$proyeccion_preliminar->fecha_salida_aprox_rp}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="lugar_regreso_rp" class="col-form-label text-md-left">{{ __('Lugar Regreso') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_regreso_rp" type="text" class="form-control @error('lugar_regreso_rp') is-invalid @enderror" name="lugar_regreso_rp" 
                                        value="{{$proyeccion_preliminar->lugar_regreso_rp}}" required autocomplete="off" autofocus>
                                        
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
                                          <input class="form-control datetimepicker" name="fecha_regreso_aprox_rp"  type="text" required
                                          value="{{$proyeccion_preliminar->fecha_regreso_aprox_rp}}"">
                                        </div>
                                    </div>

                                </div>
                                <!-- 6 -->

                                <!-- 7 -->
                                {{-- <div class="form-group row">

                                    <div class="col-md-2">
                                        <label for="cant_transporte_rp" class="col-form-label text-md-left">{{ __('Cant. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="cant_transporte_rp" type="text" class="form-control @error('cant_transporte_rp') is-invalid @enderror" name="cant_transporte_rp" 
                                        value="{{$proyeccion_preliminar->cant_transporte_rp}}" required autocomplete="off" autofocus>
                                        
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
                                                <select name="id_tipo_transporte_rp_[]" class="form-control" required>
                                                    @foreach($tipos_transportes as $tp_trans)
                                                        <option <?php if($tp_trans->id==$proyeccion_preliminar->id_tipo_transporte_rp_1) echo 'selected'?> value="{{$tp_trans->id}}">{{$tp_trans->tipo_transporte}}</option>  

                                                    @endforeach
                                                </select>
                                                @error('id_tipo_transporte_rp_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="capac_transporte_rp_[]" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <input id="capac_transporte_rp_[]" type="text" class="form-control @error('capac_transporte_rp_[]') is-invalid @enderror" name="capac_transporte_rp_[]" 
                                                value="{{$proyeccion_preliminar->capac_transporte_rp_1}}" required autocomplete="off" autofocus>

                                                @error('capac_transporte_rp_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="det_tipo_transporte_rp_[]" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                                <span class="hs-form-required">*</span>
                                                <input id="det_tipo_transporte_rp_[]" type="text" class="form-control @error('det_tipo_transporte_rp_[]') is-invalid @enderror" name="det_tipo_transporte_rp_[]" 
                                                value="{{$proyeccion_preliminar->det_tipo_transporte_rp_1}}" required autocomplete="off" autofocus>

                                                @error('det_tipo_transporte_rp_[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exclusiv_tiempo_rp_1">{{ __('Tiempo Completo?') }}</label>
                                                    <span class="hs-form-required">*</span>
                                                    <div class="row">

                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1" value="1" 
                                                            <?php if($proyeccion_preliminar->exclusiv_tiempo_rp_1 == 1) echo 'checked'?>>
                                                            <label class="form-check-label" for="">Si</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1"  value="2"
                                                                <?php if($proyeccion_preliminar->exclusiv_tiempo_rp_1 == 2) echo 'checked'?>>
                                                                <label class="form-check-label" for="">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a class="add_transp_rp" title="Add field"><img src="add-icon.png"/></a>
                                            </div>
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
                                                        <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_2"  value="2">
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
                                                        <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_3"  value="2">
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- 8 transporte_rp_3 -->

                            <!-- ruta principal -->

                            <br>
                            <h4>Ruta Alterna</h4>
                            <hr class="divider">
                            <br>

                            <!-- ruta alterna -->
                                <!-- 9 -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="destino_ra" class="col-form-label text-md-left">{{ __('Destino Ruta Alterna') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="destino_ra" type="text" class="form-control @error('destino_ra') is-invalid @enderror" name="destino_ra" 
                                        value="{{$proyeccion_preliminar->destino_ra}}" required autocomplete="off" autofocus>
                                        
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
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_alterna') is-invalid @enderror" name="ruta_alterna" 
                                        value="{{$proyeccion_preliminar->ruta_principal}}" required autocomplete="off" autofocus>
                                        
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
                                        required autocomplete="off" autofocus><?php echo $proyeccion_preliminar->det_recorrido_interno_ra?></textarea>
                                        
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
                                    <div class="col-md-4">
                                        <label for="lugar_salida_ra" class="col-form-label text-md-left">{{ __('Lugar Salida') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_salida_ra" type="text" class="form-control @error('lugar_salida_ra') is-invalid @enderror" name="lugar_salida_ra" 
                                        value="{{$proyeccion_preliminar->lugar_salida_ra}}" required autocomplete="off" autofocus>
                                        
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
                                          <input class="form-control datetimepicker" name="fecha_salida_aprox_ra"  type="text" required
                                          value="{{$proyeccion_preliminar->fecha_salida_aprox_ra}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="lugar_regreso_ra" class="col-form-label text-md-left">{{ __('Lugar Regreso') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_regreso_ra" type="text" class="form-control @error('lugar_regreso_ra') is-invalid @enderror" name="lugar_regreso_ra" 
                                        value="{{$proyeccion_preliminar->lugar_regreso_ra}}" required autocomplete="off" autofocus>
                                        
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
                                          <input class="form-control datetimepicker" name="fecha_regreso_aprox_ra"  type="text" required
                                          value="{{$proyeccion_preliminar->fecha_regreso_aprox_rp}}">
                                        </div>
                                    </div>

                                </div>
                                <!-- 12 -->

                                <!-- 13 -->
                                {{-- <div class="form-group row">

                                    <div class="col-md-2">
                                        <label for="cant_transporte_ra" class="col-form-label text-md-left">{{ __('Cant. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="cant_transporte_ra" type="text" class="form-control @error('cant_transporte_ra') is-invalid @enderror" name="cant_transporte_ra" 
                                        value="{{$proyeccion_preliminar->cant_transporte_ra}}" required autocomplete="off" autofocus>
                                        
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
                                    <div class="col-md-2">
                                        <label for="id_tipo_transporte_ra_[]" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_tipo_transporte_ra_[]" class="form-control" required>
                                            @foreach($tipos_transportes as $tp_trans)
                                                <option <?php if ($tp_trans->id==$proyeccion_preliminar->id_tipo_transporte_ra_1) echo 'selected'?> value="{{$tp_trans->id}}" >{{$tp_trans->tipo_transporte}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_tipo_transporte_ra_[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="capac_transporte_ra_[]" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="capac_transporte_ra_[]" type="text" class="form-control @error('capac_transporte_ra_[]') is-invalid @enderror" name="capac_transporte_ra_[]" 
                                        value="{{$proyeccion_preliminar->capac_transporte_ra_1}}" required autocomplete="off" autofocus>
                                        
                                        @error('capac_transporte_ra_[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="det_tipo_transporte_ra_[]" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="det_tipo_transporte_ra_[]" type="text" class="form-control @error('det_tipo_transporte_ra_[]') is-invalid @enderror" name="det_tipo_transporte_ra_[]" 
                                        value="{{$proyeccion_preliminar->det_tipo_transporte_ra_1}}" required autocomplete="off" autofocus>
                                        
                                        @error('det_tipo_transporte_ra_[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="exclusiv_tiempo_ra_1">{{ __('Tiempo Completo') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <div class="row">

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1" value="1" 
                                                    <?php if($proyeccion_preliminar->exclusiv_tiempo_ra_1 == 1) echo 'checked'?>>
                                                    <label class="form-check-label" for="">Si</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1"  value="2"
                                                        <?php if($proyeccion_preliminar->exclusiv_tiempo_ra_1 == 2) echo 'checked'?>>
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="add_transp_ra" title="Add field"><img src="add-icon.png"/></a>
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
                                        {{ __('Guardar') }}
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