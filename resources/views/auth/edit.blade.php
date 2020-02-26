<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->


    @section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Editar Usuario') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ url('users',$usuario->id) }}">
                            @method('PUT')
                            @csrf
                        
                        <!-- estado -->
                            <!-- 0 -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="id_estado">Estado</label>
                                    <div class="row">

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="id_estado" value="1"
                                            <?php if($usuario->id_estado == 1) echo 'checked'?>>
                                            <label class="form-check-label" for="">Activo</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="id_estado"  value="2" 
                                                <?php if($usuario->id_estado == 2) echo 'checked'?>>
                                                <label class="form-check-label" for="">Inactivo</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- 0 -->
                        <!-- estado -->

                        <!-- información personal -->
                            <br>
                            <h4>Información Personal</h4>
                            <hr class="divider">
                            <br>

                            <!-- 1 -->
                            <div class="form-group row">
                                
                                <div class="col-md-3">
                                    <label for="primer_nombre" class="col-form-label text-md-left">{{ __('Primer Nombre') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="primer_nombre" type="text" class="form-control @error('primer_nombre') is-invalid @enderror" name="primer_nombre" value="{{ $usuario->primer_nombre }}" required autocomplete="primer_nombre" autofocus>
    
                                    @error('primer_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md-3">
                                    <label for="segundo_nombre" class="col-form-label text-md-left">{{ __('Segundo Nombre') }}</label>
                                    <input id="segundo_nombre" type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" name="segundo_nombre" value="{{ $usuario->segundo_nombre }}" autocomplete="segundo_nombre" autofocus>
    
                                    @error('segundo_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md-3">
                                    <label for="primer_apellido" class="col-form-label text-md-right">{{ __('Primer Apellido') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="primer_apellido" type="text" class="form-control @error('primer_apellido') is-invalid @enderror" name="primer_apellido" value="{{ $usuario->primer_apellido }}" required autocomplete="primer_apellido" autofocus>
    
                                    @error('primer_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md-3">
                                    <label for="segundo_apellido" class="col-form-label text-md-right">{{ __('Segundo Apellido') }}</label>
                                    <input id="segundo_apellido" type="text" class="form-control @error('segundo_apellido') is-invalid @enderror" name="segundo_apellido" value="{{ $usuario->segundo_apellido }}" required autocomplete="segundo_apellido" autofocus
                                    >
    
                                    @error('segundo_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- 1 -->

                            <!-- 2 -->
                            <div class="form-group row">
                                
                                <div class="col-md-3">
                                    <label for="id_tipo_identificacion" class="col-form-label text-md-right">{{ __('Tipo Identificación') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <select name="id_tipo_identificacion" class="form-control" required readonly>
                                        @foreach($tipos_identificaciones as $tip_ident)
                                        <option <?php if($tip_ident->id==$usuario->id_tipo_identificacion) echo 'selected'?> value="{{$tip_ident->id}}">{{$tip_ident->sigla}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tipo_identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="num_identificacion" class="col-form-label text-md-right">{{ __('N° Identificación') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="num_identificacion"  class="form-control @error('num_identificacion') is-invalid @enderror" name="num_identificacion" value="{{ $usuario->id }}"
                                    required autocomplete="off" autofocus readonly>
    
                                    @error('num_identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <!-- 2 -->

                            <!-- 3 -->
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <label for="email" class="col-form-label text-md-right">{{ __('Correo Electrónico Institucional') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="off"
                                    readonly>
                                    {{-- onchange="obtenerUsuario(this.value);" --}}
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="telefono" class="col-form-label text-md-right">{{ __('Teléfono') }}</label>
                                    <input id="telefono"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $usuario->telefono }}" autocomplete="off">
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-2">
                                    <label for="celular" class="col-form-label text-md-right">{{ __('Celular') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="celular" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ $usuario->celular }}" required autocomplete="off">
                                    
                                    @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input id="cr" style="color:transparent;display:none" class="form-control" name="cr" autocomplete="off">
                                    
                                </div>

                            </div>
                            <!-- 3 -->

                        <!-- información personal -->

                        <!-- información cuenta -->
                            <br>
                            <h4>Información Cuenta</h4>
                            <hr class="divider">
                            <br>

                            <!-- 4 -->
                            <div class="form-group row">

                                {{-- <div class="col-md-1"></div> --}}
                                
                                <div class="col-md-3">
                                    <label for="usuario" class="col-form-label text-md-left">{{ __('Usuario') }}</label>
                                    {{-- <span class="hs-form-required">*</span> --}}
                                    <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ $usuario->usuario }}" required autocomplete="name" autofocus 
                                    readonly>
    
                                    @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="col-md-3">
                                    <label for="id_role" class="col-form-label text-md-right">{{ __('Tipo Usuario') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <select name="id_role" class="form-control" required>
                                        @foreach($tipos_usuarios as $tip_user)
                                            <option <?php if($tip_user->id==$usuario->id_role) echo 'selected'?> value="{{$tip_user->id}}">{{$tip_user->role}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="id_tipo_vinculacion" class="col-form-label text-md-right">{{ __('Vinculación') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <select name="id_tipo_vinculacion" class="form-control" required>
                                        @foreach($tipos_vinculaciones as $tv)
                                        <option <?php if($tv->id==$usuario->id_tipo_vinculacion) echo 'selected'?> value="{{$tv->id}}">{{$tv->tipo_vinculacion}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tipo_vinculacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="id_espacio_academico_1" class="col-form-label text-md-right">{{ __('Espacio Académico') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <div class="field_wrapper" style="display:flex; flex-wrap:wrap">
                                        {{-- <input type="text" name="id_espacio_academico_1" value="" class="form-control" style="width: 90%;"/> --}}
                                        {{-- <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a> --}}
                                        <select name="id_espacio_academico_1" class="form-control" required>
                                        @foreach($espacios_academicos as $esp)
                                            <option <?php if($esp->id==$usuario->id_espacio_academico_1) echo 'selected' ?> value="{{$esp->id}}">{{$esp->espacio_academico}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- 5 -->

                            <!-- 6 -->
                            <div class="form-group row">

                                <div class="col-md-3">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Contaseña') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="nope">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirmar Constraseña') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="nope">
                                </div>

                            </div>
                            <!-- 6 -->

                        <!-- información cuenta -->

                        <!-- submit -->
                            <!-- 7 -->
                            <div class="form-group row mb-0">
                                <div class="col-md-5 offset-md-5">
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                            <!-- 7 -->
                        <!-- submit -->
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
        
    @endsection   