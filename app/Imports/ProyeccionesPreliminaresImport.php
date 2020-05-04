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
            'id' => $row['id_proyeccion'],
            'id_tipo_identificacion' => $row['id_ti'],
            'usuario' => $row['usuario'],
            'primer_nombre'=> $row['1er_nombre'],
            'segundo_nombre'=> $row['2do_nombre'],
            'primer_apellido'=> $row['1er_apellido'],
            'segundo_apellido'=> $row['2do_apellido'],
            'email' => $row['email'],
            // 'password'  =>  '12345678',
            'password'  =>  Hash::make('12345678'),
            'id_role' => $row['id_rol'],
            'id_programa_academico' => $row['id_prog_acade_coord'],
            'id_tipo_vinculacion' => $row['id_vinculacion'],
            'id_espacio_academico_1' => $row['id_esp_acad_1'],
            'id_espacio_academico_2' => $row['id_esp_acad_2'],
            'id_espacio_academico_3' => $row['id_esp_acad_3'],
            'id_espacio_academico_4' => $row['id_esp_acad_4'],
            'id_espacio_academico_5' => $row['id_esp_acad_5'],
            'id_espacio_academico_6' => $row['id_esp_acad_6'],
            'telefono' => $row['telefono'],
            'celular' => $row['celular'],
            'id_estado' => '1',
        ]);
    }

    public function sheets(): array
    {
        return [
            'Proyecciones' => $this
        ];
    }

}
