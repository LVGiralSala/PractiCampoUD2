<?php

namespace PractiCampoUD;

use Illuminate\Database\Eloquent\Model;

class proyeccion extends Model
{
    protected $table = 'proyeccion_preliminar';

    protected $fillable = [
            'fecha_diligenciamiento',
            'id_docente_responsable',   
            'id_tipo_transporte_rp_1',  
            'id_tipo_transporte_ra_1',  
            'id_proyecto_curricular',    		
            'id_espacio_academico',  
            'id_peridodo_academico',  
            'id_semestre_asignatura',
            'destino_rp',  
            'destino_ra',
            'ruta_principal',  
            'ruta_alterna',  
            'lugar_salida_rp',  
            'lugar_salida_ra',  
            'lugar_regreso_rp',  
            'lugar_regreso_ra',  
            'fecha_salida_aprox_rp',  
            'fecha_salida_aprox_ra',  
            'fecha_regreso_aprox_rp',  
            'fecha_regreso_aprox_ra',  
            'num_estudiantes_aprox',  
            'num_acompaniantes',  
            'det_recorrido_interno_rp',  
            'det_recorrido_interno_ra',  
            'det_tipo_transporte_rp_1',    
            'det_tipo_transporte_ra_1',  
            'grupo_1',  
            'grupo_2',  
            'cant_transporte_rp',  
            'cant_transporte_ra',  
            'capac_transporte_rp_1',  
            'capac_transporte_ra_1',  
            'exclusiv_tiempo_rp_1',  
            'exclusiv_tiempo_ra_1', 
    ];
}
