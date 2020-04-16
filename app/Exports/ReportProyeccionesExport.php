<?php

namespace PractiCampoUD\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use DB;

class ReportProyeccionesExport implements WithMultipleSheets
{

    // public function __construct()
    // {

    // }

    public function sheets(): array
    {
        $sheets = [];

         $sheets[] = new ProyeccionesPreliminaresExport();

        return $sheets;
    }
}