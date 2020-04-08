<?php

namespace PractiCampoUD\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use DB;

class ReportUsersExport implements WithMultipleSheets
{

    // public function __construct()
    // {

    // }

    public function sheets(): array
    {
        $sheets = [];

         $sheets[] = new UsersExport();
         $sheets[] = new EspaciosAcademicosExport();

        return $sheets;
    }
}