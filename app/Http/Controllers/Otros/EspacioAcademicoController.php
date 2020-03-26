<?php

namespace PractiCampoUD\Http\Controllers\Otros;

use PractiCampoUD\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PractiCampoUD\espacio_academico;
use DB;

class EspacioAcademicoController extends Controller
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

    public function searchEspaAca(Request $request)
    {
        if($request->opc == 1)
        {
            // $espa_aca = espacio_academico::find($request->id);
            $espa_aca = DB::table('espacio_academico')
            ->where('id_programa_academico','=',$request->id_pa)
            ->where('codigo_espacio_academico','=', $request->id)->first();

            // $espa_aca->first();

            return response()->json($espa_aca);
        }
        elseif($request->opc == 2)
        {
            // $espa_aca = espacio_academico::find($request->id);
            $espa_aca = DB::table('espacio_academico')
            ->where('id_programa_academico','=',$request->id_ea)
            ->where('codigo_espacio_academico','=', $request->id)->first();

            // $espa_aca->first();

            return response()->json($espa_aca);
        }
    }
}
