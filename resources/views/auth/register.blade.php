<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->


    @section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Registro Usuario') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                        <!-- información personal -->
                            <br>
                            <h4>Información Personal</h4>
                            <hr class="divider">
                            <br>

                            <!-- 1 -->
                            <div class="form-group row">
                                {{-- <div class="col-md-1"></div> --}}

                                
                                <div class="col-md-3">
                                    <label for="primer_nombre" class="col-form-label text-md-left">{{ __('Primer Nombre') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="primer_nombre" type="text" class="form-control @error('primer_nombre') is-invalid @enderror" name="primer_nombre" value="{{ old('primer_nombre') }}" required autocomplete="primer_nombre" autofocus>
    
                                    @error('primer_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md-3">
                                    <label for="segundo_nombre" class="col-form-label text-md-left">{{ __('Segundo Nombre') }}</label>
                                    <input id="segundo_nombre" type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" name="segundo_nombre" value="{{ old('segundo_nombre') }}" autocomplete="segundo_nombre" autofocus>
    
                                    @error('segundo_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md-3">
                                    <label for="primer_apellido" class="col-form-label text-md-right">{{ __('Primer Apellido') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="primer_apellido" type="text" class="form-control @error('primer_apellido') is-invalid @enderror" name="primer_apellido" value="{{ old('primer_apellido') }}" required autocomplete="primer_apellido" autofocus>
    
                                    @error('primer_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md-3">
                                    <label for="segundo_apellido" class="col-form-label text-md-right">{{ __('Segundo Apellido') }}</label>
                                    <input id="segundo_apellido" type="text" class="form-control @error('segundo_apellido') is-invalid @enderror" name="segundo_apellido" value="{{ old('segundo_apellido') }}" autocomplete="segundo_apellido" autofocus>
    
                                    @error('segundo_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-1"></div> --}}
                            </div>
                            <!-- 1 -->

                            <!-- 2 -->
                            <div class="form-group row">
                                
                                <div class="col-md-3">
                                    <label for="id_tipo_identificacion" class="col-form-label text-md-right">{{ __('Tipo Identificación') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <select name="id_tipo_identificacion" class="form-control" required>
                                        @foreach($tipos_identificaciones as $tip_ident)
                                            <option value="{{$tip_ident->id}}" selected>{{$tip_ident->tipo_identificacion}}</option>  
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
                                    <input id="num_identificacion"  class="form-control @error('num_identificacion') is-invalid @enderror" name="num_identificacion" value="{{ old('num_identificacion') }}" required autocomplete="off" autofocus>
    
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off"
                                    onchange="obtenerUsuario(this.value);">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="telefono" class="col-form-label text-md-right">{{ __('Teléfono') }}</label>
                                    <input id="telefono"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="off">
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-2">
                                    <label for="celular" class="col-form-label text-md-right">{{ __('Celular') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="celular" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="off">
                                    
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

                        <!-- información contacto -->
                            {{-- <br>
                            <h4>Información Contacto</h4>
                            <hr class="divider">
                            <br> --}}

                            <!-- diercción -->
                            {{-- <div class="form-group row">
                                <div class="col-md-12">
                                    <h5>Dirección</h5>
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('Vía') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <select name="id_tipo_via_1" class="form-control" id="id_tipo_via_1" required>
                                        @foreach($nomenclaturas_urbanas as $nom)
                                            @if($nom->id_elemento_nomenclatura==1)
                                                <option value="{{$nom->id}}">{{$nom->nomenclatura}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('id_tipo_via_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('N° Vía') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="num_via"  class="form-control @error('num_via') is-invalid @enderror" name="num_via" value="{{ old('num_via') }}" required autocomplete="num_via" autofocus
                                    >
    
                                    @error('num_via')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('Det.') }}</label>
                                    <select name="id_complemento_via" class="form-control" required >
                                        @foreach($nomenclaturas_urbanas as $nom)
                                            @if($nom->id_elemento_nomenclatura==4 || $nom->id_elemento_nomenclatura===9)
                                                <option value="{{$nom->id}}">{{$nom->nomenclatura}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('id_complemento_via')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('Det.') }}</label>
                                    <select name="id_prefijo_compl_via" class="form-control" required >
                                        @foreach($nomenclaturas_urbanas as $nom)
                                            @if($nom->id_elemento_nomenclatura===5 || $nom->id_elemento_nomenclatura===9)
                                                <option value="{{$nom->id}}">{{$nom->nomenclatura}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('id_prefijo_compl_via')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('#') }}</label>
                                    <label for="" class="col-form-label text-md-right" >{{ __('Num.1') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="num_placa_1"  class="form-control @error('num_placa_1') is-invalid @enderror" name="num_placa_1" value="{{ old('num_placa_1') }}" required autocomplete="num_placa_1" autofocus
                                    >
                                    
                                    @error('num_placa_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('-') }}</label>
                                    <label for="" class="col-form-label text-md-right">{{ __('Num.2') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="num_placa_2"  class="form-control @error('num_placa_2') is-invalid @enderror" name="num_placa_2" value="{{ old('num_placa_2') }}" required autocomplete="num_placa_2" autofocus
                                    >
                                    
                                    @error('num_placa_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        
                            </div> --}}
                            

                            
                            {{-- <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('Interior') }}</label>
                                    <select name="id_tipo_residencia" class="form-control" required >
                                        @foreach($nomenclaturas_urbanas as $nom)
                                            @if($nom->id_elemento_nomenclatura===7 || $nom->id_elemento_nomenclatura===9)
                                                <option value="{{$nom->id}}">{{$nom->nomenclatura}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('id_tipo_residencia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-2">
                                    <label for="" class="col-form-label text-md-right">{{ __('Det. Interior') }}</label>
                                    <input id="datos_adicionales"  class="form-control @error('datos_adicionales') is-invalid @enderror" name="datos_adicionales" value="{{ old('datos_adicionales') }}" autocomplete="datos_adicionales" autofocus
                                    >
    
                                    @error('datos_adicionales')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <!-- diercción -->

                        <!-- información contacto -->

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
                                    <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="name" autofocus 
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
                                            <option value="{{$tip_user->id}}" selected>{{$tip_user->role}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-3">
                                    <label for="id_categoria" class="col-form-label text-md-right">{{ __('Categoría') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <select name="id_categoria" class="form-control" required>
                                        @foreach($categorias as $cat)
                                            <option value="{{$cat->id}}" selected>{{$cat->categoria}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_categoria')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-md-3">
                                    <label for="id_tipo_vinculacion" class="col-form-label text-md-right">{{ __('Vinculación') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <select name="id_tipo_vinculacion" class="form-control" required>
                                        @foreach($tipos_vinculaciones as $tv)
                                            <option value="{{$tv->id}}" selected>{{$tv->tipo_vinculacion}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tipo_vinculacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <!-- 4 -->

                            <!-- 5 Academico_1 -->
                            <div class="form-group row">
                                <div class="col-md-12" id="esp_aca">
                                    <div class="row" id="esp_aca_children">
                                        <div class="col-md-3">
                                            <label for="id_programa_academico_[]" class="col-form-label text-md-right">{{ __('Prog. Académico') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <select name="id_programa_academico_[]" class="form-control" required id="id_programa_academico_1" onchange="searchEspaAca_2(1)">
                                                @foreach($programas_academicos as $pr_aca)
                                                    <option value="{{$pr_aca->id}}" selected>{{$pr_aca->programa_academico}}</option>  
                                                @endforeach
                                            </select>
                                            @error('id_programa_academico_[]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="col-md-2">
                                            <label for="id_espacio_academico_[]" id="id_espacio_academico_1" class="col-form-label text-md-right">{{ __('Cod. Académ.') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <input type="text" name="cod_espacio_academico_[]" id="cod_espacio_academico_[]" value="" class="form-control"
                                            onchange="searchEspaAca(this.value,1)"/>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="espacio_academico_1" class="col-form-label text-md-right">{{ __('Espacio Académico') }}</label>
                                            <span class="hs-form-required">*</span>
                                            <div class="row">
                                                <input type="text" name="espacio_academico_1" id="espacio_academico_1" value="" class="form-control" style="width: 90%;"
                                                readonly/>
                                                <a class="addButton_ea imgButton" id="add_ea" title="Add field"><img src="{{asset('img/add-icon.png')}}"/></a>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-1">
                                            <a class="add_ea" id="add_ea" title="Add field"><img src="add-icon.png"/></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 5 Academico_1 -->

                            <!-- 6 -->
                            <div class="form-group row">

                                <div class="col-md-3">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Contaseña') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="nope">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirmar Constraseña') }}</label>
                                    <span class="hs-form-required">*</span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="nope">
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