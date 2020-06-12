@if($usuario_log->id != $proyeccion_preliminar->id_docente_responsable)
<!-- información proyección -->
    <!-- 1 -->
    <div class="form-group row">
        <div class="col-md-5">
            <label for="id_programa_academico" class="col-form-label text-md-right">{{ __('Programa Académico') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_programa_academico" class="form-control" required readonly disabled>
                @foreach($programas_usuario as $pro_aca)
                    <option <?php if($pro_aca['id']==$proyeccion_preliminar->id_programa_academico) echo 'selected'?> value="{{$pro_aca['id']}}">{{$pro_aca['programa_academico']}}</option>  
                @endforeach
            </select>
            @error('id_programa_academico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-5">
            <label for="id_espacio_academico" class="col-form-label text-md-right">{{ __('Espacio Académico') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_espacio_academico" class="form-control" required disabled>
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

        
        <div class="col-md-1">
            <label for="id_semestre_asignatura" class="col-form-label text-md-right">{{ __('Sem.') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_semestre_asignatura" class="form-control" required disabled>
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
        
        <div class="col-md-1">
            <label for="id_periodo_academico" class="col-form-label text-md-right">{{ __('Per.') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_periodo_academico" class="form-control" required disabled>
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
    </div>
    <!-- 1 -->


    <!-- 2 -->
    <div  class="form-group row">
        <div class="col-md-2">
            <label for="num_estudiantes_aprox" class="col-form-label text-md-left">{{ __('Estudiantes') }}</label>
            <span class="hs-form-required">*</span>
            <input id="num_estudiantes_aprox" type="text" class="form-control @error('num_estudiantes_aprox') is-invalid @enderror" name="num_estudiantes_aprox" 
            value="{{$proyeccion_preliminar->num_estudiantes_aprox}}" required autocomplete="off" autofocus readonly>
            
            @error('num_estudiantes_aprox')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        
        <div class="col-md-2">
            <label for="cant_grupos_edit" class="col-form-label text-md-left">{{ __('Cant. Grupos') }}</label>
            <span class="hs-form-required">*</span>
            <input id="cant_grupos_edit" type="number" max="4" min="1" class="form-control @error('cant_grupos_edit') is-invalid @enderror" name="cant_grupos_edit" 
            value="{{$proyeccion_preliminar->cantidad_grupos}}" autocomplete="off" autofocus readonly>
            
            @error('cant_grupos_edit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-2">
            <label for="num_acompaniantes" class="col-form-label text-md-left">{{ __('Acompañantes') }}</label>
            {{-- <span class="hs-form-required">*</span> --}}
            <input id="num_acompaniantes" type="text" class="form-control @error('num_acompaniantes') is-invalid @enderror" name="num_acompaniantes" 
            value="{{$proyeccion_preliminar->num_acompaniantes}}" autocomplete="off" autofocus readonly>
            
            @error('num_acompaniantes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- 2 -->

     <!-- 2.1 -->
     <div  class="form-group row"  id="Grupos_edit">
        <div class="col-md-2" id="gp_1_edit">
            <label for="grupo_1" class="col-form-label text-md-left">{{ __('Gp 1') }}</label>
            <span class="hs-form-required">*</span>
            <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
            value="{{$proyeccion_preliminar->grupo_1}}" required autocomplete="off" autofocus readonly>
            
            @error('grupo_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @if($proyeccion_preliminar->cantidad_grupos == 2)
        <div class="col-md-2" id="gp_2_edit">
            <label for="grupo_2" class="col-form-label text-md-left">{{ __('Gp 2') }}</label>
            <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
            value="{{$proyeccion_preliminar->grupo_2}}" autocomplete="off" autofocus readonly>
            @error('grupo_2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @endif

        @if($proyeccion_preliminar->cantidad_grupos == 3)
        <div class="col-md-2" id="gp_3_edit">
            <label for="grupo_3" class="col-form-label text-md-left">{{ __('Gp 3') }}</label>
            <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
            value="{{$proyeccion_preliminar->grupo_3}}" autocomplete="off" autofocus readonly>
            @error('grupo_3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        @endif

        @if($proyeccion_preliminar->cantidad_grupos == 4)
        <div class="col-md-2" id="gp_4_edit">
            <label for="grupo_4" class="col-form-label text-md-left">{{ __('Gp 4') }}</label>
            <input id="grupo_4" type="text" class="form-control @error('grupo_4') is-invalid @enderror" name="grupo_4" 
            value="{{$proyeccion_preliminar->grupo_4}}" autocomplete="off" autofocus readonly>
            @error('grupo_4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        @endif
            
    </div>
    <!-- 2.1 -->

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
            <span class="hs-form-required">*</span>
            <input id="destino_rp" type="text" class="form-control @error('destino_rp') is-invalid @enderror" name="destino_rp" 
            value="{{$proyeccion_preliminar->destino_rp}}" required autocomplete="off" autofocus readonly>

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
            value="{{$proyeccion_preliminar->ruta_principal}}" required autocomplete="off" autofocus readonly>
            
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
            required autocomplete="off" autofocus readonly><?php echo $proyeccion_preliminar->det_recorrido_interno_rp?></textarea>
            
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
            <span class="hs-form-required">*</span>
            <input id="lugar_salida_rp" type="text" class="form-control @error('lugar_salida_rp') is-invalid @enderror" name="lugar_salida_rp" 
            value="{{$proyeccion_preliminar->lugar_salida_rp}}" required autocomplete="off" autofocus readonly>
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_salida_aprox_rp"  type="text" required
              value="{{$proyeccion_preliminar->fecha_salida_aprox_rp}}" readonly disabled>
            </div>
        </div>

        <div class="col-md-3">
            <label for="lugar_regreso_rp" class="col-form-label text-md-left">{{ __('Punto Encuentro Regreso') }}</label>
            <span class="hs-form-required">*</span>
            <input id="lugar_regreso_rp" type="text" class="form-control @error('lugar_regreso_rp') is-invalid @enderror" name="lugar_regreso_rp" 
            value="{{$proyeccion_preliminar->lugar_regreso_rp}}" required autocomplete="off" autofocus readonly>
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_regreso_aprox_rp"  type="text" required
              value="{{$proyeccion_preliminar->fecha_regreso_aprox_rp}}" readonly disabled>
            </div>
        </div>

        <div class="col-md-2">
            <label for="duracion_rp" class="col-form-label text-md-left">{{ __('Duración Días') }}</label>
            {{-- <span class="hs-form-required">*</span> --}}
            <input id="duracion_rp" type="text" class="form-control @error('duracion_rp') is-invalid @enderror" name="duracion_rp" 
            value="{{ $proyeccion_preliminar->duracion_num_dias_rp}}" autocomplete="off" autofocus readonly>
            
            @error('duracion_rp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>
    <!-- 6 -->

    <!-- 8 transporte_rp_1 -->
    <div class="form-group row">
        <div class="col-md-12" id="transporte_rp">
            <div class="row" id="transporte_rp_children">
                <div class="col-md-2">
                    <label for="id_tipo_transporte_rp_[]" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                    <span class="hs-form-required">*</span>
                    <select name="id_tipo_transporte_rp_[]" class="form-control" required  disabled>
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
                    <label for="otro_transporte_ra_1" class="col-form-label text-md-left">{{ __('Cuál?') }}</label>
                    <span class="hs-form-required">*</span>
                    <input id="otro_transporte_ra_1" type="text" class="form-control @error('otro_transporte_ra_1') is-invalid @enderror" name="otro_transporte_ra_1" 
                    value="{{ $proyeccion_preliminar->otro_transporte_ra_1 }}"  autocomplete="off" autofocus required readonly>
        
                    @error('otro_transporte_ra_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="vlr_otro_transporte_rp_1" class="col-form-label text-md-left">{{ __('Valor Transp.?') }}</label>
                    <span class="hs-form-required">*</span>
                    <input id="vlr_otro_transporte_rp_1" type="text" class="form-control @error('vlr_otro_transporte_rp_1') is-invalid @enderror" name="vlr_otro_transporte_rp_1" 
                    value="{{ $proyeccion_preliminar->vlr_otro_transporte_rp_1 }}"  autocomplete="off" autofocus readonly onkeyup="formatVlr(this)" onchange="formatVlr(this)">

                    @error('vlr_otro_transporte_rp_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="capac_transporte_rp_[]" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                    <span class="hs-form-required">*</span>
                    <input id="capac_transporte_rp_[]" type="text" class="form-control @error('capac_transporte_rp_[]') is-invalid @enderror" name="capac_transporte_rp_[]" 
                    value="{{$proyeccion_preliminar->capac_transporte_rp_1}}" required autocomplete="off" autofocus readonly>

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
                    value="{{$proyeccion_preliminar->det_tipo_transporte_rp_1}}" required autocomplete="off" autofocus readonly>

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
                    value="{{ $nombre_usuario }}" required autocomplete="off" autofocus readonly>
                    
                    @error('docente_resp_transp_rp_[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="exclusiv_tiempo_rp_1">{{ __('Disponibilidad Permanente?') }}</label>
                        <span class="hs-form-required">*</span>
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1" value="1" 
                                <?php if($proyeccion_preliminar->exclusiv_tiempo_rp_1 == 1) echo 'checked'?> disabled>
                                <label class="form-check-label" for="">Si</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1"  value="2"
                                    <?php if($proyeccion_preliminar->exclusiv_tiempo_rp_1 == 2) echo 'checked'?> disabled>
                                    <label class="form-check-label" for="">No</label>
                                </div>
                            </div>

                            {{-- <a class="add_transp_rp imgButton" title="Add field"><img src="{{asset('img/add-icon.png')}}"/></a> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-1">
                </div> --}}
            </div>

        </div>

    </div>
    <!-- 8 transporte_rp_1 -->

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
                    <input type="checkbox" name="areas_acuaticas_rp" 
                    <?php if($proyeccion_preliminar->areas_acuaticas_rp == 1) echo 'checked'?> disabled>
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
                    <input type="checkbox" name="alturas_rp"
                    <?php if($proyeccion_preliminar->alturas_rp == 1) echo 'checked'?> disabled>
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
                    <input type="checkbox" name="riesgo_biologico_rp"
                    <?php if($proyeccion_preliminar->riesgo_biologico_rp == 1) echo 'checked'?> disabled>
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
                    <input type="checkbox" name="espacios_confinados_rp"
                    <?php if($proyeccion_preliminar->espacios_confinados_rp == 1) echo 'checked'?> disabled>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- 4 -->

    </div>
    <!-- preguntas -->

    {{-- <br> --}}
    <h4>Coordinador</h4>
    <hr class="divider">
    {{-- <br> --}}

    <!-- preguntas -->
    <div class="form-group row">
        <!-- 1 -->
        <div class="col-md-11">
            <div class="form-group">
                <label for="conf_curricul_plan_pract_rp">{{ __('La duración de esta práctica presenta conformidad a la curricularización del 
                plan de practicas del proyecto curricular aprobado por el consejo de facultades?') }}</label>
            </div>
        </div>

        <div class="col-md-1">
            <div class="form-group" style="margin-right: 15px;">
                <label class="switch">
                    <input type="checkbox" name="conf_curricul_plan_pract_rp">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- 1 -->

        <!-- 2 -->
        {{-- <div class="col-md-11">
            <div class="form-group">
                <label for="cumple_objetivo_grl">{{ __('La ruta propuesta permite el desarrollo de los objetivos de la práctica?)') }}</label>
            </div>
        </div>

        <div class="col-md-1">
            <div class="form-group" style="margin-right: 15px;">
                <label class="switch">
                    <input type="checkbox" name="cumple_objetivo_grl">
                    <span class="slider round"></span>
                </label>
            </div>
        </div> --}}
        <!-- 2 -->

    </div>
    <!-- preguntas -->


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
            <input id="destino_ra" type="text" class="form-control @error('destino_ra') is-invalid @enderror" name="destino_ra" 
            value="{{$proyeccion_preliminar->destino_ra}}" required autocomplete="off" autofocus readonly>
            
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
            value="{{$proyeccion_preliminar->ruta_principal}}" required autocomplete="off" autofocus readonly>
            
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
            required autocomplete="off" autofocus readonly><?php echo $proyeccion_preliminar->det_recorrido_interno_ra?></textarea>
            
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
            value="{{$proyeccion_preliminar->lugar_salida_ra}}" required autocomplete="off" autofocus readonly>
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_salida_aprox_ra"  type="text" required
              value="{{$proyeccion_preliminar->fecha_salida_aprox_ra}}" disabled>
            </div>
        </div>

        <div class="col-md-3">
            <label for="lugar_regreso_ra" class="col-form-label text-md-left">{{ __('Punto Encuentro Regreso') }}</label>
            <span class="hs-form-required">*</span>
            <input id="lugar_regreso_ra" type="text" class="form-control @error('lugar_regreso_ra') is-invalid @enderror" name="lugar_regreso_ra" 
            value="{{$proyeccion_preliminar->lugar_regreso_ra}}" required autocomplete="off" autofocus readonly>
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_regreso_aprox_ra"  type="text" required
              value="{{$proyeccion_preliminar->fecha_regreso_aprox_rp}}" disabled>
            </div>
        </div>

        <div class="col-md-2">
            <label for="duracion_ra" class="col-form-label text-md-left">{{ __('Duración Días') }}</label>
            {{-- <span class="hs-form-required">*</span> --}}
            <input id="duracion_ra" type="text" class="form-control @error('duracion_ra') is-invalid @enderror" name="duracion_ra" 
            value="{{ $proyeccion_preliminar->duracion_num_dias_ra}}" autocomplete="off" autofocus readonly>
            
            @error('duracion_ra')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>
    <!-- 12 -->

    <!-- 14 transporte_ra_1 -->
    <div class="form-group row">
        <div class="col-md-2">
            <label for="id_tipo_transporte_ra_[]" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_tipo_transporte_ra_[]" class="form-control" required  disabled>
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
            <label for="otro_transporte_ra_1" class="col-form-label text-md-left">{{ __('Cuál?') }}</label>
            <span class="hs-form-required">*</span>
            <input id="otro_transporte_ra_1" type="text" class="form-control @error('otro_transporte_ra_1') is-invalid @enderror" name="otro_transporte_ra_1" 
            value="{{$proyeccion_preliminar->otro_transporte_ra_1}}"  autocomplete="off" autofocus required readonly>

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
            value="{{ $proyeccion_preliminar->vlr_otro_transporte_ra_1 }}"  autocomplete="off" autofocus readonly onkeyup="formatVlr(this)" onchange="formatVlr(this)">

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
            value="{{$proyeccion_preliminar->capac_transporte_ra_1}}" required autocomplete="off" autofocus readonly>
            
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
            value="{{$proyeccion_preliminar->det_tipo_transporte_ra_1}}" required autocomplete="off" autofocus readonly>
            
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
            value="{{ $nombre_usuario }}" required autocomplete="off" autofocus readonly>
            
            @error('docente_resp_transp_ra_[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="exclusiv_tiempo_ra_1">{{ __('Disponibilidad Permanente?') }}</label>
                <span class="hs-form-required">*</span>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1" value="1" 
                        <?php if($proyeccion_preliminar->exclusiv_tiempo_ra_1 == 1) echo 'checked'?>  disabled>
                        <label class="form-check-label" for="">Si</label>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1"  value="2"
                            <?php if($proyeccion_preliminar->exclusiv_tiempo_ra_1 == 2) echo 'checked'?>  disabled>
                            <label class="form-check-label" for="">No</label>
                        </div>
                    </div>

                    {{-- <a class="add_transp_ra imgButton" title="Add field"><img src="{{asset('img/add-icon.png')}}"/></a> --}}
                </div>
            </div>
        </div>
        {{-- <div class="col-md-1">
        </div> --}}
    </div>
    <!-- 14 transporte_ra_1 -->

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
                    <input type="checkbox" name="areas_acuaticas_ra"
                    <?php if($proyeccion_preliminar->areas_acuaticas_ra == 1) echo 'checked'?> disabled>
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
                    <input type="checkbox" name="alturas_ra"
                    <?php if($proyeccion_preliminar->alturas_ra == 1) echo 'checked'?> disabled>
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
                    <input type="checkbox" name="riesgo_biologico_ra"
                    <?php if($proyeccion_preliminar->riesgo_biologico_ra == 1) echo 'checked'?> disabled>
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
                    <input type="checkbox" name="espacios_confinados_ra"
                    <?php if($proyeccion_preliminar->espacios_confinados_ra == 1) echo 'checked'?> disabled>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- 4 -->

    </div>
    <!-- preguntas -->

    {{-- <br> --}}
    <h4>Coordinador</h4>
    <hr class="divider">
    {{-- <br> --}}

    <!-- preguntas -->
    <div class="form-group row">
        <!-- 1 -->
        <div class="col-md-11">
            <div class="form-group">
                <label for="conf_curricul_plan_pract_ra">{{ __('La duración de esta práctica presenta conformidad a la curricularización del 
                plan de practicas del proyecto curricular aprobado por el consejo de facultades?') }}</label>
            </div>
        </div>

        <div class="col-md-1">
            <div class="form-group" style="margin-right: 15px;">
                <label class="switch">
                    <input type="checkbox" name="conf_curricul_plan_pract_ra">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- 1 -->

        <!-- 2 -->
        {{-- <div class="col-md-11">
            <div class="form-group">
                <label for="cumple_objetivo_grl">{{ __('La ruta propuesta permite el desarrollo de los objetivos de la práctica?)') }}</label>
            </div>
        </div>

        <div class="col-md-1">
            <div class="form-group" style="margin-right: 15px;">
                <label class="switch">
                    <input type="checkbox" name="cumple_objetivo_grl">
                    <span class="slider round"></span>
                </label>
            </div>
        </div> --}}
        <!-- 2 -->

    </div>
    <!-- preguntas -->
    

<!-- ruta alterna -->

{{-- <br> --}}
<h4>Observaciones</h4>
<hr class="divider">
<br>

<!-- Coordinador-->

    <!-- 18 -->
    <div class="form-group row">
        <div class="col-md-12">
            <label for="observ_coordinador" class="col-form-label text-md-left">{{ __('Observaciones Coordinador') }}</label>
            <textarea id="observ_coordinador" style="min-height:5rem;" type="text" class="form-control @error('observ_coordinador') is-invalid @enderror" name="observ_coordinador" 
            autocomplete="off" autofocus ><?php echo $proyeccion_preliminar->observ_coordinador?></textarea>

            @error('observ_coordinador')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- 18 -->

    <!-- 19 -->
    <!-- estado coord-->
    <!-- 0 -->
    <div class="form-group row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="id_estado">Estado Área de Coordinación</label>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="aprobacion_coordinador" value="5"
                    <?php if($proyeccion_preliminar->aprobacion_coordinador == 5) echo 'checked'?>  >
                    <label class="form-check-label" for="">Pendiente</label>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="aprobacion_coordinador" value="3"
                    <?php if($proyeccion_preliminar->aprobacion_coordinador == 3) echo 'checked'?>  >
                    <label class="form-check-label" for="">Aprobado</label>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aprobacion_coordinador"  value="4" 
                        <?php if($proyeccion_preliminar->aprobacion_coordinador == 4) echo 'checked'?>  >
                        <label class="form-check-label" for="">Rechazado</label>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
    <!-- 0 -->
    <!-- estado coord-->
    <!-- 19 -->

<!-- Coordinador-->
@endif

@if($usuario_log->id == $proyeccion_preliminar->id_docente_responsable)
<!-- información proyección -->
    <!-- 1 -->
    <div class="form-group row">
        <div class="col-md-5">
            <label for="id_programa_academico" class="col-form-label text-md-right">{{ __('Programa Académico') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_programa_academico" class="form-control" required >
                
                @foreach($programas_usuario as $pro_aca)
                    <option <?php if($pro_aca['id']==$proyeccion_preliminar->id_programa_academico) echo 'selected'?> value="{{$pro_aca['id']}}">{{$pro_aca['programa_academico']}}</option>  
                @endforeach
            </select>
            @error('id_programa_academico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-5">
            <label for="id_espacio_academico" class="col-form-label text-md-right">{{ __('Espacio Académico') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_espacio_academico" class="form-control" required >
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

        <div class="col-md-1">
            <label for="id_periodo_academico" class="col-form-label text-md-right">{{ __('Per.') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_periodo_academico" class="form-control" required >
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

        <div class="col-md-1">
            <label for="id_semestre_asignatura" class="col-form-label text-md-right">{{ __('Sem.') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_semestre_asignatura" class="form-control" required >
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
            value="{{$proyeccion_preliminar->num_estudiantes_aprox}}" required autocomplete="off" autofocus >
            
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
            value="{{$proyeccion_preliminar->num_acompaniantes}}" autocomplete="off" autofocus >
            
            @error('num_acompaniantes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- <div class="col-md-2" id="cant_grupos_edit">
            <label for="cant_grupos_edit" class="col-form-label text-md-left">{{ __('Cant. Grupos') }}</label>
            <span class="hs-form-required">*</span>
            <input id="cant_grupos_edit" type="number" max="4" min="1" class="form-control @error('cant_grupos') is-invalid @enderror" name="cant_grupos" 
            value="{{$proyeccion_preliminar->cantidad_grupos}}" autocomplete="off" autofocus >
            
            @error('cant_grupos_edit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}

    </div>
    <!-- 2 -->

     <!-- 2.1 -->
     <div  class="form-group row"  id="Grupos_edit">
        <div class="col-md-2" id="gp_1_edit">
            <label for="grupo_1" class="col-form-label text-md-left">{{ __('Gp 1') }}</label>
            <span class="hs-form-required">*</span>
            <input id="grupo_1" type="text" class="form-control @error('grupo_1') is-invalid @enderror" name="grupo_1" 
            value="{{$proyeccion_preliminar->grupo_1}}" required autocomplete="off" autofocus >
            
            @error('grupo_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-2" id="gp_2_edit">
            <label for="grupo_2" class="col-form-label text-md-left">{{ __('Gp 2') }}</label>
            <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
            value="{{$proyeccion_preliminar->grupo_2}}" autocomplete="off" autofocus >
            @error('grupo_2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-2" id="gp_3_edit">
            <label for="grupo_3" class="col-form-label text-md-left">{{ __('Gp 3') }}</label>
            <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
            value="{{$proyeccion_preliminar->grupo_3}}" autocomplete="off" autofocus >
            @error('grupo_3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-2" id="gp_4_edit">
            <label for="grupo_4" class="col-form-label text-md-left">{{ __('Gp 4') }}</label>
            <input id="grupo_4" type="text" class="form-control @error('grupo_4') is-invalid @enderror" name="grupo_4" 
            value="{{$proyeccion_preliminar->grupo_4}}" autocomplete="off" autofocus >
            @error('grupo_4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            
    </div>
    <!-- 2.1 -->

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
            <span class="hs-form-required">*</span>
            <input id="destino_rp" type="text" class="form-control @error('destino_rp') is-invalid @enderror" name="destino_rp" 
            value="{{$proyeccion_preliminar->destino_rp}}" required autocomplete="off" autofocus >

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
            value="{{$proyeccion_preliminar->ruta_principal}}" required autocomplete="off" autofocus >
            
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
            required autocomplete="off" autofocus ><?php echo $proyeccion_preliminar->det_recorrido_interno_rp?></textarea>
            
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
            <label for="lugar_salida_rp" class="col-form-label text-md-left">{{ __('Punto Encuentro Salida') }}</label>
            <span class="hs-form-required">*</span>
            <input id="lugar_salida_rp" type="text" class="form-control @error('lugar_salida_rp') is-invalid @enderror" name="lugar_salida_rp" 
            value="{{$proyeccion_preliminar->lugar_salida_rp}}" required autocomplete="off" autofocus >
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_salida_aprox_rp"  type="text" required
              value="{{$proyeccion_preliminar->fecha_salida_aprox_rp}}"  >
            </div>
        </div>

        <div class="col-md-4">
            <label for="lugar_regreso_rp" class="col-form-label text-md-left">{{ __('Punto Encuentro Regreso') }}</label>
            <span class="hs-form-required">*</span>
            <input id="lugar_regreso_rp" type="text" class="form-control @error('lugar_regreso_rp') is-invalid @enderror" name="lugar_regreso_rp" 
            value="{{$proyeccion_preliminar->lugar_regreso_rp}}" required autocomplete="off" autofocus >
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_regreso_aprox_rp"  type="text" required
              value="{{$proyeccion_preliminar->fecha_regreso_aprox_rp}}"  >
            </div>
        </div>

    </div>
    <!-- 6 -->

    <!-- 8 transporte_rp_1 -->
    <div class="form-group row">
        <div class="col-md-12" id="transporte_rp">
            <div class="row" id="transporte_rp_children">
                <div class="col-md-2">
                    <label for="id_tipo_transporte_rp_[]" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
                    <span class="hs-form-required">*</span>
                    <select name="id_tipo_transporte_rp_[]" class="form-control" required  onchange="otroTransporte(this.value,1)">
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
                
                <div class="col-md-3">
                    <label for="otro_transporte_rp_1" class="col-form-label text-md-left">{{ __('Cuál?') }}</label>
                    <span class="hs-form-required">*</span>
                    <input id="otro_transporte_rp_1" type="text" class="form-control @error('otro_transporte_rp_1') is-invalid @enderror" name="otro_transporte_rp_1" 
                    value=""  autocomplete="off" autofocus required readonly>

                    @error('otro_transporte_rp_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="capac_transporte_rp_[]" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                    <span class="hs-form-required">*</span>
                    <input id="capac_transporte_rp_[]" type="text" class="form-control @error('capac_transporte_rp_[]') is-invalid @enderror" name="capac_transporte_rp_[]" 
                    value="{{$proyeccion_preliminar->capac_transporte_rp_1}}" required autocomplete="off" autofocus >

                    @error('capac_transporte_rp_[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-5">
                    <label for="det_tipo_transporte_rp_[]" class="col-form-label text-md-left">{{ __('Det. Vehíc.') }}</label>
                    <span class="hs-form-required">*</span>
                    <input id="det_tipo_transporte_rp_[]" type="text" class="form-control @error('det_tipo_transporte_rp_[]') is-invalid @enderror" name="det_tipo_transporte_rp_[]" 
                    value="{{$proyeccion_preliminar->det_tipo_transporte_rp_1}}" required autocomplete="off" autofocus >

                    @error('det_tipo_transporte_rp_[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="exclusiv_tiempo_rp_1">{{ __('Tiempo Completo?') }}</label>
                        <span class="hs-form-required">*</span>
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1" value="1" 
                                <?php if($proyeccion_preliminar->exclusiv_tiempo_rp_1 == 1) echo 'checked'?> >
                                <label class="form-check-label" for="">Si</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="exclusiv_tiempo_rp_1"  value="2"
                                    <?php if($proyeccion_preliminar->exclusiv_tiempo_rp_1 == 2) echo 'checked'?> >
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
                    <input type="checkbox" name="areas_acuaticas_rp" 
                    <?php if($proyeccion_preliminar->areas_acuaticas_rp == 1) echo 'checked'?>>
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
                    <input type="checkbox" name="alturas_rp"
                    <?php if($proyeccion_preliminar->alturas_rp == 1) echo 'checked'?>>
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
                    <input type="checkbox" name="riesgo_biologico_rp"
                    <?php if($proyeccion_preliminar->riesgo_biologico_rp == 1) echo 'checked'?>>
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
                    <input type="checkbox" name="espacios_confinados_rp"
                    <?php if($proyeccion_preliminar->espacios_confinados_rp == 1) echo 'checked'?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- 4 -->

    </div>
    <!-- preguntas -->

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
            <input id="destino_ra" type="text" class="form-control @error('destino_ra') is-invalid @enderror" name="destino_ra" 
            value="{{$proyeccion_preliminar->destino_ra}}" required autocomplete="off" autofocus >
            
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
            value="{{$proyeccion_preliminar->ruta_principal}}" required autocomplete="off" autofocus >
            
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
            required autocomplete="off" autofocus ><?php echo $proyeccion_preliminar->det_recorrido_interno_ra?></textarea>
            
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
            <label for="lugar_salida_ra" class="col-form-label text-md-left">{{ __('Punto Encuentro Salida') }}</label>
            <span class="hs-form-required">*</span>
            <input id="lugar_salida_ra" type="text" class="form-control @error('lugar_salida_ra') is-invalid @enderror" name="lugar_salida_ra" 
            value="{{$proyeccion_preliminar->lugar_salida_ra}}" required autocomplete="off" autofocus >
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_salida_aprox_ra"  type="text" required
              value="{{$proyeccion_preliminar->fecha_salida_aprox_ra}}" >
            </div>
        </div>

        <div class="col-md-4">
            <label for="lugar_regreso_ra" class="col-form-label text-md-left">{{ __('Punto Encuentro Regreso') }}</label>
            <span class="hs-form-required">*</span>
            <input id="lugar_regreso_ra" type="text" class="form-control @error('lugar_regreso_ra') is-invalid @enderror" name="lugar_regreso_ra" 
            value="{{$proyeccion_preliminar->lugar_regreso_ra}}" required autocomplete="off" autofocus >
            
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
              <input class="inputDate form-control datetimepicker" name="fecha_regreso_aprox_ra"  type="text" required
              value="{{$proyeccion_preliminar->fecha_regreso_aprox_rp}}" >
            </div>
        </div>

    </div>
    <!-- 12 -->

    <!-- 14 transporte_ra_1 -->
    <div class="form-group row">
        <div class="col-md-2">
            <label for="id_tipo_transporte_ra_[]" class="col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_tipo_transporte_ra_[]" class="form-control" required  onchange="otroTransporte2(this.value,1)">
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

        <div class="col-md-3">
            <label for="otro_transporte_ra_1" class="col-form-label text-md-left">{{ __('Cuál?') }}</label>
            <span class="hs-form-required">*</span>
            <input id="otro_transporte_ra_1" type="text" class="form-control @error('otro_transporte_ra_1') is-invalid @enderror" name="otro_transporte_ra_1" 
            value=""  autocomplete="off" autofocus required readonly>

            @error('otro_transporte_ra_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-2">
            <label for="capac_transporte_ra_[]" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
            <span class="hs-form-required">*</span>
            <input id="capac_transporte_ra_[]" type="text" class="form-control @error('capac_transporte_ra_[]') is-invalid @enderror" name="capac_transporte_ra_[]" 
            value="{{$proyeccion_preliminar->capac_transporte_ra_1}}" required autocomplete="off" autofocus >
            
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
            value="{{$proyeccion_preliminar->det_tipo_transporte_ra_1}}"  autocomplete="off" autofocus >
            
            @error('det_tipo_transporte_ra_[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="exclusiv_tiempo_ra_1">{{ __('Tiempo Completo') }}</label>
                <span class="hs-form-required">*</span>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1" value="1" 
                        <?php if($proyeccion_preliminar->exclusiv_tiempo_ra_1 == 1) echo 'checked'?>  >
                        <label class="form-check-label" for="">Si</label>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exclusiv_tiempo_ra_1"  value="2"
                            <?php if($proyeccion_preliminar->exclusiv_tiempo_ra_1 == 2) echo 'checked'?>  >
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
    <!-- 14 transporte_ra_1 -->

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
                    <input type="checkbox" name="areas_acuaticas_ra"
                    <?php if($proyeccion_preliminar->areas_acuaticas_ra == 1) echo 'checked'?>>
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
                    <input type="checkbox" name="alturas_ra"
                    <?php if($proyeccion_preliminar->alturas_ra == 1) echo 'checked'?>>
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
                    <input type="checkbox" name="riesgo_biologico_ra"
                    <?php if($proyeccion_preliminar->riesgo_biologico_ra == 1) echo 'checked'?>>
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
                    <input type="checkbox" name="espacios_confinados_ra"
                    <?php if($proyeccion_preliminar->espacios_confinados_ra == 1) echo 'checked'?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- 4 -->

    </div>
    <!-- preguntas -->

<!-- ruta alterna -->

<br>
<h4>Observaciones</h4>
<hr class="divider">
<br>

<!-- Coordinador-->
    <!-- 18 -->
    <div class="form-group row">
        <div class="col-md-12">
            <label for="observ_coordinador" class="col-form-label text-md-left">{{ __('Observaciones Coordinador') }}</label>
            <textarea id="observ_coordinador" style="min-height:5rem;" type="text" class="form-control @error('observ_coordinador') is-invalid @enderror" name="observ_coordinador" 
            autocomplete="off" autofocus ><?php echo $proyeccion_preliminar->observ_coordinador?></textarea>

            @error('observ_coordinador')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- 18 -->

    <!-- 19 -->
    <!-- estado coord-->
    <!-- 0 -->
    <div class="form-group row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="id_estado">Estado Área de Coordinación</label>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="aprobacion_coordinador" value="5"
                    <?php if($proyeccion_preliminar->aprobacion_coordinador == 5) echo 'checked'?>  >
                    <label class="form-check-label" for="">Pendiente</label>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="aprobacion_coordinador" value="3"
                    <?php if($proyeccion_preliminar->aprobacion_coordinador == 3) echo 'checked'?>  >
                    <label class="form-check-label" for="">Aprobado</label>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aprobacion_coordinador"  value="4" 
                        <?php if($proyeccion_preliminar->aprobacion_coordinador == 4) echo 'checked'?>  >
                        <label class="form-check-label" for="">Rechazado</label>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
    <!-- 0 -->
    <!-- estado coord-->
    <!-- 19 -->

<!-- Coordinador-->
@endif
