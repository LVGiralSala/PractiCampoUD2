<?php

namespace PractiCampoUD\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\WithTitle;

use DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class ProyeccionesPreliminaresExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
{

    use Exportable;
    // public function __construct()
    // {

    // }

    public function collection()
    {
        $proyecciones=DB::table('proyeccion_preliminar as proy_prel')
        ->select('proy_prel.id', 'prog_aca.programa_academico', 'espa.codigo_espacio_academico','espa.espacio_academico', 'sem_asig.semestre_asignatura', 
                 'per_aca.periodo_academico', DB::raw('CONCAT_WS(" ", us.primer_nombre, us.segundo_nombre, us.primer_apellido, us.segundo_apellido)'),
                //  DB::raw('CONCAT(proy_prel.grupo_1, " - ", proy_prel.grupo_2, " - ", proy_prel.grupo_3, " - ",proy_prel.grupo_4)'),
                 'proy_prel.grupo_1', 'proy_prel.grupo_2', 'proy_prel.grupo_3', 'proy_prel.grupo_4', 
                 'proy_prel.destino_rp', 'proy_prel.det_recorrido_interno_rp', 'proy_prel.lugar_salida_rp', 
                 'proy_prel.lugar_regreso_rp', 'proy_prel.fecha_salida_aprox_rp','proy_prel.fecha_regreso_aprox_rp','proy_prel.duracion_num_dias_rp', 
                 'proy_prel.num_estudiantes_aprox', 'proy_prel.num_acompaniantes', 
                 'tip_tra_rp1.tipo_transporte', 'proy_prel.otro_tipo_transporte_ra_1','proy_prel.capac_transporte_rp_1', 'proy_prel.det_tipo_transporte_rp_1',
                 'proy_prel.valor_estimado_transporte_rp', 'proy_prel.valor_estimado_transporte_ra') 
                //  ,  'proy_prel.exclusiv_tiempo_rp_1'
                //  'tip_tra_rp2.tipo_transporte', 'proy_prel.capac_transporte_rp_2', 'proy_prel.det_tipo_transporte_rp_2',  'proy_prel.exclusiv_tiempo_rp_2', 
                //  'tip_tra_rp3.tipo_transporte', 'proy_prel.capac_transporte_rp_3', 'proy_prel.det_tipo_transporte_rp_3',  'proy_prel.exclusiv_tiempo_rp_3', 
                //  'tip_tra_ra1.tipo_transporte', 'proy_prel.capac_transporte_rp_1', 'proy_prel.det_tipo_transporte_ra_1',  'proy_prel.exclusiv_tiempo_rp_1', 
                //  'tip_tra_ra2.tipo_transporte', 'proy_prel.capac_transporte_ra_2', 'proy_prel.det_tipo_transporte_ra_2',  'proy_prel.exclusiv_tiempo_ra_2', 
                //  'tip_tra_ra3.tipo_transporte', 'proy_prel.capac_transporte_ra_3', 'proy_prel.det_tipo_transporte_ra_3',  'proy_prel.exclusiv_tiempo_ra_3')
                 ->leftjoin('tipo_transporte as tip_tra_rp1','proy_prel.id_tipo_transporte_rp_1','=','tip_tra_rp1.id')
                //  ->leftjoin('tipo_transporte as tip_tra_rp2','proy_prel.id_tipo_transporte_rp_2','=','tip_tra_rp2.id')
                //  ->leftjoin('tipo_transporte as tip_tra_rp3','proy_prel.id_tipo_transporte_rp_3','=','tip_tra_rp3.id')
                //  ->leftjoin('tipo_transporte as tip_tra_ra1','proy_prel.id_tipo_transporte_ra_1','=','tip_tra_ra1.id')
                //  ->leftjoin('tipo_transporte as tip_tra_ra2','proy_prel.id_tipo_transporte_ra_2','=','tip_tra_ra2.id')
                //  ->leftjoin('tipo_transporte as tip_tra_ra3','proy_prel.id_tipo_transporte_ra_3','=','tip_tra_ra3.id')
                 ->leftjoin('espacio_academico as espa','proy_prel.id_espacio_academico','=','espa.id')
                 ->leftjoin('programa_academico as prog_aca','espa.id_programa_academico','=','prog_aca.id')
                 ->leftjoin('periodo_academico as per_aca','proy_prel.id_peridodo_academico','=','per_aca.id')
                 ->leftjoin('semestre_asignatura as sem_asig','proy_prel.id_semestre_asignatura','=','sem_asig.id')
                 ->leftjoin('tipo_zona_transitar as tip_zon_tra','proy_prel.id_tipo_zona_transitar','=','tip_zon_tra.id')
                 ->leftjoin('users as us','proy_prel.id_docente_responsable','=','us.id')
                 ->where('proy_prel.aprobacion_coordinador','=',3)
                 ->where('proy_prel.aprobacion_decano','=',3)->get();
        

        return $proyecciones;
    }

    public function headings():array
    {
        return['ID PROYECCIÓN', 'PROGRAMA ACADÉMICO', 'CÓD. ESPACIO ACADÉMICO', 'ESPACIO ACADÉMICO', 'SEM. ACA','PER. ACA',
                'DOCENTE RESPONSABLE', 'GRUPOS','','','', 'DESTINO RUTA PRINCIPAL', 'DETALLE DEL RECORRIDO INTERNO',
                'LUGAR DE SALIDA','LUGAR DE LLEGADA','SALIDA (FECHA TENTATIVA)', 'LLEGADA (FECHA TENTATIVA)', 'NÚMERO DE DÍAS',
                'NÚMERO DE ESTUDIANTES', 'NÚMERO ACOMPAÑANTES','TIPO TRANSPORTE RP','OTRO TRANSPORTE', 'CAPAC. TRANSPORTE', 'DET. TRANSPORTE',
                'VALOR ESTIM. TRANSP. RP', 'VALOR ESTIM. TRANSP. RA'];
    }

    public function registerEvents():array{
        return[
            AfterSheet::class => function(AfterSheet $event){
                $cellRange = 'A1:Z1';
                $cellRangeName ='H1:K1'; 
                $event->sheet->getDelegate()->mergeCells($cellRangeName);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('74BB96');
            },
            BeforeWriting::class=>function(BeforeWriting $event){
                $event->writer->setActiveSheetIndex(0);
            }
        ];
    }

    public function title(): string
    {
        $titleSheet = "PLAN DE PRACTICAS CONTROL DEFIN";
        return $titleSheet;
    }
}