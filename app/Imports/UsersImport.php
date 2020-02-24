<?php

namespace PractiCampoUD\Imports;

use PractiCampoUD\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id' => $row['identificacion'],
            'id_tipo_identificacion' => $row['id_ti'],
            'usuario' => $row['usuario'],
            'primer_nombre'=> $row['1er_nombre'],
            'segundo_nombre'=> $row['2do_nombre'],
            'primer_apellido'=> $row['1er_apellido'],
            'segundo_apellido'=> $row['2do_apellido'],
            'email' => $row['email'],
            'password'  =>  '12345678',
            // 'password'  =>  Hash::make($row['password']),
            'id_role' => $row['id_rol'],
            'id_categoria' => $row['id_categoria'],
            'id_espacio_academico_1' => $row['id_esp_acad_1'],
            'telefono' => $row['telefono'],
            'celular' => $row['celular'],

            // 'id' => $row[2],
            // 'id_tipo_identificacion' => $row[1],
            // 'usuario' => $row[11],
            // 'primer_nombre'=> $row[12],
            // 'segundo_nombre'=> $row[13],
            // 'primer_apellido'=> $row[14],
            // 'segundo_apellido'=> $row[15],
            // 'email' => $row[18],
            // 'password'  =>  '12345678',
            // // 'password'  =>  Hash::make($row['password']),
            // 'id_role' => $row[3],
            // 'id_categoria' => $row[5],
            // 'id_espacio_academico_1' => $row[8],
            // 'telefono' => $row[17],
            // 'celular' => $row[16],

            // 'id_espacio_academico_2' => $row['id_espacio_academico_2'],
            // 'id_espacio_academico_3' => $row['id_espacio_academico_3'],
            // 'id_espacio_academico_4' => $row['id_espacio_academico_4'],
            // 'id_espacio_academico_5' => $row['id_espacio_academico_5'],
            // 'id_espacio_academico_6' => $row['id_espacio_academico_6'],
        ]);
    }
}
