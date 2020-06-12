<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->


    @section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Registro Proyección Preliminar N° ') }}<?php echo $proyeccion_preliminar->id?><?php echo "\t -"?>
                        {{ __('') }}<?php if($estado_doc_respon == 1){ echo $nombre_usuario;} elseif ($estado_doc_respon == 2){ echo "Usuario Inactivo";}?></div>

                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('proyeccion_update',$proyeccion_preliminar->id) }}">
                            @method('PUT')
                            @csrf

                            @if(Auth::user()->admin())
                                @include('proyecciones.formularios.edit_admin',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes, 
                                $all_programas_aca, $all_espacios_aca))
                            @endif

                            @if(Auth::user()->decano())
                                @include('proyecciones.formularios.edit_dec',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes))
                            @endif

                            @if(Auth::user()->asistenteD())
                                @include('proyecciones.formularios.edit_asisDec',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes, 
                                $all_programas_aca, $all_espacios_aca))    
                            @endif 

                            @if(Auth::user()->coordinador())
                                @include('proyecciones.formularios.edit_coord',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes))
                            @endif


                            @if(Auth::user()->docente())
                                @include('proyecciones.formularios.edit_docen',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos, $periodos_academicos,$semestres_asignaturas, $tipos_transportes))
                            @endif

                            <!-- 25 -->
                            <div class="form-group row mb-0">
                                <div class="col-md-5 offset-md-5">
                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                            <!-- 25 -->
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
        
    @endsection  