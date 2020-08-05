<?php

namespace PractiCampoUD;

use Illuminate\Database\Eloquent\Model;

class estudiantes_practica extends Model
{
    protected $table = 'estudiantes_solicitud_practica';

    public $timestamps = false;

    protected $fillable = [
        'num_identificacion',
        'id_tipo_identificacion',
        'cod_estudiantil',
        'id_solicitud_practica',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'eps',
        'email',
        // 'aprob_terminos_condiciones',
        // 'verificacion_asistencia',
        // 'permiso_padres',
        // 'seguro_estudiantil',
        // 'documento_adicional_1',
        // 'documento_adicional_2',
    ];
}
