<!-- información proyección -->
    <!-- 1 -->
    <div class="form-group row">
        <div class="col-md-3">
            <label for="id_programa_academico" class="col-form-label text-md-right">{{ __('Programa Académico') }}</label>
            <span class="hs-form-required">*</span>
            <select name="id_programa_academico" class="form-control" required>
                {{-- @foreach($programas_academicos as $pro_aca)
                    <option <php if($pro_aca->id==$proyeccion_preliminar->id_programa_academico) echo 'selected'?> value="{{$pro_aca->id}}">{{$pro_aca->programa_academico}}</option>  
                @endforeach --}}
                @foreach($programas_usuario as $pro_aca)
                    <option <?php if($pro_aca['id']==$proyeccion_preliminar->id_programa_academico) echo 'selected'?> value="{{$pro_aca['id']}}">{{$pro_aca['programa_academico']}}</option>  
                    {{-- <option value="{{$prog_aca['id']}}" selected>{{$prog_aca['programa_academico']}}</option>   --}}
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
                {{-- @foreach($espacios_academicos as $esp_aca)
                    <option value="{{$esp_aca->id}}" selected>{{$esp_aca->espacio_academico}}</option>  
                    
                @endforeach --}}
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

        <div class="col-md-2" id="cant_grupos_edit">
            <label for="cant_grupos" class="col-form-label text-md-left">{{ __('Cant. Grupos') }}</label>
            <span class="hs-form-required">*</span>
            <input id="cant_grupos_edit" type="number" max="4" min="1" class="form-control @error('cant_grupos') is-invalid @enderror" name="cant_grupos" 
            value="{{$proyeccion_preliminar->cantidad_grupos}}" autocomplete="off" autofocus>
            
            @error('cant_grupos')
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
                value="{{$proyeccion_preliminar->grupo_1}}" required autocomplete="off" autofocus>
                
                @error('grupo_1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2" id="gp_2_edit">
                <label for="grupo_2" class="col-form-label text-md-left">{{ __('Gp 2') }}</label>
                <input id="grupo_2" type="text" class="form-control @error('grupo_2') is-invalid @enderror" name="grupo_2" 
                value="{{$proyeccion_preliminar->grupo_2}}" autocomplete="off" autofocus>
                @error('grupo_2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2" id="gp_3_edit">
                <label for="grupo_3" class="col-form-label text-md-left">{{ __('Gp 3') }}</label>
                <input id="grupo_3" type="text" class="form-control @error('grupo_3') is-invalid @enderror" name="grupo_3" 
                value="{{$proyeccion_preliminar->grupo_3}}" autocomplete="off" autofocus>
                @error('grupo_3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2" id="gp_4_edit">
                <label for="grupo_4" class="col-form-label text-md-left">{{ __('Gp 4') }}</label>
                <input id="grupo_4" type="text" class="form-control @error('grupo_4') is-invalid @enderror" name="grupo_4" 
                value="{{$proyeccion_preliminar->grupo_4}}" autocomplete="off" autofocus>
                @error('grupo_4')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
        </div>
        <!-- 2.1 -->
<!-- información proyección -->
