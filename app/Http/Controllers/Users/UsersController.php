<?php

namespace PractiCampoUD\Http\Controllers\Users;

use PractiCampoUD\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PractiCampoUD\User;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        $usuario=DB::table('users as us')
        ->join('tipo_identificacion as ti', 'us.id_tipo_identificacion','=', 'ti.id' )
        ->join('roles as ro', 'us.id_role','=', 'ro.id' )
        ->select('ti.sigla','us.id', 'us.usuario','us.primer_nombre','us.segundo_nombre', 'us.primer_apellido', 
        'us.segundo_apellido','ro.role', 'us.email')->get();

        return view('auth.index',["usuarios"=>$usuario]);
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
        $usuario=User::find($id);
        $tipo_identificacion=DB::table('tipo_identificacion')->get();
        $tipo_usuario=DB::table('roles')->get();

        return view('auth.edit', [
            "usuario"=>$usuario,
            "tipos_identificaciones"=>$tipo_identificacion,
            "tipos_usuarios"=>$tipo_usuario
            ]);
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
}
