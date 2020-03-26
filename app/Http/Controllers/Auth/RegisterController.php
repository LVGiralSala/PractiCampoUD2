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
use Mockery\Undefined;

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
            'primer_apellido' => ['required', 'string', 'max:50'],
            'celular' => ['required', 'integer', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_identificacion' => ['required', 'integer', 'min:6'],
            'id_tipo_identificacion' => ['required', 'integer', 'max:11'],
            'id_role' => ['required', 'integer', 'max:11'],
            // 'id_categoria' => ['required', 'integer', 'max:13'],
            'id_tipo_vinculacion' => ['required', 'integer', 'max:13'],
            // 'id_espacio_academico_1' => ['required', 'integer'],
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

        $espacios_academicos = $data['id_espacio_academico_'];
        $programas_academicos = $data['id_programa_academico_'];
        $espacio_academico_1 = (!empty($espacios_academicos[4]))?$espacios_academicos[4]:null;
        $user = User::create([
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
            // 'id_categoria' => $data['id_categoria'],
            'id_tipo_vinculacion' => $data['id_tipo_vinculacion'],
            'id_espacio_academico_1' => $espacios_academicos[0],
            'id_espacio_academico_2' => (!empty($espacios_academicos[1]))?$espacios_academicos[1]:null,
            'id_espacio_academico_3' => (!empty($espacios_academicos[2]))?$espacios_academicos[2]:null,
            'id_espacio_academico_4' => (!empty($espacios_academicos[3]))?$espacios_academicos[3]:null,
            'id_espacio_academico_5' => (!empty($espacios_academicos[4]))?$espacios_academicos[4]:null,
            'id_espacio_academico_6' => (!empty($espacios_academicos[5]))?$espacios_academicos[5]:null,
            'id_programa_academico_1' => $programas_academicos[0],
            'id_programa_academico_2' => (!empty($programas_academicos[1]))?$programas_academicos[1]:null,
            'id_programa_academico_3' => (!empty($programas_academicos[2]))?$programas_academicos[2]:null,
            'id_programa_academico_4' => (!empty($programas_academicos[3]))?$programas_academicos[3]:null,
            'id_programa_academico_5' => (!empty($programas_academicos[4]))?$programas_academicos[4]:null,
            'id_programa_academico_6' => (!empty($programas_academicos[5]))?$programas_academicos[5]:null,
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'id_estado' => '1',

            ]);
            
    }
    
}
