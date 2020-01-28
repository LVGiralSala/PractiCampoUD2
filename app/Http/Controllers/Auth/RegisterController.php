<?php

namespace PractiCampoUD\Http\Controllers\Auth;

use PractiCampoUD\User;
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
            'usuario' => ['required', 'string', 'max:10'],
            'primer_nombre' => ['required', 'string', 'max:50'],
            'segundo_nombre' => ['string', 'max:50'],
            'primer_apellido' => ['required', 'string', 'max:50'],
            'segundo_apellido' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_identificacion' => ['required', 'integer', 'min:6'],
            'id_tipo_identificacion' => ['required', 'integer', 'max:11'],
            'id_role' => ['required', 'integer', 'max:11'],
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
        return User::create([
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
        ]);
    }

    
}
