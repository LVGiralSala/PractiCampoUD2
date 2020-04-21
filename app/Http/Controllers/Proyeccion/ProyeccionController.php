<?php

namespace PractiCampoUD\Http\Controllers\Proyeccion;

use PractiCampoUD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PractiCampoUD\proyeccion;
use PractiCampoUD\User;
use DB;
use PractiCampoUD\programa_academico;

// use PractiCampoUD\Http\Middleware\User;

class ProyeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idRole = Auth::user()->id_role;
        $idUser = Auth::user()->id;
        switch($idRole)
        {   
            case 1:
                $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                        'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec')
                ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                ->paginate(10);
                
                return view('proyecciones.index',["proyecciones"=>$proyeccion]);
            break;

            case 2:
                $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                        'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec')
                ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                ->where('aprobacion_coordinador','=',3)
                ->orWhere('aprobacion_decano','=',3)
                ->paginate(10);
                
                return view('proyecciones.index',["proyecciones"=>$proyeccion]);
            break;

            case 3:
                $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                        'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec')
                ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                ->where('aprobacion_coordinador','=',3)
                ->paginate(10);
                
                return view('proyecciones.index',["proyecciones"=>$proyeccion]);
            break;

            case 4:
                $idProgAca_asociado = Auth::user()->id_programa_academico;
                $espacios=DB::table('espacio_academico as esp_aca')
                ->where('id_programa_academico','=',$idProgAca_asociado)->get();
                $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                        'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec')
                ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                // ->where('id_docente_responsable','=',$idUser)
                ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                ->orWhere('id_docente_responsable','=',$idUser)
                ->paginate(10);

                // foreach($proyecciones as $proy)
                // {

                // }
                
                return view('proyecciones.index',["proyecciones"=>$proyeccion]);
            break;

            case 5:
                $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                        'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec')
                ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                ->where('id_docente_responsable','=',$idUser)
                ->paginate(10);
                
                return view('proyecciones.index',["proyecciones"=>$proyeccion]);
            break;
        }
        
    }

    public function verActiva()
    {
        
    }

    public function verInactiva()
    {
        
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

        return view('proyecciones.create', [
                                            "proyeccion_preliminar"=>$proyeccion_preliminar,
                                            "programas_academicos"=>$programa_academico,
                                            "espacios_academicos"=>$espacio_academico,
                                            "semestres_asignaturas"=>$semestre_asignatura,
                                            "periodos_academicos"=>$periodo_academico,
                                            "tipos_zonas_transitar"=>$tipo_zona_transitar,
                                            "tipos_transportes"=>$tipo_transporte,
                                            "programas_usuario"=>$newArray

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_transporte_rp = $request->get('id_tipo_transporte_rp_');
        $tipo_transporte_ra = $request->get('id_tipo_transporte_ra_');
        $det_tipo_transporte_rp = $request->get('det_tipo_transporte_rp_');
        $det_tipo_transporte_ra = $request->get('det_tipo_transporte_ra_');
        $capacid_transporte_rp = $request->get('capac_transporte_rp_');
        $capacid_transporte_ra = $request->get('capac_transporte_ra_');
        $proyeccion_preliminar = new proyeccion;
        $mytime = Carbon::now('America/Bogota');
        $proyeccion_preliminar->fecha_diligenciamiento=$mytime->toDateTimeString();
        $proyeccion_preliminar->id_docente_responsable=Auth::user()->id;
        $proyeccion_preliminar->id_programa_academico=$request->get('id_programa_academico');
        $proyeccion_preliminar->id_espacio_academico=$request->get('id_espacio_academico');
        $proyeccion_preliminar->id_peridodo_academico=$request->get('id_periodo_academico');
        $proyeccion_preliminar->id_semestre_asignatura=$request->get('id_semestre_asignatura');
        $proyeccion_preliminar->destino_rp=$request->get('destino_rp');
        $proyeccion_preliminar->ruta_principal=$request->get('ruta_principal');
        $proyeccion_preliminar->destino_ra=$request->get('destino_ra');
        $proyeccion_preliminar->ruta_alterna=$request->get('ruta_alterna');
        $proyeccion_preliminar->lugar_salida_rp=$request->get('lugar_salida_rp');
        $proyeccion_preliminar->lugar_salida_ra=$request->get('lugar_salida_ra');
        $proyeccion_preliminar->lugar_regreso_rp=$request->get('lugar_regreso_rp');
        $proyeccion_preliminar->lugar_regreso_ra=$request->get('lugar_regreso_ra');
        $proyeccion_preliminar->fecha_salida_aprox_rp=$request->get('fecha_salida_aprox_rp');
        $proyeccion_preliminar->fecha_salida_aprox_ra=$request->get('fecha_salida_aprox_ra');
        $proyeccion_preliminar->fecha_regreso_aprox_rp=$request->get('fecha_regreso_aprox_rp');
        $proyeccion_preliminar->fecha_regreso_aprox_ra=$request->get('fecha_regreso_aprox_ra');
        $proyeccion_preliminar->num_estudiantes_aprox=$request->get('num_estudiantes_aprox');
        $proyeccion_preliminar->num_acompaniantes=$request->get('num_acompaniantes');
        $proyeccion_preliminar->det_recorrido_interno_rp=$request->get('det_recorrido_interno_rp');
        $proyeccion_preliminar->det_recorrido_interno_ra=$request->get('det_recorrido_interno_ra');
        $proyeccion_preliminar->cant_transporte_rp=$request->get('cant_transporte_rp');
        $proyeccion_preliminar->cant_transporte_ra=$request->get('cant_transporte_ra');
        $proyeccion_preliminar->exclusiv_tiempo_rp_1=$request->get('exclusiv_tiempo_rp_1');
        $proyeccion_preliminar->exclusiv_tiempo_rp_2=$request->get('exclusiv_tiempo_rp_2');
        $proyeccion_preliminar->exclusiv_tiempo_rp_3=$request->get('exclusiv_tiempo_rp_3');
        $proyeccion_preliminar->exclusiv_tiempo_ra_1=$request->get('exclusiv_tiempo_ra_1');
        $proyeccion_preliminar->exclusiv_tiempo_ra_2=$request->get('exclusiv_tiempo_ra_2');
        $proyeccion_preliminar->exclusiv_tiempo_ra_3=$request->get('exclusiv_tiempo_ra_3');
        $proyeccion_preliminar->id_tipo_transporte_rp_1 =$tipo_transporte_rp[0];
        $proyeccion_preliminar->id_tipo_transporte_rp_2 =$tipo_transporte_rp[1]??NULL;
        $proyeccion_preliminar->id_tipo_transporte_rp_3 =$tipo_transporte_rp[2]??NULL;
        $proyeccion_preliminar->id_tipo_transporte_ra_1 =$tipo_transporte_ra[0];
        $proyeccion_preliminar->id_tipo_transporte_ra_2 =$tipo_transporte_ra[1]??NULL;
        $proyeccion_preliminar->id_tipo_transporte_ra_3 =$tipo_transporte_ra[2]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_rp_1=$det_tipo_transporte_rp[0];
        $proyeccion_preliminar->det_tipo_transporte_rp_2=$det_tipo_transporte_rp[1]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_rp_3=$det_tipo_transporte_rp[2]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_ra_1=$det_tipo_transporte_ra[0];
        $proyeccion_preliminar->det_tipo_transporte_ra_2=$det_tipo_transporte_ra[1]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_ra_3=$det_tipo_transporte_ra[2]??NULL;
        $proyeccion_preliminar->capac_transporte_rp_1=$capacid_transporte_rp[0];
        $proyeccion_preliminar->capac_transporte_rp_2=$capacid_transporte_rp[1]??NULL;
        $proyeccion_preliminar->capac_transporte_rp_3=$capacid_transporte_rp[2]??NULL;
        $proyeccion_preliminar->capac_transporte_ra_1=$capacid_transporte_ra[0];
        $proyeccion_preliminar->capac_transporte_ra_2=$capacid_transporte_ra[1]??NULL;
        $proyeccion_preliminar->capac_transporte_ra_3=$capacid_transporte_ra[2]??NULL;
        $proyeccion_preliminar->grupo_1=$request->get('grupo_1');
        $proyeccion_preliminar->grupo_2=$request->get('grupo_2');
        $proyeccion_preliminar->grupo_3=$request->get('grupo_3');
        $proyeccion_preliminar->grupo_4=$request->get('grupo_4');
        // $proyeccion_preliminar->duracion_num_dias=$request->get('');
        

        $proyeccion_preliminar->save();
        return Redirect::to('proyecciones');
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
                
                $newArray_prog = array_unique($prog_aca_user, SORT_REGULAR);
        
                return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog
        
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
        
                return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog
        
                ]);
            break;

            case 3:
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
        
                return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                                "programas_academicos"=>$programa_academico,
                                                "espacios_academicos"=>$espacio_academico,
                                                "periodos_academicos"=>$periodo_academico,
                                                "semestres_asignaturas"=>$semestre_asignatura,
                                                "tipos_transportes"=>$tipo_transporte,
                                                "programas_usuario"=>$newArray_prog
        
                ]);
            break;

            case 4:
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
    
            return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                             "programas_academicos"=>$programa_academico,
                                             "espacios_academicos"=>$espacio_academico,
                                             "periodos_academicos"=>$periodo_academico,
                                             "semestres_asignaturas"=>$semestre_asignatura,
                                             "tipos_transportes"=>$tipo_transporte,
                                             "programas_usuario"=>$newArray_prog
    
            ]);
            break;

            case 5:
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
    
            return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                             "programas_academicos"=>$programa_academico,
                                             "espacios_academicos"=>$espacio_academico,
                                             "periodos_academicos"=>$periodo_academico,
                                             "semestres_asignaturas"=>$semestre_asignatura,
                                             "tipos_transportes"=>$tipo_transporte,
                                             "programas_usuario"=>$newArray_prog
    
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

        $tipo_transporte_rp = $request->get('id_tipo_transporte_rp_');
        $tipo_transporte_ra = $request->get('id_tipo_transporte_ra_');
        $det_tipo_transporte_rp = $request->get('det_tipo_transporte_rp_');
        $det_tipo_transporte_ra = $request->get('det_tipo_transporte_ra_');
        $capacid_transporte_rp = $request->get('capac_transporte_rp_');
        $capacid_transporte_ra = $request->get('capac_transporte_ra_');
        $proyeccion_preliminar = proyeccion::find($id);
        $mytime = Carbon::now('America/Bogota');
        // $proyeccion_preliminar->fecha_diligenciamiento=$mytime->toDateTimeString();
        $proyeccion_preliminar->id_docente_responsable=Auth::user()->id;
        $proyeccion_preliminar->id_programa_academico=$request->get('id_programa_academico');
        // $proyeccion_preliminar->id_espacio_academico=$request->get('id_espacio_academico');
        // $proyeccion_preliminar->id_peridodo_academico=$request->get('id_periodo_academico');
        $proyeccion_preliminar->id_semestre_asignatura=$request->get('id_semestre_asignatura');
        // $proyeccion_preliminar->destino_rp=$request->get('destino_rp');
        // $proyeccion_preliminar->ruta_principal=$request->get('ruta_principal');
        // $proyeccion_preliminar->destino_ra=$request->get('destino_ra');
        // $proyeccion_preliminar->ruta_alterna=$request->get('ruta_alterna');
        $proyeccion_preliminar->lugar_salida_rp=$request->get('lugar_salida_rp');
        $proyeccion_preliminar->lugar_salida_ra=$request->get('lugar_salida_ra');
        $proyeccion_preliminar->lugar_regreso_rp=$request->get('lugar_regreso_rp');
        $proyeccion_preliminar->lugar_regreso_ra=$request->get('lugar_regreso_ra');
        $proyeccion_preliminar->fecha_salida_aprox_rp=$request->get('fecha_salida_aprox_rp');
        $proyeccion_preliminar->fecha_salida_aprox_ra=$request->get('fecha_salida_aprox_ra');
        $proyeccion_preliminar->fecha_regreso_aprox_rp=$request->get('fecha_regreso_aprox_rp');
        $proyeccion_preliminar->fecha_regreso_aprox_ra=$request->get('fecha_regreso_aprox_ra');
        $proyeccion_preliminar->num_estudiantes_aprox=$request->get('num_estudiantes_aprox');
        $proyeccion_preliminar->num_acompaniantes=$request->get('num_acompaniantes');
        $proyeccion_preliminar->det_recorrido_interno_rp=$request->get('det_recorrido_interno_rp');
        $proyeccion_preliminar->det_recorrido_interno_ra=$request->get('det_recorrido_interno_ra');
        $proyeccion_preliminar->cant_transporte_rp=$request->get('cant_transporte_rp');
        $proyeccion_preliminar->cant_transporte_ra=$request->get('cant_transporte_ra');
        $proyeccion_preliminar->exclusiv_tiempo_rp_1=$request->get('exclusiv_tiempo_rp_1');
        $proyeccion_preliminar->exclusiv_tiempo_rp_2=$request->get('exclusiv_tiempo_rp_2');
        $proyeccion_preliminar->exclusiv_tiempo_rp_3=$request->get('exclusiv_tiempo_rp_3');
        $proyeccion_preliminar->exclusiv_tiempo_ra_1=$request->get('exclusiv_tiempo_ra_1');
        $proyeccion_preliminar->exclusiv_tiempo_ra_2=$request->get('exclusiv_tiempo_ra_2');
        $proyeccion_preliminar->exclusiv_tiempo_ra_3=$request->get('exclusiv_tiempo_ra_3');
        $proyeccion_preliminar->id_tipo_transporte_rp_1 =$tipo_transporte_rp[0];
        $proyeccion_preliminar->id_tipo_transporte_rp_2 =$tipo_transporte_rp[1]??NULL;
        $proyeccion_preliminar->id_tipo_transporte_rp_3 =$tipo_transporte_rp[2]??NULL;
        $proyeccion_preliminar->id_tipo_transporte_ra_1 =$tipo_transporte_ra[0];
        $proyeccion_preliminar->id_tipo_transporte_ra_2 =$tipo_transporte_ra[1]??NULL;
        $proyeccion_preliminar->id_tipo_transporte_ra_3 =$tipo_transporte_ra[2]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_rp_1=$det_tipo_transporte_rp[0];
        $proyeccion_preliminar->det_tipo_transporte_rp_2=$det_tipo_transporte_rp[1]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_rp_3=$det_tipo_transporte_rp[2]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_ra_1=$det_tipo_transporte_ra[0];
        $proyeccion_preliminar->det_tipo_transporte_ra_2=$det_tipo_transporte_ra[1]??NULL;
        $proyeccion_preliminar->det_tipo_transporte_ra_3=$det_tipo_transporte_ra[2]??NULL;
        $proyeccion_preliminar->capac_transporte_rp_1=$capacid_transporte_rp[0];
        $proyeccion_preliminar->capac_transporte_rp_2=$capacid_transporte_rp[1]??NULL;
        $proyeccion_preliminar->capac_transporte_rp_3=$capacid_transporte_rp[2]??NULL;
        $proyeccion_preliminar->capac_transporte_ra_1=$capacid_transporte_ra[0];
        $proyeccion_preliminar->capac_transporte_ra_2=$capacid_transporte_ra[1]??NULL;
        $proyeccion_preliminar->capac_transporte_ra_3=$capacid_transporte_ra[2]??NULL;
        $proyeccion_preliminar->grupo_1=$request->get('grupo_1');
        $proyeccion_preliminar->grupo_2=$request->get('grupo_2');
        $proyeccion_preliminar->grupo_3=$request->get('grupo_3');
        $proyeccion_preliminar->grupo_4=$request->get('grupo_4');
        // $proyeccion_preliminar->duracion_num_dias=$request->get('');
        $proyeccion_preliminar->observ_coordinador= $request->get('observ_coordinador');
        $proyeccion_preliminar->aprobacion_coordinador= $request->get('aprobacion_coordinador');

        // $proyeccion_preliminar->observ_decano= $request->get('observ_coordinador');
        // $proyeccion_preliminar->aprobacion_decano= $request->get('observ_decano');
        

        $proyeccion_preliminar->update();
        return Redirect::to('proyecciones');
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
