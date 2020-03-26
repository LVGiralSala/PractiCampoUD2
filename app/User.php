<?php

namespace PractiCampoUD;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        'id_estado',
        'id_espacio_academico_1',
        'id_espacio_academico_2',
        'id_espacio_academico_3',
        'id_espacio_academico_4',
        'id_espacio_academico_5',
        'id_espacio_academico_6',
        'id_programa_academico',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'celular',
        
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

    public function adminPerm()
    {
        return (($this->id_role === 1 || $this->id_role === 2 || $this->id_role === 3) && ($this->id_estado === 1));
    }

    public function otrosPerm()
    {
        return (($this->id_role === 1 || $this->id_role === 2 || $this->id_role === 3 || $this->id_role === 4 || $this->id_role === 5 || $this->id_role === 6) 
        && ($this->id_estado === 1));
    }

    public function decano()
    {
        return $this->id_role === 2;
    }

    public function asistenteD()
    {
        return $this->id_role === 3;
    }
    
    public function coordinador()
    {
        return $this->id_role === 4;
    }

    public function docente()
    {
        return $this->id_role === 5;
    }

    public function viceAcademica()
    {
        return $this->id_role === 6;
    }

    public function transportador()
    {
        return $this->id_role === 7;
    }

    public function activo()
    {
        return ($this->id_estado === 1);
    }

    public function inactivo()
    {
        return ($this->id_estado === 2);
    }
    
    // public function usuario()
    // {
    //     return $this->id_role !== 1;
    // }
}
