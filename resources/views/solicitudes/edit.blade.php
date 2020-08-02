<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->


    @section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Registro Solicitud Práctica N° ') }}<?php echo $solicitud_practica->id_proyeccion_preliminar?><?php echo "\t -"?>
                        {{ __('') }}</div>
                        {{-- <php if($estado_doc_respon == 1){ echo $nombre_doc_resp;} elseif ($estado_doc_respon == 2){ echo "Usuario Inactivo";}?> --}}
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('solicitud_update',$proyeccion_preliminar->id) }}">
                            @method('PUT')
                            @csrf

                            @if(Auth::user()->admin())
                                @include('solicitudes.formularios.edit_admin',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes, 
                                $all_programas_aca, $all_espacios_aca))
                            @endif

                            @if(Auth::user()->decano())
                                @include('solicitudes.formularios.edit_dec',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes))
                            @endif

                            @if(Auth::user()->asistenteD())
                                @include('solicitudes.formularios.edit_asisDec',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes, 
                                $all_programas_aca, $all_espacios_aca))    
                            @endif 

                            @if(Auth::user()->coordinador())
                                @include('solicitudes.formularios.edit_coord',array($proyeccion_preliminar,$programas_usuario, 
                                $espacios_academicos,$periodos_academicos,$semestres_asignaturas, $tipos_transportes))
                            @endif


                            @if(Auth::user()->docente())
                                @include('solicitudes.formularios.edit_docen',array($proyeccion_preliminar,$programas_usuario, 
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