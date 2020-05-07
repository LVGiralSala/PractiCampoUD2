<?php

namespace PractiCampoUD\Http\Controllers\Excel;

use Carbon\Carbon;
use PractiCampoUD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PractiCampoUD\Exports\ReportUsersExport;
use PractiCampoUD\Exports\UsersExport;
use PractiCampoUD\Imports\UsersImport;
use DB;
use PractiCampoUD\Exports\ReportProyeccionesExport;
use PractiCampoUD\Imports\ProyeccionesPreliminaresImport;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportExcel(){

        // $users = [];
        // $exportReport = new ReportUsersExport($users['ddd']);
        // $exportReport = new ReportUsersExport($usuario['data']);
        return Excel::download(new ReportUsersExport,'usuarios.xlsx');
    }

    public function importExcel(){
        // if($request->input('submit') != null)
        // {
        //     $file = $request->file('usuarios');

        // }
        Excel::import(new UsersImport,request()->file('usuarios'));
        return Redirect::to('users/filtrar/all')->with('success', 'Creación exitosa');
    }

    public function exportProyeccionesExcel()
    {
        $mytime=Carbon::now('America/Bogota');
        return Excel::download(new ReportProyeccionesExport,'poyecciones_preliminares.xls');
    }

    public function importProyeccionesExcel(){
        Excel::import(new ProyeccionesPreliminaresImport,request()->file('poyecciones_preliminares'));
        return Redirect::to('proyecciones')->with('success', 'Creación exitosa');
    }

}
