<?php

namespace PractiCampoUD\Http\Controllers\Notificacion;

use PractiCampoUD\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PractiCampoUD\Mail\CodigoMail;
use DB;

class NotificacionController extends Controller
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

    public function send()
    {
        $users = DB::table('users')
        ->where('primer_nombre','=','Laura')
        ->orWhere('primer_nombre','=','Emilia')->get();

        $emails = [];

        foreach($users as $item)
        {
            $emails[] = $item->email;
        }

        $filter = "";
        $nueva_proyeccion = "";
        Mail::bcc($emails)->send(new CodigoMail($filter, $nueva_proyeccion));
    }

    public function apertura_proy()
    {
        $filter = "apertura_proy";

        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function cierre_proy()
    {
        $filter = "cierre_proy";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function apertura_solic()
    {
        $filter = "apertura_solic";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function cierre_solic()
    {
        $filter = "cierre_solic";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function creacion_proy($id)
    {
        $filter = "creacion_proy";
        $nueva_solicitud = "";
        $nueva_proyeccion = DB::table('proyeccion_preliminar as proy_pre')
                            ->select('proy_pre.id', 'pro_aca.programa_academico', 'esp_aca.espacio_academico', 'esp_aca.codigo_espacio_academico', 
                                    'esp_aca.id as id_esp_aca', 'pro_aca.id as id_pro_aca',
                                    'per_aca.periodo_academico','sem_asig.semestre_asignatura', 'proy_pre.destino_rp', 'proy_pre.destino_ra', 'proy_pre.id_docente_responsable',
                                    DB::raw('CONCAT(users.primer_nombre, " ", users.segundo_nombre, " ", users.primer_apellido, " ", users.segundo_apellido) as full_name'))
                            ->join('programa_academico as pro_aca', 'proy_pre.id_programa_academico', 'pro_aca.id')
                            ->join('espacio_academico as esp_aca', 'proy_pre.id_espacio_academico', 'esp_aca.id')
                            ->join('periodo_academico as per_aca', 'proy_pre.id_periodo_academico', 'per_aca.id')
                            ->join('semestre_asignatura as sem_asig', 'proy_pre.id_semestre_asignatura', 'sem_asig.id')
                            ->join('users', 'proy_pre.id_docente_responsable', 'users.id')
                            ->where('proy_pre.id','=',$id)->first();

        $id_creador = $nueva_proyeccion->id_docente_responsable;
        $creador=DB::table('users')->where('id','=',$id_creador)->first();
        $id_esp_aca = $nueva_proyeccion->id_esp_aca;
        $id_pro_aca = $nueva_proyeccion->id_pro_aca;
        $coord =DB::table('users')->where('id_programa_academico_coord','=',$id_pro_aca)->first();
        
        $emails = [];

        $emails[] = $creador->email;
        $emails[] = $coord->email;
        
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter,$nueva_proyeccion,$nueva_solicitud));
    }

    public function creacion_solic($id)
    {
        $filter = "creacion_solic";
        $nueva_proyeccion = "";

        $nueva_solicitud = DB::table('solicitud_practica as sol_prac')
        ->select('sol_prac.id', 'pro_aca.programa_academico', 'esp_aca.espacio_academico', 'esp_aca.codigo_espacio_academico', 'per_aca.periodo_academico',
                'pro_aca.id as id_pro_aca', 'esp_aca.id as id_esp_aca',
                'sem_asig.semestre_asignatura', 'sol_prac.tipo_ruta', 'proy_pre.destino_rp', 'proy_pre.destino_ra', 'sol_prac.fecha_salida', 'sol_prac.fecha_regreso',
                'sol_prac.num_estudiantes', 'sol_prac.num_acompaniantes', 'sol_prac.num_acompaniantes_apoyo', 'proy_pre.id_docente_responsable',
                DB::raw('CONCAT(users.primer_nombre, " ", users.segundo_nombre, " ", users.primer_apellido, " ", users.segundo_apellido) as full_name'))
        ->join('proyeccion_preliminar as proy_pre', 'sol_prac.id_proyeccion_preliminar', 'proy_pre.id')
        ->join('programa_academico as pro_aca', 'proy_pre.id_programa_academico', 'pro_aca.id')
        ->join('espacio_academico as esp_aca', 'proy_pre.id_espacio_academico', 'esp_aca.id')
        ->join('periodo_academico as per_aca', 'proy_pre.id_periodo_academico', 'per_aca.id')
        ->join('semestre_asignatura as sem_asig', 'proy_pre.id_semestre_asignatura', 'sem_asig.id')
        ->join('users', 'proy_pre.id_docente_responsable', 'users.id')
        ->where('proy_pre.id','=',$id)->first();

        $id_creador = $nueva_solicitud->id_docente_responsable;
        $creador=DB::table('users')->where('id','=',$id_creador)->first();
        $id_esp_aca = $nueva_solicitud->id_esp_aca;
        $id_pro_aca = $nueva_solicitud->id_pro_aca;
        $coord =DB::table('users')->where('id_programa_academico_coord','=',$id_pro_aca)->first();
        
        $emails = [];

        $emails[] = $creador->email;
        $emails[] = $coord->email;

        Mail::to("andres.linaresr@gmail.com")->send(new CodigoMail($filter,$nueva_proyeccion,$nueva_solicitud));
    }

    public function aprob_coord_proy()
    {
        $filter = "aprob_coord_proy";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function aprob_coord_solic()
    {
        $filter = "aprob_coord_solic";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    /**
     * Plan de pácticas
     */

    public function aprob_ejec_solic()
    {
        $filter = "aprob_ejec_solic";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function radic_avance_tesor_solic()
    {
        $filter = "radic_avance_tesor_solic";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function info_solic_estudiantes()
    {
        $filter = "info_solic_estudiantes";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function info_transp_vice()
    {
        $filter = "info_transp_vice";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function noti_transp_solic()
    {
        $filter = "noti_transp_solic";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function pre_salida()
    {
        $filter = "pre_salida";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }

    public function pos_salida()
    {
        $filter = "pos_salida";
        Mail::to("lauritagiraldo.s@gmail.com")->send(new CodigoMail($filter));
    }
}
