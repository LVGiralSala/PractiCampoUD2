<?php

namespace PractiCampoUD\Imports;

use PractiCampoUD\proyeccion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Facades\Hash;

class ProyeccionesPreliminaresImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new proyeccion([
            'id_espacio_academico'=> $row['id_espacio_academico'],
            'id_semestre_asignatura'=> $row['sem_aca'],
            'id_peridodo_academico'=> $row['per_aca'],
            'num_estudiantes_aprox' => $row['numero_de_estudiantes'],
            'num_acompaniantes' => $row['numero_acompanantes'],
            'grupo_1'=> $row['grupos_1'],
            'grupo_2'=> $row['grupos_2'],
            'grupo_3'=> $row['grupos_3'],
            'grupo_4'=> $row['grupos_4'],
            'destino_rp' => $row['destino_ruta_principal'],
            'ruta_principal' => $row['ruta_principal'],
            'det_recorrido_interno_rp' => $row['detalle_del_recorrido_interno_rp'],
            'lugar_salida_rp' => $row['lugar_salida_rp'],
            'lugar_regreso_rp' => $row['lugar_llegada_rp'],
            'fecha_salida_aprox_rp' => $row['salida_fecha_tentativa_rp'],
            'fecha_regreso_aprox_rp' => $row['llegada_fecha_tentativa_rp'],
            'duracion_num_dias_rp' => $row['numero_de_dias_rp'],
            'id_tipo_transporte_rp_1' => $row['tipo_transporte_rp'],
            'otro_tipo_transporte_rp_1' => $row['otro_transporte_rp'],
            'capac_transporte_rp_1' => $row['capac_transporte_rp'],
            'det_tipo_transporte_rp_1' => $row['det_transporte_rp'],
            'exclusiv_tiempo_rp_1' => $row['tiempo_completo_rp'],
            'destino_ra' => $row['destino_ruta_alterna'],
            'ruta_alterna' => $row['ruta_alterna'],
            'det_recorrido_interno_ra' => $row['detalle_del_recorrido_interno_ra'],
            'lugar_salida_ra' => $row['lugar_salida_ra'],
            'lugar_regreso_ra' => $row['lugar_llegada_ra'],
            'fecha_salida_aprox_ra' => $row['salida_fecha_tentativa_ra'],
            'fecha_regreso_aprox_ra' => $row['llegada_fecha_tentativa_ra'],
            'duracion_num_dias_ra' => $row['numero_de_dias_ra'],
            'id_tipo_transporte_ra_1' => $row['tipo_transporte_ra'],
            'otro_tipo_transporte_ra_1' => $row['otro_transporte_ra'],
            'capac_transporte_ra_1' => $row['capac_transporte_ra'],
            'det_tipo_transporte_ra_1' => $row['det_transporte_ra'],
            'exclusiv_tiempo_ra_1' => $row['tiempo_completo_ra'],

        ]);
    }

    public function sheets(): array
    {
        return [
            'Proyecciones' => $this
        ];
    }

}
