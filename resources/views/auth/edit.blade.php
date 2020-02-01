<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->
    @section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Usuario') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ url('users',$usuario->id) }}">
                            @method('PUT')
                            @csrf
    
                            <div class="form-group row">
                                <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
    
                                <div class="col-md-6">
                                    <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ $usuario->usuario }}" 
                                    required autocomplete="name" autofocus>
    
                                    @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="primer_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Primer Nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="primer_nombre" type="text" class="form-control @error('primer_nombre') is-invalid @enderror" name="primer_nombre" value="{{ $usuario->primer_nombre }}" 
                                    required autocomplete="primer_nombre" autofocus>
    
                                    @error('primer_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="segundo_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="segundo_nombre" type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" name="segundo_nombre" value="{{ $usuario->segundo_nombre }}" 
                                    autocomplete="segundo_nombre" autofocus>
    
                                    @error('segundo_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="primer_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Primer Apellido') }}</label>
    
                                <div class="col-md-6">
                                    <input id="primer_apellido" type="text" class="form-control @error('primer_apellido') is-invalid @enderror" name="primer_apellido" value="{{ $usuario->primer_apellido }}" 
                                    required autocomplete="primer_apellido" autofocus>
    
                                    @error('primer_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="segundo_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Apellido') }}</label>
    
                                <div class="col-md-6">
                                    <input id="segundo_apellido" type="text" class="form-control @error('segundo_apellido') is-invalid @enderror" name="segundo_apellido" value="{{ $usuario->segundo_apellido }}" }
                                    required autocomplete="segundo_apellido" autofocus>
    
                                    @error('segundo_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_tipo_identificacion" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Identificación') }}</label>
    
                                <div class="col-md-6">
                                    <select name="id_tipo_identificacion" class="form-control" required>
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
                            </div>

                            <div class="form-group row">
                                <label for="num_identificacion" class="col-md-4 col-form-label text-md-right">{{ __('N° Identificación') }}</label>
    
                                <div class="col-md-6">
                                    <input id="num_identificacion"  class="form-control @error('num_identificacion') is-invalid @enderror" name="num_identificacion" value="{{ $usuario->id }}" 
                                    required autocomplete="num_identificacion" autofocus>
    
                                    @error('num_identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>
    
                                <div class="col-md-6">
                                    <select name="id_categoria" class="form-control" required>
                                        @foreach($categorias as $cat)
                                        <option <?php if($cat->id==$usuario->id_categoria) echo 'selected'?> value="{{$cat->id}}">{{$cat->categoria}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_categoria')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_role" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Usuario') }}</label>
    
                                <div class="col-md-6">
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
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Institucional') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" 
                                    required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            {{-- <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
        
    @endsection   
