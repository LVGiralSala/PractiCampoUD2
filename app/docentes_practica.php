<?php

namespace PractiCampoUD;

use Illuminate\Database\Eloquent\Model;

class docentes_practica extends Model
{
    protected $table = 'docentes_practica';

    public $timestamps = false;
    
    protected $fillable = [
            'num_doc_docente_acomp_1',
            'num_doc_docente_acomp_2',
            'num_doc_docente_acomp_3',
            'num_doc_docente_acomp_4', 
            'num_doc_docente_acomp_5', 
            'num_doc_docente_acomp_6',  	
            'num_doc_docente_acomp_7',  	
            'num_doc_docente_acomp_8',  	
            'num_doc_docente_acomp_9',  	
            'num_doc_docente_acomp_10',  	
            'num_doc_docente_apoyo_1',  	
            'num_doc_docente_apoyo_2',  	
            'num_doc_docente_apoyo_3',  	
            'num_doc_docente_apoyo_4',  	
            'num_doc_docente_apoyo_5',  	
            'num_doc_docente_apoyo_6',  	
            'num_doc_docente_apoyo_7',  	
            'num_doc_docente_apoyo_8',  	
            'num_doc_docente_apoyo_9',  	
            'num_doc_docente_apoyo_10',  	
            'docente_acomp_1',  	
            'docente_acomp_2',  	
            'docente_acomp_3',  	
            'docente_acomp_4',  	
            'docente_acomp_5', 
            'docente_acomp_6',  	
            'docente_acomp_7',  	
            'docente_acomp_8',  	
            'docente_acomp_9',  	
            'docente_acomp_10',  	
            'docente_apoyo_1',  	
            'docente_apoyo_2',  	
            'docente_apoyo_3',  	
            'docente_apoyo_4',  	
            'docente_apoyo_5', 
            'docente_apoyo_6',  	
            'docente_apoyo_7',  	
            'docente_apoyo_8',  	
            'docente_apoyo_9',  	
            'docente_apoyo_10',  	
            'num_docentes_acomp',  	
            'num_docentes_apoyo',  	
    ];
}
