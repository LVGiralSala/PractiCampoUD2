<?php

namespace PractiCampoUD\Imports;

use PractiCampoUD\estudiantes_practica;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Facades\Hash;

class EstudiantesImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new estudiantes_practica([
            'id_solicitud_practica' => 1,
            'id_tipo_identificacion' => $row['id_ti'],
            'num_identificacion' => $row['identificacion'],
            'cod_estudiantil' => $row['cod_estudiantil'],
            'nombres'=> $row['nombres'],
            'apellidos'=> $row['apellidos'],
            'fecha_nacimiento'=> $row['fecha_nacimiento'],
            'eps'=> $row['eps'],
            'email' => $row['correo'],
            // 'password'  =>  '12345678',
            // 'password'  =>  Hash::make('12345678'),
            // 'id_role' => $row['id_rol'],
            // 'id_programa_academico' => $row['id_prog_acade_coord'],
            // 'id_tipo_vinculacion' => $row['id_vinculacion'],
            // 'id_espacio_academico_1' => $row['id_esp_acad_1'],
            // 'id_espacio_academico_2' => $row['id_esp_acad_2'],
            // 'id_espacio_academico_3' => $row['id_esp_acad_3'],
            // 'id_espacio_academico_4' => $row['id_esp_acad_4'],
            // 'id_espacio_academico_5' => $row['id_esp_acad_5'],
            // 'id_espacio_academico_6' => $row['id_esp_acad_6'],
            // 'telefono' => $row['telefono'],
            // 'celular' => $row['celular'],
            // 'id_estado' => '1',
        ]);
    }

    public function sheets(): array
    {
        return [
            'Estudiantes' => $this
        ];
    }
}
