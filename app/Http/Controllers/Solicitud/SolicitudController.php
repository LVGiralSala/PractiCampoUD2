<?php

namespace PractiCampoUD\Http\Controllers\Solicitud;

use Illuminate\Http\Request;
use PractiCampoUD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use PractiCampoUD\proyeccion;
use PractiCampoUD\User;
use DateTime;
use Illuminate\Auth\Access\Response;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Null_;
use PractiCampoUD\costos_proyeccion;
use PractiCampoUD\docentes_practica;
use PractiCampoUD\espacio_academico;
use PractiCampoUD\image;
use PractiCampoUD\materiales_herramientas_proyeccion;
use PractiCampoUD\programa_academico;
use PractiCampoUD\riesgos_amenazas_practica;
use PractiCampoUD\riesgos_amenazas_proyeccion;
use PractiCampoUD\transporte_proyeccion;
use DB;
use PractiCampoUD\estudiantes_practica;
use PractiCampoUD\solicitud;

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
        $id = Auth::user()->id;
        $usuario=User::find($id);
        $nomb_usuario = $usuario->primer_nombre.' '.$usuario->segundo_nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
        $proyeccion_preliminar=DB::table('proyeccion_preliminar')->get();
        $programa_academico=DB::table('programa_academico')->get();
        $espacio_academico=DB::table('espacio_academico as esp_aca')
        ->select('esp_aca.id', 'esp_aca.id_programa_academico', 'prog_aca.programa_academico', 'esp_aca.codigo_espacio_academico',
                 'esp_aca.espacio_academico', 'esp_aca.plan_estudios_1', 'esp_aca.plan_estudios_2', 'esp_aca.tipo_espacio')
        ->join('programa_academico as prog_aca','esp_aca.id_programa_academico','=','prog_aca.id')
        ->whereIn('esp_aca.id', [$usuario->id_espacio_academico_1, $usuario->id_espacio_academico_2, $usuario->id_espacio_academico_3, 
        $usuario->id_espacio_academico_4, $usuario->id_espacio_academico_5, $usuario->id_espacio_academico_6])->get();
        $semestre_asignatura=DB::table('semestre_asignatura')->get();
        $periodo_academico=DB::table('periodo_academico')->get();
        $tipo_zona_transitar=DB::table('tipo_zona_transitar')->get();
        $tipo_transporte=DB::table('tipo_transporte')->get();

        $prog_aca_user = [];
        $esp_aca_user = [];
       
        foreach($espacio_academico as $esp_aca)
        {
            $prog_aca_user[] = [
                'id'=>$esp_aca->id_programa_academico,
                'programa_academico'=>$esp_aca->programa_academico,
            ];
            
        }

        $newArray = array_unique($prog_aca_user, SORT_REGULAR);

        return view('solicitudes.create', [
                                            "proyeccion_preliminar"=>$proyeccion_preliminar,
                                            "programas_academicos"=>$programa_academico,
                                            "espacios_academicos"=>$espacio_academico,
                                            "semestres_asignaturas"=>$semestre_asignatura,
                                            "periodos_academicos"=>$periodo_academico,
                                            "tipos_zonas_transitar"=>$tipo_zona_transitar,
                                            "tipos_transportes"=>$tipo_transporte,
                                            "programas_usuario"=>$newArray,
                                            "nombre_usuario"=>$nomb_usuario

        ]);
    }

    /**
     * Proyecciones preliminares aprobadas por consejo 
     *
     * @return \Illuminate\Http\Response
     */

    public function pre_solicitud()
    {
        // switch($filter)
        // {
        //     case 'aprob-cons':
                $espacios = DB::table('espacio_academico as esp_aca')
                ->where('electiva','=',1)->get();
                $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','p_prel.id_docente_responsable',
                        'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                        'es_dec.abrev  as ab_dec','es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord','es_consj.abrev as es_consj','users.id_estado as id_estado_doc',
                        'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 'c_proy.viaticos_estudiantes_ra',
                        'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                        'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                        DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                ->join('users','p_prel.id_docente_responsable','=','users.id')
                ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                ->where('aprobacion_consejo_facultad','=',3)
                ->where('p_prel.id_estado','=',1)
                ->paginate(10);

        //     break;
        // }
            $filter="all";
        return view('solicitudes.index',["proyecciones"=>$proyeccion, 'filter'=>$filter]);
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
        $idRole = Auth::user()->id_role;
        switch($idRole)
        {
            case 1:
                $proyeccion_preliminar = proyeccion::find($id);
                $idUser = $proyeccion_preliminar->id_docente_responsable;
                // $idUser = Auth::user()->id;
                $usuario=DB::table('users')
                ->where('id','=',$idUser)->first();

                $espacio_academico=DB::table('espacio_academico as esp_aca')
                ->select('esp_aca.id', 'esp_aca.id_programa_academico', 'prog_aca.programa_academico', 'esp_aca.codigo_espacio_academico',
                'esp_aca.espacio_academico', 'esp_aca.plan_estudios_1', 'esp_aca.plan_estudios_2', 'esp_aca.tipo_espacio')
                ->join('programa_academico as prog_aca','esp_aca.id_programa_academico','=','prog_aca.id')
                ->whereIn('esp_aca.id', [$usuario->id_espacio_academico_1, $usuario->id_espacio_academico_2, $usuario->id_espacio_academico_3, 
                $usuario->id_espacio_academico_4, $usuario->id_espacio_academico_5, $usuario->id_espacio_academico_6])->get();
                
                $programa_academico = DB::table('programa_academico')->get();
                $periodo_academico=DB::table('periodo_academico')->get();
                $semestre_asignatura=DB::table('semestre_asignatura')->get();
                $tipo_transporte=DB::table('tipo_transporte')->get();
                $all_esp_aca=DB::table('espacio_academico')->get();
                $all_prog_aca=$programa_academico;
        
                $num_grupos_proy = 0; 
        
                $prog_aca_user = [];
                $esp_aca_user = [];
            
                foreach($espacio_academico as $esp_aca)
                {
                    $prog_aca_user[] = [
                        'id'=>$esp_aca->id_programa_academico,
                        'programa_academico'=>$esp_aca->programa_academico,
                    ];
                    
                }

                $estado_doc_respon =$usuario->id_estado;
                
                $newArray_prog = array_unique($prog_aca_user, SORT_REGULAR);
                $nomb_usuario = $usuario->primer_nombre.' '.$usuario->segundo_nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
        
                return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog,
                                                "all_programas_aca"=>$all_prog_aca,
                                                "all_espacios_aca"=>$all_esp_aca,
                                                "nombre_usuario"=>$nomb_usuario,
                                                "estado_doc_respon"=>$estado_doc_respon,
        
                ]);

            break;

            case 2:
                $proyeccion_preliminar = proyeccion::find($id);
                $idUser = $proyeccion_preliminar->id_docente_responsable;
                // $idUser = Auth::user()->id;
                $usuario=DB::table('users')
                ->where('id','=',$idUser)->first();
                $programa_academico = DB::table('programa_academico')->get();
                $espacio_academico=DB::table('espacio_academico as esp_aca')
                ->select('esp_aca.id', 'esp_aca.id_programa_academico', 'prog_aca.programa_academico', 'esp_aca.codigo_espacio_academico',
                        'esp_aca.espacio_academico', 'esp_aca.plan_estudios_1', 'esp_aca.plan_estudios_2', 'esp_aca.tipo_espacio')
                ->join('programa_academico as prog_aca','esp_aca.id_programa_academico','=','prog_aca.id')
                ->whereIn('esp_aca.id', [$usuario->id_espacio_academico_1, $usuario->id_espacio_academico_2, $usuario->id_espacio_academico_3, 
                $usuario->id_espacio_academico_4, $usuario->id_espacio_academico_5, $usuario->id_espacio_academico_6])->get();
                $periodo_academico=DB::table('periodo_academico')->get();
                $semestre_asignatura=DB::table('semestre_asignatura')->get();
                $tipo_transporte=DB::table('tipo_transporte')->get();
                
                $docentes_activos=DB::table('users')
                // ->select(
                // DB::raw('CONCAT(users.primer_nombre, " ", users.segundo_nombre, " ", users.primer_apellido, " ", users.segundo_apellido) as full_name'))
                // ->join('proyeccion_preliminar as p_prel','users.id','=','p_prel.id_docente_responsable')
                // ->whereIn($proyeccion_preliminar->id_espacio_academico, ['users.id_espacio_academico_1', 'users.id_espacio_academico_2', 'users.id_espacio_academico_3', 
                // 'users.id_espacio_academico_4', 'users.id_espacio_academico_5', 'users.id_espacio_academico_6'])
                ->where('users.id_estado','=',1)
                ->where('users.id_role','=',5)
                ->where('users.id_espacio_academico_1','=',$proyeccion_preliminar->id_espacio_academico)
                ->orWhere('users.id_espacio_academico_2','=',$proyeccion_preliminar->id_espacio_academico)
                ->orWhere('users.id_espacio_academico_3','=',$proyeccion_preliminar->id_espacio_academico)
                ->orWhere('users.id_espacio_academico_4','=',$proyeccion_preliminar->id_espacio_academico)
                ->orWhere('users.id_espacio_academico_5','=',$proyeccion_preliminar->id_espacio_academico)
                ->orWhere('users.id_espacio_academico_6','=',$proyeccion_preliminar->id_espacio_academico)->get();

                $estado_doc_respon =$usuario->id_estado;
        
                $num_grupos_proy = 0; 
        
                $prog_aca_user = [];
                $esp_aca_user = [];
            
                foreach($espacio_academico as $esp_aca)
                {
                    $prog_aca_user[] = [
                        'id'=>$esp_aca->id_programa_academico,
                        'programa_academico'=>$esp_aca->programa_academico,
                    ];
                    
                }
                
                $newArray_prog = array_unique($prog_aca_user, SORT_REGULAR);
                $nomb_usuario = $usuario->primer_nombre.' '.$usuario->segundo_nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
        
                return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog,
                                                "nombre_usuario"=>$nomb_usuario,
                                                "docentes_activos"=>$docentes_activos,
                                                "estado_doc_respon"=>$estado_doc_respon,
        
                ]);
            break;

            case 3:
                $proyeccion_preliminar = proyeccion::find($id);
                $idUser = $proyeccion_preliminar->id_docente_responsable;
                // $idUser = Auth::user()->id;
                $usuario=DB::table('users')
                ->where('id','=',$idUser)->first();

                $espacio_academico=DB::table('espacio_academico as esp_aca')
                ->select('esp_aca.id', 'esp_aca.id_programa_academico', 'prog_aca.programa_academico', 'esp_aca.codigo_espacio_academico',
                'esp_aca.espacio_academico', 'esp_aca.plan_estudios_1', 'esp_aca.plan_estudios_2', 'esp_aca.tipo_espacio')
                ->join('programa_academico as prog_aca','esp_aca.id_programa_academico','=','prog_aca.id')
                ->whereIn('esp_aca.id', [$usuario->id_espacio_academico_1, $usuario->id_espacio_academico_2, $usuario->id_espacio_academico_3, 
                $usuario->id_espacio_academico_4, $usuario->id_espacio_academico_5, $usuario->id_espacio_academico_6])->get();
                
                $programa_academico = DB::table('programa_academico')->get();
                $periodo_academico=DB::table('periodo_academico')->get();
                $semestre_asignatura=DB::table('semestre_asignatura')->get();
                $tipo_transporte=DB::table('tipo_transporte')->get();
                $all_esp_aca=DB::table('espacio_academico')->get();
                $all_prog_aca=$programa_academico;

                $num_grupos_proy = 0; 
        
                $prog_aca_user = [];
                $esp_aca_user = [];
            
                foreach($espacio_academico as $esp_aca)
                {
                    $prog_aca_user[] = [
                        'id'=>$esp_aca->id_programa_academico,
                        'programa_academico'=>$esp_aca->programa_academico,
                    ];
                    
                }

                $estado_doc_respon =$usuario->id_estado;
                
                $newArray_prog = array_unique($prog_aca_user, SORT_REGULAR);
                $nomb_usuario = $usuario->primer_nombre.' '.$usuario->segundo_nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
        
                return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog,
                                                "all_programas_aca"=>$all_prog_aca,
                                                "all_espacios_aca"=>$all_esp_aca,
                                                "nombre_usuario"=>$nomb_usuario,
                                                "estado_doc_respon"=>$estado_doc_respon,
        
                ]);
            break;

            case 4:
                $proyeccion_preliminar = proyeccion::find($id);
                $idUser = $proyeccion_preliminar->id_docente_responsable;
                $idUser_log = Auth::user()->id;
                $usuario_log=DB::table('users')
                ->where('id','=',$idUser_log)->first();

                $usuario_respon=DB::table('users')
                ->where('id','=',$idUser)->first();

                $programa_academico = DB::table('programa_academico')->get();
                $espacio_academico=DB::table('espacio_academico as esp_aca')
                ->select('esp_aca.id', 'esp_aca.id_programa_academico', 'prog_aca.programa_academico', 'esp_aca.codigo_espacio_academico',
                        'esp_aca.espacio_academico', 'esp_aca.plan_estudios_1', 'esp_aca.plan_estudios_2', 'esp_aca.tipo_espacio')
                ->join('programa_academico as prog_aca','esp_aca.id_programa_academico','=','prog_aca.id')
                ->whereIn('esp_aca.id', [$usuario_respon->id_espacio_academico_1, $usuario_respon->id_espacio_academico_2, $usuario_respon->id_espacio_academico_3, 
                $usuario_respon->id_espacio_academico_4, $usuario_respon->id_espacio_academico_5, $usuario_respon->id_espacio_academico_6])->get();
                $periodo_academico=DB::table('periodo_academico')->get();
                $semestre_asignatura=DB::table('semestre_asignatura')->get();
                $tipo_transporte=DB::table('tipo_transporte')->get();
        
                $num_grupos_proy = 0; 
        
                $prog_aca_user = [];
                $esp_aca_user = [];
            
                foreach($espacio_academico as $esp_aca)
                {
                    $prog_aca_user[] = [
                        'id'=>$esp_aca->id_programa_academico,
                        'programa_academico'=>$esp_aca->programa_academico,
                    ];
                    
                }
                
                $estado_doc_respon =$usuario_respon->id_estado;

                $newArray_prog = array_unique($prog_aca_user, SORT_REGULAR);
                $nomb_usuario = $usuario_log->primer_nombre.' '.$usuario_log->segundo_nombre.' '.$usuario_log->primer_apellido.' '.$usuario_log->segundo_apellido;
                $nomb_doc_respon = $usuario_respon->primer_nombre.' '.$usuario_respon->segundo_nombre.' '.$usuario_respon->primer_apellido.' '.$usuario_respon->segundo_apellido;

                return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog,
                                                "usuario_log"=>$usuario_log,
                                                "nombre_usuario"=>$nomb_usuario,
                                                "nombre_doc_resp"=>$nomb_doc_respon,
                                                "estado_doc_respon"=>$estado_doc_respon,
        
                ]);
            break;

            case 5:
                $proyeccion_preliminar = proyeccion::find($id);
                $costos_proyeccion = costos_proyeccion::find($id);
                $docentes_practica = docentes_practica::find($id);
                $mate_herra_proyeccion = materiales_herramientas_proyeccion::find($id);
                $riesg_amen_practica = riesgos_amenazas_practica::find($id);
                $transporte_proyeccion = riesgos_amenazas_practica::find($id);
                $solicitud_practica = DB::table('solicitud_practica as sol_prac')
                // ->join('proyeccion_preliminar as p_prel','sol_prac.id_proyeccion_preliminar','=','p_prel.id')
                // ->join('costos_proyeccion as c_proy','sol_prac.id_proyeccion_preliminar','=','c_proy.id')
                // ->join('docentes_practica as doc_prac','sol_prac.id_proyeccion_preliminar','=','doc_prac.id')
                // ->join('materiales_herramientas_proyeccion as mat_herr_proy','sol_prac.id_proyeccion_preliminar','=','mat_herr_proy.id')
                // ->join('riesgos_amenazas_practica as ries_amen_prac','sol_prac.id_proyeccion_preliminar','=','ries_amen_prac.id')
                // ->join('transporte_proyeccion as transp_proy','sol_prac.id_proyeccion_preliminar','=','transp_proy.id')
                ->where('sol_prac.id_proyeccion_preliminar','=',$id)->first();
                $idUser = $proyeccion_preliminar->id_docente_responsable;
                // $idUser = Auth::user()->id;
                $usuario=DB::table('users')
                ->where('id','=',$idUser)->first();

                $programa_academico = DB::table('programa_academico')->get();
                $espacio_academico=DB::table('espacio_academico as esp_aca')
                ->select('esp_aca.id', 'esp_aca.id_programa_academico', 'prog_aca.programa_academico', 'esp_aca.codigo_espacio_academico',
                        'esp_aca.espacio_academico', 'esp_aca.plan_estudios_1', 'esp_aca.plan_estudios_2', 'esp_aca.tipo_espacio')
                ->join('programa_academico as prog_aca','esp_aca.id_programa_academico','=','prog_aca.id')
                ->whereIn('esp_aca.id', [$usuario->id_espacio_academico_1, $usuario->id_espacio_academico_2, $usuario->id_espacio_academico_3, 
                $usuario->id_espacio_academico_4, $usuario->id_espacio_academico_5, $usuario->id_espacio_academico_6])->get();
                $periodo_academico=DB::table('periodo_academico')->get();
                $semestre_asignatura=DB::table('semestre_asignatura')->get();
                $tipo_transporte=DB::table('tipo_transporte')->get();
                $num_grupos_proy = 0; 
        
                $prog_aca_user = [];
                $esp_aca_user = [];
            
                foreach($espacio_academico as $esp_aca)
                {
                    $prog_aca_user[] = [
                        'id'=>$esp_aca->id_programa_academico,
                        'programa_academico'=>$esp_aca->programa_academico,
                    ];
                    
                }

                $estado_doc_respon =$usuario->id_estado;
                
                $newArray_prog = array_unique($prog_aca_user, SORT_REGULAR);
                $nomb_usuario = $usuario->primer_nombre.' '.$usuario->segundo_nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
        
                return view('solicitudes.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog,
                                                "nombre_usuario"=>$nomb_usuario,
                                                "estado_doc_respon"=>$estado_doc_respon,
                                                "solicitud_practica"=>$solicitud_practica,
                                                "costos_proyeccion"=>$costos_proyeccion,
                                                "docentes_practica"=>$docentes_practica,
                                                "mate_herra_proyeccion"=>$mate_herra_proyeccion,
                                                "riesg_amen_practica"=>$riesg_amen_practica,
                                                "transporte_proyeccion"=>$transporte_proyeccion,
                                                
        
                ]);
            break;
        }
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
        $mytime = Carbon::now('America/Bogota');
        $proyeccion_preliminar = proyeccion::where('id', '=', $id)->first();
        $transporte_proyeccion = transporte_proyeccion::where('id','=',$id)->first();
        $costos_proyeccion = costos_proyeccion::where('id','=',$id)->first();
        $solicitud_practica = solicitud::where('id_proyeccion_preliminar', '=', $id)->first();

        if(Auth::user()->id_role == 1 ||  Auth::user()->id_role == 5)
        {
            
            $cod_esp_aca = $request->get('id_espacio_academico');
            $id_prog_aca = $request->get('id_programa_academico');
            $esp_aca = DB::table('espacio_academico')
            ->where('id_programa_academico','=',$id_prog_aca)
            ->where('codigo_espacio_academico','=',$cod_esp_aca)->first();
            $proyeccion_preliminar->id_espacio_academico=(!empty($esp_aca)||null)?
            $esp_aca->id:$proyeccion_preliminar->id_espacio_academico;

            // $proyeccion_preliminar->id_peridodo_academico=$request->get('id_periodo_academico');
            // $proyeccion_preliminar->id_semestre_asignatura=$request->get('id_semestre_asignatura');

            $proyeccion_preliminar->num_estudiantes_aprox=$request->get('num_estudiantes_aprox');
            // $proyeccion_preliminar->num_acompaniantes=$request->get('num_acompaniantes');
            $proyeccion_preliminar->cantidad_grupos=$request->get('cant_grupos_edit');

            $proyeccion_preliminar->grupo_1=$request->get('grupo_1');
            $proyeccion_preliminar->grupo_2=$request->get('grupo_2');
            $proyeccion_preliminar->grupo_3=$request->get('grupo_3');
            $proyeccion_preliminar->grupo_4=$request->get('grupo_4');

            // $proyeccion_preliminar->destino_rp=$request->get('destino_rp');
            // $proyeccion_preliminar->ruta_principal=$request->get('ruta_principal');
            // $proyeccion_preliminar->destino_ra=$request->get('destino_ra');
            // $proyeccion_preliminar->ruta_alterna=$request->get('ruta_alterna');
            $proyeccion_preliminar->det_recorrido_interno_rp=$request->get('det_recorrido_interno_rp');
            // $proyeccion_preliminar->det_recorrido_interno_ra=$request->get('det_recorrido_interno_ra');
            
            $proyeccion_preliminar->lugar_salida_rp=$request->get('lugar_salida_rp');
            // $proyeccion_preliminar->lugar_salida_ra=$request->get('lugar_salida_ra');
            $proyeccion_preliminar->lugar_regreso_rp=$request->get('lugar_regreso_rp');
            // $proyeccion_preliminar->lugar_regreso_ra=$request->get('lugar_regreso_ra');

            $proyeccion_preliminar->fecha_salida_aprox_rp= $request->get('fecha_salida_aprox_rp');
            $proyeccion_preliminar->fecha_regreso_aprox_rp= $request->get('fecha_regreso_aprox_rp');
            // $proyeccion_preliminar->fecha_salida_aprox_ra= $request->get('fecha_salida_aprox_ra');
            // $proyeccion_preliminar->fecha_regreso_aprox_ra= $request->get('fecha_regreso_aprox_ra');

            $fecha_salida_rp = new DateTime($proyeccion_preliminar->fecha_salida_aprox_rp);
            $fecha_regreso_rp = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_rp);
            $num_dias_rp = $fecha_salida_rp->diff($fecha_regreso_rp);
            $proyeccion_preliminar->duracion_num_dias_rp=$num_dias_rp->days+1;

            // $fecha_salida_ra = new DateTime($proyeccion_preliminar->fecha_salida_aprox_ra);
            // $fecha_regreso_ra = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_ra);
            // $num_dias_ra = $fecha_salida_ra->diff($fecha_regreso_ra);



            // $tipo_transporte_rp = $request->get('id_tipo_transporte_rp_');
            // $tipo_transporte_ra = $request->get('id_tipo_transporte_ra_');
            // $det_tipo_transporte_rp = $request->get('det_tipo_transporte_rp_');
            // $det_tipo_transporte_ra = $request->get('det_tipo_transporte_ra_');
            // $capacid_transporte_rp = $request->get('capac_transporte_rp_');
            // $capacid_transporte_ra = $request->get('capac_transporte_ra_');
            
            // $proyeccion_preliminar->id_tipo_transporte_rp_1 =$tipo_transporte_rp[0];
            // $proyeccion_preliminar->id_tipo_transporte_rp_2 =$tipo_transporte_rp[1]??NULL;
            // $proyeccion_preliminar->id_tipo_transporte_rp_3 =$tipo_transporte_rp[2]??NULL;
            // $proyeccion_preliminar->id_tipo_transporte_ra_1 =$tipo_transporte_ra[0];
            // $proyeccion_preliminar->id_tipo_transporte_ra_2 =$tipo_transporte_ra[1]??NULL;
            // $proyeccion_preliminar->id_tipo_transporte_ra_3 =$tipo_transporte_ra[2]??NULL;

            // $proyeccion_preliminar->det_tipo_transporte_rp_1=$det_tipo_transporte_rp[0];
            // $proyeccion_preliminar->det_tipo_transporte_rp_2=$det_tipo_transporte_rp[1]??NULL;
            // $proyeccion_preliminar->det_tipo_transporte_rp_3=$det_tipo_transporte_rp[2]??NULL;
            // $proyeccion_preliminar->det_tipo_transporte_ra_1=$det_tipo_transporte_ra[0];
            // $proyeccion_preliminar->det_tipo_transporte_ra_2=$det_tipo_transporte_ra[1]??NULL;
            // $proyeccion_preliminar->det_tipo_transporte_ra_3=$det_tipo_transporte_ra[2]??NULL;

            // $proyeccion_preliminar->capac_transporte_rp_1=$capacid_transporte_rp[0];
            // $proyeccion_preliminar->capac_transporte_rp_2=$capacid_transporte_rp[1]??NULL;
            // $proyeccion_preliminar->capac_transporte_rp_3=$capacid_transporte_rp[2]??NULL;
            // $proyeccion_preliminar->capac_transporte_ra_1=$capacid_transporte_ra[0];
            // $proyeccion_preliminar->capac_transporte_ra_2=$capacid_transporte_ra[1]??NULL;
            // $proyeccion_preliminar->capac_transporte_ra_3=$capacid_transporte_ra[2]??NULL;
            
            // $proyeccion_preliminar->cant_transporte_rp=count($capacid_transporte_rp);
            // $proyeccion_preliminar->cant_transporte_ra=count($capacid_transporte_ra);

            // $proyeccion_preliminar->exclusiv_tiempo_rp_1=$request->get('exclusiv_tiempo_rp_1');
            // $proyeccion_preliminar->exclusiv_tiempo_rp_2=$request->get('exclusiv_tiempo_rp_2');
            // $proyeccion_preliminar->exclusiv_tiempo_rp_3=$request->get('exclusiv_tiempo_rp_3');
            // $proyeccion_preliminar->exclusiv_tiempo_ra_1=$request->get('exclusiv_tiempo_ra_1');
            // $proyeccion_preliminar->exclusiv_tiempo_ra_2=$request->get('exclusiv_tiempo_ra_2');
            // $proyeccion_preliminar->exclusiv_tiempo_ra_3=$request->get('exclusiv_tiempo_ra_3');

            $solicitud_practica->cronograma = $request->get('cronograma');
            $solicitud_practica->observaciones = $request->get('observaciones');
            $solicitud_practica->justificacion = $request->get('justificacion');
            $solicitud_practica->objetivo_general = $request->get('objetivo_general');
            $solicitud_practica->metodologia_evaluacion = $request->get('metodologia_evaluacion');

            if(Auth::user()->id_role == 1)
            {
                $proyeccion_preliminar->observ_coordinador= $request->get('observ_coordinador');
                $proyeccion_preliminar->aprobacion_coordinador= $request->get('aprobacion_coordinador');
                $proyeccion_preliminar->id_coordinador_aprob = Auth::user()->id;
    
                $proyeccion_preliminar->observ_decano= $request->get('observ_decano');
                $proyeccion_preliminar->aprobacion_decano= $request->get('aprobacion_decano');
                $proyeccion_preliminar->id_decano_aprob = Auth::user()->id;
            }
            
        }

        $proyeccion_preliminar->update();
        $costos_proyeccion->update();
        $transporte_proyeccion->update();
        $solicitud_practica->update();
        return redirect('solicituds/filtrar/all');
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

    // public function index_codigo()
    // {
    //     return view('solicitudes.prueba_codigo',["respuesta"=>""]);
    // }

    // public function consulta_codigo(Request $request)
    // {

    //     $respuesta = "";
    //     $id = $request->cod_consulta;
    //     $cod_graduacion =DB::table('codigo_graduacion')
    //     ->where('id','=', $id)->first();

    //     if(!empty($cod_graduacion) ||  $cod_graduacion!= null)
    //     {
    //         $nombre = $cod_graduacion->nombre_estudiante;
    //         $respuesta = 'El código: '.$id.' asociado al estudiante: ' .$nombre.' cuenta con diploma de graduación.';
    //     }

    //     else if(empty($cod_graduacion) ||  $cod_graduacion== null)
    //     {
    //         $respuesta = "El código NO cuenta con diploma de graduación.";
    //     }
    //     return view('solicitudes.prueba_codigo',["respuesta"=>$respuesta]);
    // }


    public function filterSolicitud($filter)
    {
        $idRole = Auth::user()->id_role;
        $idUser = Auth::user()->id;
        switch($idRole)
        {   
            case 1:
                 switch($filter)
                {
                    case '':
                    break;

                    case '':
                    break;

                    case 'all':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','es_consj.abrev as es_consj',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->paginate(10);
                        
                        return view('proyecciones.index',["proyecciones"=>$proyeccion]);
                    break;

                    default;
                }
            break;

            case 2:
                switch($filter)
                {
                    case 'inact':
                        $espacios = DB::table('espacio_academico as esp_aca')
                        ->where('electiva','=',1)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','p_prel.id_docente_responsable',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord','es_consj.abrev as es_consj','users.id_estado as id_estado_doc',
                                'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 'c_proy.viaticos_estudiantes_ra', 
                                'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        ->where('aprobacion_consejo_facultad','=',3)
                        ->where('p_prel.id_estado','=',2)
                        ->paginate(10);

                    break;

                    case 'aprob-cons':
                        $espacios = DB::table('espacio_academico as esp_aca')
                        ->where('electiva','=',1)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','p_prel.id_docente_responsable',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord','es_consj.abrev as es_consj','users.id_estado as id_estado_doc',
                                'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 'c_proy.viaticos_estudiantes_ra', 
                                'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        ->where('aprobacion_consejo_facultad','=',3)
                        ->where('p_prel.id_estado','=',1)
                        ->paginate(10);

                    break;

                    case 'no-elect':
                        $espacios = DB::table('espacio_academico as esp_aca')
                        ->select('esp_aca.id','esp_aca.id_programa_academico','esp_aca.codigo_espacio_academico','esp_aca.espacio_academico',
                        'esp_aca.electiva', 'p_aca.programa_academico')
                        ->join('programa_academico as p_aca','esp_aca.id_programa_academico','=','p_aca.id')
                        ->where('esp_aca.electiva','=',0)->get();
                        $proyeccion = [];
                        foreach($espacios as $esp)
                        {
                            $proyecciones=DB::table('proyeccion_preliminar as p_prel')
                            ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                    'e_aca.electiva', 'p_prel.id_espacio_academico', 'p_aca.programa_academico',
                                    'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 'c_proy.viaticos_estudiantes_ra', 
                                    'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                    'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                    'users.id_estado as id_estado_doc')
                                    // DB::raw('CONCAT(users.primer_nombre, " ", users.segundo_nombre, " ", users.primer_apellido, " ", users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                            // ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            // ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            // ->where('confirm_creador','=',1)
                            // ->where('confirm_coord','=',0)
                            // ->where('e_aca.electiva','=',0)
                            // // ->where('id_docente_responsable','=',$idUser)
                            ->where('p_prel.id_estado','=',1)
                            ->where('p_prel.id_espacio_academico','=',$esp->id)->get();
                            // ->paginate(10);
                            
                            if(count($proyecciones)==0)
                            {
                                $proyeccion[] = $esp;
                            }
                            
                        }
                        return view('proyecciones.index',["proyecciones"=>$proyeccion, 'filter'=>$filter]);

                    break;
                    

                    case 'elect':
                        $espacios = DB::table('espacio_academico as esp_aca')
                        ->where('electiva','=',1)->get();
                        // $proyeccion = 0;
                        // foreach($espacios as $esp)
                        // {
                            $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                            ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                    'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                    'es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord','users.id_estado as id_estado_doc','es_consj.abrev as es_consj',
                                    'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 'c_proy.viaticos_estudiantes_ra', 
                                    'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                    'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                    DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                            ->where('confirm_creador','=',1)
                            ->where('confirm_coord','=',1)
                            ->where('confirm_electiva_coord','=',1)
                            ->where('e_aca.electiva','=',1)
                            // ->where('id_docente_responsable','=',$idUser)
                            ->where('aprobacion_coordinador','=',3)
                            ->where('p_prel.id_estado','=',1)
                            ->paginate(10);

                        //     if(count($proyecciones_extra) >= 1)
                        //     {
                        //         $proyeccion += $proyecciones_extra;
                        //     }
                        // }
                    break;

                    case 'pend':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado as id_estado_doc','es_consj.abrev as es_consj',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec', 'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 
                                'c_proy.viaticos_estudiantes_ra', 'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        // ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.aprobacion_decano','=',5)
                        ->where('p_prel.confirm_asistD','=',1)
                        ->where('p_prel.id_estado','=',1)
                        // ->orWhere('aprobacion_decano','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    case 'aprob':
                            $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                            ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado as id_estado_doc','es_consj.abrev as es_consj',
                                    'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                    'es_dec.abrev  as ab_dec', 'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 
                                    'c_proy.viaticos_estudiantes_ra', 'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                    'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                    DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                            // ->where('p_prel.aprobacion_coordinador','=',3)
                            ->where('p_prel.aprobacion_asistD','=',3)
                            ->where('p_prel.aprobacion_decano','=',3)
                            ->where('p_prel.confirm_asistD','=',1)
                            ->where('p_prel.id_estado','=',1)
                            // ->orWhere('aprobacion_decano','=',3)
                            // ->orWhere('aprobacion_decano','=',5)
                            ->paginate(10);
                    break;
                    
                    case 'all':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado as id_estado_doc',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec',
                                'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 'c_proy.viaticos_estudiantes_ra', 
                                'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                'es_consj.abrev  as es_consj',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.confirm_asistD','=',1)
                        ->where('p_prel.id_estado','=',1)
                        // ->orWhere('aprobacion_decano','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                        
                    break;

                    default;
                }

            break;

            case 3:
                switch($filter)
                {
                    case 'no-aprob-cons':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico','es_consj.abrev as es_consj',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord', 'p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra'
                                ,'p_prel.aprobacion_coordinador','users.id_estado as id_estado_doc',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.confirm_coord','=',1)
                        ->where('p_prel.confirm_asistD','=',1)
                        ->where('p_prel.aprobacion_decano','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.aprobacion_consejo_facultad','=',5)
                        ->where('p_prel.id_estado','=',1)
                        // ->where('p_prel.valor_estimado_transporte_rp','!=',null)
                        // ->where('p_prel.valor_estimado_transporte_ra','!=',null)
                        // ->orWhere('p_prel.valor_estimado_transporte_rp','!=',0)
                        // ->orWhere('p_prel.valor_estimado_transporte_ra','!=',0)
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    case 'send':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado as id_estado_doc',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_consj.abrev as es_consj',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.confirm_asistD','=',1)
                        ->where('p_prel.id_estado','=',1)
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    case 'not_send':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico','es_consj.abrev as es_consj',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord', 'c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra'
                                ,'p_prel.aprobacion_coordinador','users.id_estado as id_estado_doc',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.confirm_coord','=',1)
                        ->where('p_prel.confirm_asistD','=',0)
                        ->where('p_prel.id_estado','=',1)
                        // ->where('p_prel.valor_estimado_transporte_rp','!=',null)
                        // ->where('p_prel.valor_estimado_transporte_ra','!=',null)
                        // ->orWhere('p_prel.valor_estimado_transporte_rp','!=',0)
                        // ->orWhere('p_prel.valor_estimado_transporte_ra','!=',0)
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    case 'sin_pres':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico','es_consj.abrev as es_consj',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','users.id_estado as id_estado_doc',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord', 'c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',5)
                        ->where('p_prel.confirm_coord','=',1)
                        ->where('p_prel.confirm_asistD','=',0)
                        ->where('p_prel.id_estado','=',1)
                        ->where(function($query){
                            $query->where('valor_estimado_transporte_rp','=',0)
                                  ->orWhere('valor_estimado_transporte_rp','=',null)
                                  ->orWhere('valor_estimado_transporte_ra','=',0)
                                  ->orWhere('valor_estimado_transporte_ra','=',null);
                        })
                        // ->orWhere(function($query2){
                        //     $query2->orWhere('valor_estimado_transporte_ra','=',0);
                        //           ->orWhere('valor_estimado_transporte_ra','=',null);
                        // })
                        
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;
                    
                    case 'all':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_consj.abrev  as es_consj','p_prel.confirm_coord','users.id_estado as id_estado_doc',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.confirm_coord','=',1)
                        ->where('p_prel.id_estado','=',1)
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);

                        // foreach ($proyeccion as $proy)
                        // {
                        //     $usuario=DB::table('users')
                        //     ->where('id','=',$proy->id_docente_responsable)->first();

                        //     if(!isEmpty($usuario) || $usuario!=null )
                        //     {

                        //     }
                        // }
                    break;

                    default;
                }
            break;

            case 4:
                switch($filter)
                {
                    case 'send':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $idProgAca_asociado = Auth::user()->id_programa_academico_coord;
                        $espacios=DB::table('espacio_academico as esp_aca')
                        ->where('id_programa_academico','=',$idProgAca_asociado)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel','e_aca.confirm_coord')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_consj.abrev as es_consj','users.id_estado as id_estado_doc','p_prel.confirm_coord')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('aprobacion_coordinador','=',3)
                        // ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',1)
                        ->where('p_prel.id_estado','=',1)
                        ->where(function($query) use ($idUser, $id_prog_coord){
                            $query->where('id_docente_responsable','=',$idUser)
                            ->orWhere('p_prel.id_programa_academico','=',$id_prog_coord);
                        })
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    case 'not_send':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $idProgAca_asociado = Auth::user()->id_programa_academico_coord;
                        $espacios=DB::table('espacio_academico as esp_aca')
                        ->where('id_programa_academico','=',$idProgAca_asociado)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_consj.abrev  as es_consj','e_aca.electiva','p_prel.confirm_coord','users.id_estado as id_estado_doc')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('aprobacion_coordinador','=',3)
                        // ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',0)
                        ->where('p_prel.id_estado','=',1)
                        ->where(function($query) use ($idUser, $id_prog_coord){
                            $query->where('id_docente_responsable','=',$idUser)
                            ->orWhere('p_prel.id_programa_academico','=',$id_prog_coord);
                        })
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    
                    case 'elect':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $espacios = DB::table('espacio_academico as esp_aca')
                        ->where('electiva','=',1)->get();
                        // $proyeccion = 0;
                        // foreach($espacios as $esp)
                        // {
                            $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                            ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','es_consj.abrev  as es_consj',
                                    'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                    'es_dec.abrev  as ab_dec','e_aca.extramural','p_prel.confirm_coord','users.id_estado as id_estado_doc')
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            ->where('confirm_creador','=',1)
                            ->where('confirm_coord','=',0)
                            ->where('e_aca.electiva','=',1)
                            // ->where('id_docente_responsable','=',$idUser)
                            ->where('aprobacion_coordinador','=',5)
                            ->where('p_prel.id_estado','=',1)
                            ->where(function($query) use ($idUser, $id_prog_coord){
                                $query->where('id_docente_responsable','=',$idUser)
                                ->orWhere('p_prel.id_programa_academico','=',$id_prog_coord);
                            })
                            ->paginate(10);

                        //     if(count($proyecciones_extra) >= 1)
                        //     {
                        //         $proyeccion += $proyecciones_extra;
                        //     }
                        // }
                    break;

                    case 'pend':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','es_consj.abrev  as es_consj','users.id_estado as id_estado_doc',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec', 'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp',
                                'c_proy.viaticos_estudiantes_ra', 'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        ->where('p_prel.aprobacion_coordinador','=',5)
                        // ->where('p_prel.aprobacion_asistD','=',3)
                        // ->where('p_prel.aprobacion_decano','=',5)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',0)
                        ->where('p_prel.id_estado','=',1)
                        ->where(function($query) use ($idUser, $id_prog_coord){
                            $query->where('id_docente_responsable','=',$idUser)
                            ->orWhere('p_prel.id_programa_academico','=',$id_prog_coord);
                        })
                        // ->orWhere('aprobacion_decano','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    case 'not_aprob':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $idProgAca_asociado = Auth::user()->id_programa_academico_coord;
                        $espacios=DB::table('espacio_academico as esp_aca')
                        ->where('id_programa_academico','=',$idProgAca_asociado)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado as id_estado_doc',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','e_aca.extramural','p_prel.confirm_coord','es_consj.abrev  as es_consj',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('aprobacion_coordinador','=',5)
                        // ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',0)
                        ->where('p_prel.id_estado','=',1)
                        ->where(function($query) use ($idUser, $id_prog_coord){
                            $query->where('id_docente_responsable','=',$idUser)
                            ->orWhere('p_prel.id_programa_academico','=',$id_prog_coord);
                        })
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;
                    
                    case 'all':
                        $idProgAca_asociado = Auth::user()->id_programa_academico_coord;
                        // $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $idProgAca_asociado;
                        $espacios=DB::table('espacio_academico as esp_aca')
                        ->where('id_programa_academico','=',$idProgAca_asociado)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_consj.abrev  as es_consj','users.id_estado as id_estado_doc','p_prel.confirm_coord',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        // ->where('aprobacion_coordinador','=',5)
                        // ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                        ->where('confirm_creador','=',1)
                        ->where('p_prel.id_estado','=',1)
                        ->where(function($query) use ($idUser, $id_prog_coord){
                            $query->where('id_docente_responsable','=',$idUser)
                            ->orWhere('p_prel.id_programa_academico','=',$id_prog_coord);
                        })
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    default;
                }
            break;

            case 5:
                switch($filter)
                {
                    case 'send':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','es_consj.abrev  as es_consj',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_creador', 'p_prel.confirm_coord')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        // ->where('aprobacion_coordinador','=',5)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_docente','=',1)
                        // ->where('confirm_coord','=',1)
                        ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.id_estado','=',1)
                        ->paginate(10);
                    break;

                    case 'not_send':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_consj.abrev  as es_consj','p_prel.confirm_creador')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        // ->where('aprobacion_coordinador','=',5)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_docente','=',0)
                        ->where('confirm_coord','=',0)
                        ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.id_estado','=',1)
                        ->where('aprobacion_consejo_facultad','=',3)
                        ->paginate(10);
                    break;

                    case 'pre-proy':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_consj.abrev  as es_consj','p_prel.confirm_creador',
                                'sol_prac.id as id_solicitud')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('solicitud_practica as sol_prac','p_prel.id','=','sol_prac.id_proyeccion_preliminar')
                        // ->where('aprobacion_coordinador','=',5)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_docente','=',1)
                        ->where('confirm_coord','=',1)
                        ->where('confirm_asistD','=',1)
                        ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.id_estado','=',1)
                        ->where('aprobacion_consejo_facultad','=',3)
                        ->paginate(10);
                    break;

                    case 'proy-aprob':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_consj.abrev  as es_consj','p_prel.confirm_creador',
                                'sol_prac.id as id_solicitud')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('solicitud_practica as sol_prac','p_prel.id','=','sol_prac.id_proyeccion_preliminar')
                        // ->where('aprobacion_coordinador','=',5)
                        // ->where('confirm_creador','=',1)
                        // ->where('confirm_docente','=',1)
                        // ->where('confirm_coord','=',1)
                        // ->where('confirm_asistD','=',1)
                        // ->where('id_docente_responsable','=',$idUser)
                        // ->where('p_prel.id_estado','=',1)
                        // ->where('aprobacion_consejo_facultad','=',3)
                        ->where('id_estado_solicitud_practica','=',3)
                        ->where('si_capital','=',1)
                        ->where('tiene_resolucion','=',1)
                        ->paginate(10);
                    break;

                    case 'all':
                        $espacios = DB::table('espacio_academico as esp_aca')
                        ->where('electiva','=',1)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','p_prel.id_docente_responsable',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord','es_consj.abrev as es_consj','users.id_estado as id_estado_doc',
                                'c_proy.costo_total_transporte_menor_rp','c_proy.costo_total_transporte_menor_ra', 'c_proy.viaticos_estudiantes_rp', 'c_proy.viaticos_estudiantes_ra',
                                'c_proy.viaticos_docente_rp', 'c_proy.viaticos_docente_ra', 
                                'c_proy.total_presupuesto_rp','c_proy.total_presupuesto_ra','c_proy.valor_estimado_transporte_rp','c_proy.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->join('costos_proyeccion as c_proy','p_prel.id','=','c_proy.id')
                        ->where('aprobacion_consejo_facultad','=',3)
                        ->where('p_prel.id_estado','=',1)
                        ->paginate(10);
                        
                        // $filter="all";

                        // $estudiantes=new estudiantes_practica();
                        $estudiantes=DB::table('estudiantes_solicitud_practica')->get();
                    break;

                    default;
                }
            break;
        }
        return view('solicitudes.index',["proyecciones"=>$proyeccion, 'filter'=>$filter]);
        // return view('solicitudes.index',["proyecciones"=>$proyeccion,"estudiantes"=>$estudiantes, 'filter'=>$filter]);
    }
}
