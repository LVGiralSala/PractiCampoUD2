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
                        <form method="POST" action="{{ route('proyeccion_store') }}">
                            @csrf

                            <!-- información proyección -->
                                <!-- 1 -->
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="id_proyecto_curricular" class="col-form-label text-md-right">{{ __('Proyecto Curricular') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <select name="id_proyecto_curricular" class="form-control" required>
                                            @foreach($proyectos_curriculares as $pro_cu)
                                                <option value="{{$pro_cu->id}}" selected>{{$pro_cu->proyecto_curricular}}</option>  
                                            @endforeach
                                        </select>
                                        @error('id_proyecto_curricular')
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
                                                <option value="{{$esp_aca->id}}" selected>{{$esp_aca->espacio_academico}}</option>  
                                                
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
                                                <option value="{{$per_aca->id}}" selected>{{$per_aca->periodo_academico}}</option>  
                                                
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
                                                <option value="{{$sem_asig->id}}" selected>{{$sem_asig->semestre_asignatura}}</option>  
                                                
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
                            <!-- información proyección -->

                            <br>
                            <h4>Ruta Principal</h4>
                            <hr class="divider">
                            <br>
                            <!-- ruta principal -->
                                <!-- 2 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="ruta_principal" class="col-form-label text-md-left">{{ __('Ruta Principal') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" value="{{ old('ruta_principal') }}" required autocomplete="off" autofocus>
                                        
                                        @error('ruta_principal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 2 -->

                                <!-- 3 -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="detalle_recorrido" class="col-form-label text-md-left">{{ __('Detalle Recorrido') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <textarea id="detalle_recorrido" style="min-height:5rem;" type="text" class="form-control @error('detalle_recorrido') is-invalid @enderror" name="detalle_recorrido" value="{{ old('detalle_recorrido') }}" required autocomplete="off" autofocus></textarea>
                                        
                                        @error('detalle_recorrido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- 3 -->

                                <!-- 4 -->
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="lugar_salida" class="col-form-label text-md-left">{{ __('Lugar Salida') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_salida" type="text" class="form-control @error('lugar_salida') is-invalid @enderror" name="lugar_salida" value="{{ old('lugar_salida') }}" required autocomplete="off" autofocus>
                                        
                                        @error('lugar_salida')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="fecha_salida" class="col-form-label text-md-left">{{ __('Fecha Salida') }}</label>
                                          <div class="input-group">
                                             <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          <input class="form-control datetimepicker" name="fecha_salida"  type="text" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="lugar_regreso" class="col-form-label text-md-left">{{ __('Lugar Regreso') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="lugar_regreso" type="text" class="form-control @error('lugar_regreso') is-invalid @enderror" name="lugar_regreso" value="{{ old('lugar_regreso') }}" required autocomplete="off" autofocus>
                                        
                                        @error('lugar_regreso')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="fecha_regreso" class="col-form-label text-md-left">{{ __('Fecha Regreso') }}</label>
                                          <div class="input-group">
                                             <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          <input class="form-control datetimepicker" name="fecha_regreso"  type="text" required>
                                        </div>
                                    </div>

                                </div>
                                <!-- 4 -->

                                <!-- 5 -->
                                <div class="form-group row">
                                    {{-- <div class="col-md-2">
                                        <label for="ruta_principal" class="col-form-label text-md-left">{{ __('Días') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" value="{{ old('ruta_principal') }}" required autocomplete="off" autofocus>
                                        
                                        @error('ruta_principal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    <div class="col-md-2">
                                        <label for="ruta_principal" class="col-form-label text-md-left">{{ __('Estudiantes') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" value="{{ old('ruta_principal') }}" required autocomplete="off" autofocus>
                                        
                                        @error('ruta_principal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="ruta_principal" class="col-form-label text-md-left">{{ __('Acompañantes') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" value="{{ old('ruta_principal') }}" required autocomplete="off" autofocus>
                                        
                                        @error('ruta_principal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label for="ruta_principal" class="col-form-label text-md-left">{{ __('Vehículos') }}</label>
                                        <span class="hs-form-required">*</span>
                                        <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" value="{{ old('ruta_principal') }}" required autocomplete="off" autofocus>
                                        
                                        @error('ruta_principal')
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
                                                <option value="{{$sem_asig->id}}" selected>{{$sem_asig->semestre_asignatura}}</option>  
                                                
                                            @endforeach
                                        </select>
                                        @error('id_semestre_asignatura')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                            <label for="ruta_principal" class="col-form-label text-md-left">{{ __('Cap. Vehíc.') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <input id="ruta_principal" type="text" class="form-control @error('ruta_principal') is-invalid @enderror" name="ruta_principal" value="{{ old('ruta_principal') }}" required autocomplete="off" autofocus>
                                            
                                            @error('ruta_principal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>

                                <!-- 5 -->

                                <!-- 6 -->

                                <!-- 6 -->

                            <!-- ruta principal -->
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
        
    @endsection  