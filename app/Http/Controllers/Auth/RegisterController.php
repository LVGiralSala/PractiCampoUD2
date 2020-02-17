<?php

namespace PractiCampoUD\Http\Controllers\Auth;

use PractiCampoUD\User;
use PractiCampoUD\direccion_usuario;
use PractiCampoUD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuario' => ['required', 'string', 'max:15'],
            'primer_nombre' => ['required', 'string', 'max:50'],
            // 'segundo_nombre' => ['string', 'max:50'],
            'primer_apellido' => ['required', 'string', 'max:50'],
            'segundo_apellido' => ['required', 'string', 'max:50'],
            // 'dirección_residencia' => ['required', 'string'],
            'celular' => ['required', 'integer', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_identificacion' => ['required', 'integer', 'min:6'],
            'id_tipo_identificacion' => ['required', 'integer', 'max:11'],
            'id_role' => ['required', 'integer', 'max:11'],
            'id_categoria' => ['required', 'integer', 'max:13'],
            'id_espacio_academico_1' => ['required', 'integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \PractiCampoUD\User
     */
    protected function create(array $data)
    {
        // $cont=1;
        // foreach($data['id_espacio_academico_'] as $espacio)
        // {
        //     $name = "[".$cont++."]";
        //     $a = "'".$name."'";
            
        //     $b= $data['id_espacio_academico_'.[0]];
        //     return $b;
        // }
        $id_tipo_via = trim($data['id_tipo_via_1']);
        $tipo_via=DB::table('nomenclatura_urbana as nu')
        ->select('nu.nomenclatura', 'nu.abreviatura')
        ->where('nu.id','=',$id_tipo_via)
        ->get();

        foreach($tipo_via as $tv)
        {
            $tip_via = $tv->nomenclatura;
        }

        $id_complemento_via = trim($data['id_complemento_via']);
        $comp_via =DB::table('nomenclatura_urbana as nu')
        ->select('nu.nomenclatura', 'nu.abreviatura')
        ->where('nu.id','=',$id_complemento_via)
        ->get();

        foreach($comp_via as $cv)
        {
            $com_via = $cv->nomenclatura;
        }

        $id_prefijo_compl_via = trim($data['id_prefijo_compl_via']);
        $pref_comp =DB::table('nomenclatura_urbana as nu')
        ->select('nu.nomenclatura', 'nu.abreviatura')
        ->where('nu.id','=',$id_prefijo_compl_via)
        ->get();

        foreach($pref_comp as $pc)
        {
            $pre_comp = $pc->nomenclatura;
        }

        $id_tipo_residencia = trim($data['id_tipo_residencia']);
        $tipo_resid =DB::table('nomenclatura_urbana as nu')
        ->select('nu.nomenclatura', 'nu.abreviatura')
        ->where('nu.id','=',$id_tipo_residencia)
        ->get();

        foreach($tipo_resid as $tr)
        {
            $tip_resid = $tr->abreviatura;
        }

        $direccion_completa = $tip_via." ".strtoupper($data['num_via'])." ".$com_via." ".
        $pre_comp." # ".strtoupper($data['num_placa_1'])." - ".$data['num_placa_2']." ".$tip_resid." ".$data['datos_adicionales'];


        $user = User::create([
            'direccion_residencia' => $direccion_completa,
            'id' => $data['num_identificacion'],
            'id_tipo_identificacion' => $data['id_tipo_identificacion'],
            'usuario' => $data['usuario'],
            'primer_nombre'=> $data['primer_nombre'],
            'segundo_nombre'=> $data['segundo_nombre'],
            'primer_apellido'=> $data['primer_apellido'],
            'segundo_apellido'=> $data['segundo_apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_role' => $data['id_role'],
            'id_categoria' => $data['id_categoria'],
            'id_espacio_academico_1' => $data['id_espacio_academico_1'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],

            // 'id_espacio_academico_2' => $data['id_espacio_academico_2'],
            // 'id_espacio_academico_3' => $data['id_espacio_academico_3'],
            // 'id_espacio_academico_4' => $data['id_espacio_academico_4'],
            // 'id_espacio_academico_5' => $data['id_espacio_academico_5'],
            // 'id_espacio_academico_6' => $data['id_espacio_academico_6'],
            ]);
            
            $direccion_usuario = direccion_usuario::create([
                'id'=> $data['num_identificacion'],
                'id_tipo_via_1' => $data['id_tipo_via_1'],
                'num_via' => $data['num_via'],
                'id_complemento_via' => $data['id_complemento_via'],
                'id_prefijo_compl_via' => $data['id_prefijo_compl_via'],
                'num_placa_1' => $data['num_placa_1'],
                'num_placa_2' => $data['num_placa_2'],
                'id_tipo_residencia' => $data['id_tipo_residencia'],
                'datos_adicionales' => $data['datos_adicionales'],
            ]);
    }

    // public function completarDireccion(Request $request)
    // {
    //     $idInput = $request->idInput;
    //     $tip_via = "";
    //     $com_via = "";
    //     $pre_comp = "";
    //     $tip_resid = "";    
    //     $num_via = "";
    //     $num_placa_1 = "";
    //     $num_placa_2 = "";
    //     $datos_adic = "";

    //     switch($idInput)
    //     {
    //         case 'id_tipo_via_1':
    //             $id_tipo_via = trim($request->id);
    //             $tipo_via=DB::table('nomenclatura_urbana as nu')
    //             ->select('nu.nomenclatura', 'nu.abreviatura')
    //             ->where('nu.id','=',$id_tipo_via)
    //             ->get();

    //             foreach($tipo_via as $tv)
    //             {
    //                 $tip_via = $tv->nomenclatura;
    //             }
    //             break;
    //         case 'num_via':
    //             $num_via = trim($request->id);
    //             break;
    //         case 'id_complemento_via':
    //             $id_complemento_via = trim($request->id);
    //             $comp_via =DB::table('nomenclatura_urbana as nu')
    //             ->select('nu.nomenclatura', 'nu.abreviatura')
    //             ->where('nu.id','=',$id_complemento_via)
    //             ->get();

    //             foreach($comp_via as $cv)
    //             {
    //                 $com_via = $cv->nomenclatura;
    //             }
    //             break;
    //         case 'id_prefijo_compl_via':
    //             $id_prefijo_compl_via = trim($request->id);
    //             $pref_comp =DB::table('nomenclatura_urbana as nu')
    //             ->select('nu.nomenclatura', 'nu.abreviatura')
    //             ->where('nu.id','=',$id_prefijo_compl_via)
    //             ->get();

    //             foreach($pref_comp as $pc)
    //             {
    //                 $pre_comp = $pc->nomenclatura;
    //             }
    //             break;
    //         case 'num_placa_1':
    //             $num_placa_1 = trim($request->id);
    //             break;
    //         case 'num_placa_2':
    //             $num_placa_2 = trim($request->id);
    //             break;
    //         case 'id_tipo_residencia':
    //             $id_tipo_residencia = trim($request->id);
    //             $tipo_resid =DB::table('nomenclatura_urbana as nu')
    //             ->select('nu.nomenclatura', 'nu.abreviatura')
    //             ->where('nu.id','=',$id_tipo_residencia)
    //             ->get();

    //             foreach($tipo_resid as $tr)
    //             {
    //                 $tip_resid = $tr->abreviatura;
    //             }
    //             break;
    //         case 'datos_adicionales':
    //             $datos_adic = trim($request->id);
    //             break;
    //             break;
    //         default;
                
    //     }
        
    //     $direccion_completa = $tip_via." ".strtoupper($num_via)." ".$com_via." ".
    //     $pre_comp." # ".strtoupper($num_placa_1)." - ".$num_placa_2." ".$tip_resid." ".$datos_adic;

    //     return response()->json($direccion_completa);
    // }

    
}
