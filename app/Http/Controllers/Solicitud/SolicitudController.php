<?php

namespace PractiCampoUD\Http\Controllers\Solicitud;

use Illuminate\Http\Request;
use PractiCampoUD\Http\Controllers\Controller;
use DB;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes=DB::table('solicitud_practica')->get();

        return view('solicitudes.index',["solicitudes"=>$solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
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

    public function index_codigo()
    {
        return view('solicitudes.prueba_codigo',["respuesta"=>""]);
    }

    public function consulta_codigo(Request $request)
    {

        $respuesta = "";
        $id = $request->cod_consulta;
        $cod_graduacion =DB::table('codigo_graduacion')
        ->where('id','=', $id)->first();

        if(!empty($cod_graduacion) ||  $cod_graduacion!= null)
        {
            $nombre = $cod_graduacion->nombre_estudiante;
            $respuesta = 'El código: '.$id.' asociado al estudiante: ' .$nombre.' cuenta con diploma de graduación.';
        }

        else if(empty($cod_graduacion) ||  $cod_graduacion== null)
        {
            $respuesta = "El código NO cuenta con diploma de graduación.";
        }
        return view('solicitudes.prueba_codigo',["respuesta"=>$respuesta]);
    }
}
