<?php

namespace PractiCampoUD\Http\Controllers\Users;

use PractiCampoUD\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PractiCampoUD\User;
use PractiCampoUD\direccion_usuario;
use DB;
use PractiCampoUD\espacio_academico;

use function Complex\add;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterUser($filter)
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
        // $direccion_usuario=direccion_usuario::find($id);
        $tipo_identificacion=DB::table('tipo_identificacion')->get();
        $tipo_usuario=DB::table('roles')->get();
        $tipo_vinculacion=DB::table('tipo_vinculacion')->get();
        $espacio_academico=DB::table('espacio_academico')->get();
        $programa_academico =DB::table('programa_academico')->get();

        // $programa_academico=DB::table('users as us')
        //     ->leftjoin('espacio_academico as esp_a_1','us.id_espacio_academico_1','=','esp_a_1.id')
        //     ->leftjoin('espacio_academico as esp_a_2','us.id_espacio_academico_2','=','esp_a_2.id')
        //     ->leftjoin('espacio_academico as esp_a_3','us.id_espacio_academico_3','=','esp_a_3.id')
        //     ->leftjoin('espacio_academico as esp_a_4','us.id_espacio_academico_4','=','esp_a_4.id')
        //     ->leftjoin('espacio_academico as esp_a_5','us.id_espacio_academico_5','=','esp_a_5.id')
        //     ->leftjoin('espacio_academico as esp_a_6','us.id_espacio_academico_6','=','esp_a_6.id')
        //     ->leftjoin('programa_academico as pro_a_1','esp_a_1','=','pro_a_1')
        //     ->leftjoin('programa_academico as pro_a_2','esp_a_2','=','pro_a_2')
        //     ->leftjoin('programa_academico as pro_a_3','esp_a_3','=','pro_a_3')
        //     ->leftjoin('programa_academico as pro_a_4','esp_a_4','=','pro_a_4')
        //     ->leftjoin('programa_academico as pro_a_5','esp_a_5','=','pro_a_5')
        //     ->leftjoin('programa_academico as pro_a_6','esp_a_6','=','pro_a_6')
        //     ->select('esp_a_1.id','esp_a_3.id_programa_academico','pro_a_1.programa_academico','esp_a_2.id','esp_a_2.id_programa_academico','pro_a_1.programa_academico',
        //              'esp_a_3.id','esp_a_3.id_programa_academico','pro_a_3.programa_academico','esp_a_4.id','esp_a_5.id_programa_academico','pro_a_4.programa_academico',
        //              'esp_a_5.id','esp_a_5.id_programa_academico','pro_a_5.programa_academico','esp_a_6.id','esp_a_6.id_programa_academico','pro_a_6.programa_academico')
        //     ->where('us.id','=',$id);
        // $elemento_nomenclatura=DB::table('elemento_nomenclatura')->get();

        foreach($espacio_academico as $esp_aca)
        {
            if(($esp_aca->id==$usuario->id_espacio_academico_1)||($esp_aca->id==$usuario->id_espacio_academico_2)||($esp_aca->id==$usuario->id_espacio_academico_3)||
               ($esp_aca->id==$usuario->id_espacio_academico_4)||($esp_aca->id==$usuario->id_espacio_academico_5)||($esp_aca->id==$usuario->id_espacio_academico_6))
            {
                $espacios_user[] = [ 
                    'id'=>$esp_aca->id,
                    'id_programa_academico'=>$esp_aca->id_programa_academico,
                    'codigo_espacio_academico'=>$esp_aca->codigo_espacio_academico,
                    'espacio_academico'=>$esp_aca->espacio_academico,
                    'plan_estudios_1'=>$esp_aca->plan_estudios_1,
                    'plan_estudios_2'=>$esp_aca->plan_estudios_2,
                    'tipo_espacio'=>$esp_aca->tipo_espacio
                    
                ];
                
            }
            
        }

        return view('auth.edit', [ "usuario"=>$usuario,
                                //    "direccion_usuario"=>$direccion_usuario,
                                   "tipos_identificaciones"=>$tipo_identificacion,
                                   "tipos_usuarios"=>$tipo_usuario,
                                   "tipos_vinculaciones"=>$tipo_vinculacion,
                                   "espacios_academicos"=>$espacio_academico,
                                   "espacios_usuario"=>$espacios_user,
                                   "programas_academicos"=>$programa_academico,
                                //    "programas_usuario"=>$programas_user,
                                //    "nomenclaturas_urbanas"=>$nomenclatura_urbana,
                                //    "elementos_nomenclaturas"=>$elemento_nomenclatura,
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
        $espacios_academicos = $request->get('id_espacio_academico_');
        $programas_academicos = $request->get('id_programa_academico_');
        $mytime=Carbon::now('America/Bogota');
        $usuario=User::where('id', '=', $id)->first();
        $usuario->id_estado=$request->get('id_estado');
        $usuario->usuario=$request->get('usuario');
        $usuario->primer_nombre=$request->get('primer_nombre');
        $usuario->segundo_nombre=$request->get('segundo_nombre');
        $usuario->primer_apellido=$request->get('primer_apellido');
        $usuario->segundo_apellido=$request->get('segundo_apellido');
        $usuario->id_tipo_identificacion=$request->get('id_tipo_identificacion');
        $usuario->id=$request->get('num_identificacion');
        $usuario->id_role=$request->get('id_role');
        $usuario->id_tipo_vinculacion=$request->get('id_tipo_vinculacion');
        $usuario->email=$request->get('email');
        $usuario->id_espacio_academico_1=$espacios_academicos[0];
        $usuario->id_espacio_academico_2=(!empty($espacios_academicos[1]))?$espacios_academicos[1]:null;
        $usuario->id_espacio_academico_3=(!empty($espacios_academicos[2]))?$espacios_academicos[2]:null;
        $usuario->id_espacio_academico_4=(!empty($espacios_academicos[3]))?$espacios_academicos[3]:null;
        $usuario->id_espacio_academico_5=(!empty($espacios_academicos[4]))?$espacios_academicos[4]:null;
        $usuario->id_espacio_academico_6=(!empty($espacios_academicos[5]))?$espacios_academicos[5]:null;
        $usuario->id_programa_academico_1=$programas_academicos[0];
        $usuario->id_programa_academico_2=(!empty($programas_academicos[1]))?$programas_academicos[1]:null;
        $usuario->id_programa_academico_3=(!empty($programas_academicos[2]))?$programas_academicos[2]:null;
        // $usuario->id_programa_academico_4=(!empty($programas_academicos[3]))?$programas_academicos[3]:null;
        // $usuario->id_programa_academico_5=(!empty($programas_academicos[4]))?$programas_academicos[4]:null;
        // $usuario->id_programa_academico_6=(!empty($programas_academicos[5]))?$programas_academicos[5]:null;

        $usuario->updated_at=$mytime->toDateString();

        $usuario->update();

        return Redirect::to('users/filtrar/all')->with('success', 'Actualización exitosa');
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
