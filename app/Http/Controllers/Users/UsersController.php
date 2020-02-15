<?php

namespace PractiCampoUD\Http\Controllers\Users;

use PractiCampoUD\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PractiCampoUD\User;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function filterUser($filter)
    {
        switch($filter)
        {
            case 'act':
                $usuarios=DB::table('users as us')
                ->join('tipo_identificacion as ti', 'us.id_tipo_identificacion','=', 'ti.id' )
                ->join('roles as ro', 'us.id_role','=', 'ro.id' )
                ->select('ti.sigla','us.id', 'us.usuario','us.primer_nombre','us.segundo_nombre', 'us.primer_apellido', 
                'us.segundo_apellido','ro.role', 'us.email')
                ->where('id_estado','=', '1')->paginate(10);
                break;
            case 'inac':
                $usuarios=DB::table('users as us')
                ->join('tipo_identificacion as ti', 'us.id_tipo_identificacion','=', 'ti.id' )
                ->join('roles as ro', 'us.id_role','=', 'ro.id' )
                ->select('ti.sigla','us.id', 'us.usuario','us.primer_nombre','us.segundo_nombre', 'us.primer_apellido', 
                'us.segundo_apellido','ro.role', 'us.email')
                ->where('id_estado','=', '2')->paginate(10);
                break;
            case 'all':
                $usuarios=DB::table('users as us')
                ->join('tipo_identificacion as ti', 'us.id_tipo_identificacion','=', 'ti.id' )
                ->join('roles as ro', 'us.id_role','=', 'ro.id' )
                ->select('ti.sigla','us.id', 'us.usuario','us.primer_nombre','us.segundo_nombre', 'us.primer_apellido', 
                'us.segundo_apellido','ro.role', 'us.email')->paginate(10);
                break;
            default;
        }
        
        return view('auth.index',["usuarios"=>$usuarios, 'filter'=>$filter]);
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
        $categoria=DB::table('categoria')->get();

        return view('auth.edit', [ "usuario"=>$usuario,
                                   "tipos_identificaciones"=>$tipo_identificacion,
                                   "tipos_usuarios"=>$tipo_usuario,
                                   "categorias"=>$categoria
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
        $mytime=Carbon::now('America/Bogota');
        $usuario=User::where('id', '=', $id)->first();
        $usuario->usuario=$request->get('usuario');
        $usuario->primer_nombre=$request->get('primer_nombre');
        $usuario->segundo_nombre=$request->get('segundo_nombre');
        $usuario->primer_apellido=$request->get('primer_apellido');
        $usuario->segundo_apellido=$request->get('segundo_apellido');
        $usuario->id_tipo_identificacion=$request->get('id_tipo_identificacion');
        $usuario->id=$request->get('num_identificacion');
        $usuario->id_role=$request->get('id_role');
        $usuario->id_categoria=$request->get('id_categoria');
        $usuario->email=$request->get('email');
        $usuario->updated_at=$mytime->toDateString();

        $usuario->update();

        return Redirect::to('users')->with('success', 'Actualización exitosa');
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
