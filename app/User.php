<?php

namespace PractiCampoUD;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'id',
        'usuario', 
        'email', 
        'password', 
        'id_role',
        'id_tipo_identificacion',
        'id_categoria',
        'id_espacio_academico_1',
        // 'id_espacio_academico_2',
        // 'id_espacio_academico_3',
        // 'id_espacio_academico_4',
        // 'id_espacio_academico_5',
        // 'id_espacio_academico_6',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'celular',
        'direccion_residencia',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->id_role === 1;
    }

    public function docente()
    {
        return $this->id_role === 5;
    }

    // public function usuario()
    // {
    //     return $this->id_role !== 1;
    // }
}
