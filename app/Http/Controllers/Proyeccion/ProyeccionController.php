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
use DateTime;
use Illuminate\Auth\Access\Response;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Null_;
use PractiCampoUD\espacio_academico;
use PractiCampoUD\programa_academico;

use function Complex\add;

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
                // ->orWhere('aprobacion_decano','=',5)
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
                $idProgAca_asociado = Auth::user()->id_programa_academico_coord;
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
                ->where('aprobacion_coordinador','=',5)
                ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                ->where('confirm_creador','=',0)
                
                // ->orWhere('aprobacion_coordinador','=',3)
                // ->orWhere('aprobacion_decano','=',5)
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
                ->where('aprobacion_coordinador','=',5)
                ->where('confirm_creador','=',0)
                ->where('id_docente_responsable','=',$idUser)
                ->orWhere('id_programa_academico','=',$usuario->id_programa_academico_coord)
                ->paginate(10);
                
                return view('proyecciones.index',["proyecciones"=>$proyeccion]);
            break;
        }
        
    }

    public function filterProyeccion($filter)
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
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->paginate(10);
                        
                        return view('proyecciones.index',["proyecciones"=>$proyeccion]);
                    break;
                }
            break;

            case 2:
                switch($filter)
                {
                    case 'aprob-cons':
                        $espacios = DB::table('espacio_academico as esp_aca')
                        ->where('electiva','=',1)->get();
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','p_prel.id_docente_responsable',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord','es_consj.abrev as es_consj','users.id_estado',
                                'p_prel.costo_total_transporte_menor_rp','p_prel.costo_total_transporte_menor_ra', 'p_prel.viaticos_estudiantes_rp', 'p_prel.viaticos_estudiantes_ra', 'p_prel.viaticos_docente_rp', 'p_prel.viaticos_docente_ra', 
                                'p_prel.total_presupuesto_rp','p_prel.total_presupuesto_ra','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->where('aprobacion_consejo_facultad','=',3)
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
                                    'p_prel.costo_total_transporte_menor_rp','p_prel.costo_total_transporte_menor_ra', 'p_prel.viaticos_estudiantes_rp', 'p_prel.viaticos_estudiantes_ra', 'p_prel.viaticos_docente_rp', 'p_prel.viaticos_docente_ra', 
                                    'p_prel.total_presupuesto_rp','p_prel.total_presupuesto_ra','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                    'users.id_estado')
                                    // DB::raw('CONCAT(users.primer_nombre, " ", users.segundo_nombre, " ", users.primer_apellido, " ", users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            // ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            // ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            // ->where('confirm_creador','=',1)
                            // ->where('confirm_coord','=',0)
                            // ->where('e_aca.electiva','=',0)
                            // // ->where('id_docente_responsable','=',$idUser)
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
                                    'es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord','users.id_estado','es_consj.abrev as es_consj',
                                    'p_prel.costo_total_transporte_menor_rp','p_prel.costo_total_transporte_menor_ra', 'p_prel.viaticos_estudiantes_rp', 'p_prel.viaticos_estudiantes_ra', 'p_prel.viaticos_docente_rp', 'p_prel.viaticos_docente_ra', 
                                    'p_prel.total_presupuesto_rp','p_prel.total_presupuesto_ra','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                    DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            ->where('confirm_creador','=',1)
                            ->where('confirm_coord','=',1)
                            ->where('confirm_electiva_coord','=',1)
                            ->where('e_aca.electiva','=',1)
                            // ->where('id_docente_responsable','=',$idUser)
                            ->where('aprobacion_coordinador','=',3)
                            ->paginate(10);

                        //     if(count($proyecciones_extra) >= 1)
                        //     {
                        //         $proyeccion += $proyecciones_extra;
                        //     }
                        // }
                        break;

                    case 'pend':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado','es_consj.abrev as es_consj',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec', 'p_prel.costo_total_transporte_menor_rp','p_prel.costo_total_transporte_menor_ra', 'p_prel.viaticos_estudiantes_rp', 'p_prel.viaticos_estudiantes_ra', 'p_prel.viaticos_docente_rp', 'p_prel.viaticos_docente_ra', 
                                'p_prel.total_presupuesto_rp','p_prel.total_presupuesto_ra','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.aprobacion_decano','=',5)
                        ->where('p_prel.confirm_asistD','=',1)
                        // ->orWhere('aprobacion_decano','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                        break;

                        case 'aprob':
                            $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                            ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado','es_consj.abrev as es_consj',
                                    'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                    'es_dec.abrev  as ab_dec', 'p_prel.costo_total_transporte_menor_rp','p_prel.costo_total_transporte_menor_ra', 'p_prel.viaticos_estudiantes_rp', 'p_prel.viaticos_estudiantes_ra', 'p_prel.viaticos_docente_rp', 'p_prel.viaticos_docente_ra', 
                                    'p_prel.total_presupuesto_rp','p_prel.total_presupuesto_ra','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                    DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            // ->where('p_prel.aprobacion_coordinador','=',3)
                            ->where('p_prel.aprobacion_asistD','=',3)
                            ->where('p_prel.aprobacion_decano','=',3)
                            ->where('p_prel.confirm_asistD','=',1)
                            // ->orWhere('aprobacion_decano','=',3)
                            // ->orWhere('aprobacion_decano','=',5)
                            ->paginate(10);
                            break;
                    
                    case 'all':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico','users.id_estado',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor','es_dec.abrev  as ab_dec',
                                'p_prel.costo_total_transporte_menor_rp','p_prel.costo_total_transporte_menor_ra', 'p_prel.viaticos_estudiantes_rp', 'p_prel.viaticos_estudiantes_ra', 'p_prel.viaticos_docente_rp', 'p_prel.viaticos_docente_ra', 
                                'p_prel.total_presupuesto_rp','p_prel.total_presupuesto_ra','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                'es_consj.abrev  as es_consj',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('estado as es_consj','p_prel.aprobacion_consejo_facultad','=','es_consj.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.confirm_asistD','=',1)
                        // ->orWhere('aprobacion_decano','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                        
                    break;
                }
            break;

            case 3:
                switch($filter)
                {
                    case 'no-aprob-cons':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord', 'p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra'
                                ,'p_prel.aprobacion_coordinador',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.confirm_coord','=',1)
                        ->where('p_prel.confirm_asistD','=',1)
                        ->where('p_prel.aprobacion_decano','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.aprobacion_consejo_facultad','=',5)
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
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.confirm_asistD','=',1)
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;

                    case 'not_send':
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord', 'p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra'
                                ,'p_prel.aprobacion_coordinador',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',3)
                        ->where('p_prel.confirm_coord','=',1)
                        ->where('p_prel.confirm_asistD','=',0)
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
                        ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord', 'p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->join('users','p_prel.id_docente_responsable','=','users.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('p_prel.aprobacion_coordinador','=',3)
                        ->where('p_prel.aprobacion_asistD','=',5)
                        ->where('p_prel.confirm_coord','=',1)
                        ->where('p_prel.confirm_asistD','=',0)
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
                                'es_dec.abrev  as ab_dec','es_consj.abrev  as es_consj','p_prel.confirm_coord',
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
                        
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;
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
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('aprobacion_coordinador','=',3)
                        ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',1)
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
                                'es_dec.abrev  as ab_dec','e_aca.electiva','p_prel.confirm_coord')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        ->where('aprobacion_coordinador','=',3)
                        // ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',0)
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
                            ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                    'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                    'es_dec.abrev  as ab_dec','e_aca.extramural','p_prel.confirm_coord')
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            ->where('confirm_creador','=',1)
                            ->where('confirm_coord','=',0)
                            ->where('e_aca.electiva','=',1)
                            // ->where('id_docente_responsable','=',$idUser)
                            ->where('aprobacion_coordinador','=',5)
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
                            ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                    'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                    'es_dec.abrev  as ab_dec', 'p_prel.costo_total_transporte_menor_rp','p_prel.costo_total_transporte_menor_ra', 'p_prel.viaticos_estudiantes_rp', 'p_prel.viaticos_estudiantes_ra', 'p_prel.viaticos_docente_rp', 'p_prel.viaticos_docente_ra', 
                                    'p_prel.total_presupuesto_rp','p_prel.total_presupuesto_ra','p_prel.valor_estimado_transporte_rp','p_prel.valor_estimado_transporte_ra',
                                    DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            ->join('users','p_prel.id_docente_responsable','=','users.id')
                            ->where('p_prel.aprobacion_coordinador','=',5)
                            // ->where('p_prel.aprobacion_asistD','=',3)
                            // ->where('p_prel.aprobacion_decano','=',5)
                            ->where('confirm_creador','=',1)
                            ->where('confirm_coord','=',0)
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
                            ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico',
                                    'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                    'es_dec.abrev  as ab_dec','e_aca.extramural','p_prel.confirm_coord',
                                    DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                            ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                            // ->where('id_docente_responsable','=',$idUser)
                            ->where('aprobacion_coordinador','=',5)
                            // ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                            ->where('confirm_creador','=',1)
                            ->where('confirm_coord','=',0)
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
                                'es_dec.abrev  as ab_dec','p_prel.confirm_coord')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        // ->where('id_docente_responsable','=',$idUser)
                        // ->where('aprobacion_coordinador','=',5)
                        // ->where('e_aca.id_programa_academico','=',$idProgAca_asociado)
                        ->where('confirm_creador','=',1)
                        ->where(function($query) use ($idUser, $id_prog_coord){
                            $query->where('id_docente_responsable','=',$idUser)
                            ->orWhere('p_prel.id_programa_academico','=',$id_prog_coord);
                        })
                        // ->orWhere('aprobacion_coordinador','=',3)
                        // ->orWhere('aprobacion_decano','=',5)
                        ->paginate(10);
                    break;
                }
            break;

            case 5:
                switch($filter)
                {
                    case 'send':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_creador', 'p_prel.confirm_coord')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        // ->where('aprobacion_coordinador','=',5)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',1)
                        ->where('id_docente_responsable','=',$idUser)
                        ->paginate(10);
                        break;
                    case 'not_send':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_creador')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        // ->where('aprobacion_coordinador','=',5)
                        ->where('confirm_creador','=',1)
                        ->where('confirm_coord','=',0)
                        ->where('id_docente_responsable','=',$idUser)
                        ->paginate(10);
                        break;
                    case 'all':
                        $usuario=DB::table('users')->where('id','=',$idUser)->first();
                        $id_prog_coord = $usuario->id_programa_academico_coord;
                        $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp','es_coor.abrev as ab_coor',
                                'es_dec.abrev  as ab_dec','p_prel.confirm_creador')
                        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                        ->join('estado as es_coor','p_prel.aprobacion_coordinador','=','es_coor.id')
                        ->join('estado as es_dec','p_prel.aprobacion_decano','=','es_dec.id')
                        ->where('id_docente_responsable','=',$idUser)
                        // ->where('aprobacion_coordinador','=',5)
                        // ->where('confirm_creador','=',0)
                        
                        ->paginate(10);
                        break;
                    default;
                }
            break;
        }
        
        return view('proyecciones.index',["proyecciones"=>$proyeccion, 'filter'=>$filter]);
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

        return view('proyecciones.create', [
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idRole = Auth::user()->id_role;
        $idUser = Auth::user()->id;
        $tipo_transporte_rp = $request->get('id_tipo_transporte_rp_');
        $tipo_transporte_ra = $request->get('id_tipo_transporte_ra_');
        $det_tipo_transporte_rp = $request->get('det_tipo_transporte_rp_');
        $det_tipo_transporte_ra = $request->get('det_tipo_transporte_ra_');
        $capacid_transporte_rp = $request->get('capac_transporte_rp_');
        $capacid_transporte_ra = $request->get('capac_transporte_ra_');
        $docen_respo_trasnporte_rp = $request->get('docente_resp_transp_rp_');
        $docen_respo_trasnporte_ra = $request->get('docente_resp_transp_ra_');
        $id_esp_aca = $request->get('id_espacio_academico');
        $id_prog_aca = $request->get('id_programa_academico');

        $esp_aca = DB::table('espacio_academico')
        // ->where('id_programa_academico','=',$id_prog_aca)
        ->where('id','=',$id_esp_aca)->first();

        $proyeccion_preliminar = new proyeccion;
        $mytime = Carbon::now('America/Bogota');
        $proyeccion_preliminar->id_estado = 1;
        $proyeccion_preliminar->fecha_diligenciamiento=$mytime->toDateTimeString();
        $proyeccion_preliminar->id_docente_responsable=Auth::user()->id;
        $proyeccion_preliminar->id_programa_academico=$request->get('id_programa_academico');
        
        $proyeccion_preliminar->id_espacio_academico=(!empty($esp_aca->id))?$esp_aca->id:Auth::user()->id_espacio_academico_1;
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
        $proyeccion_preliminar->num_acompaniantes=$request->get('num_acompaniantes');
        $proyeccion_preliminar->num_apoyo=$request->get('num_apoyo');
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
        $proyeccion_preliminar->docen_respo_trasnporte_rp_1=$docen_respo_trasnporte_rp[0]??NULL;
        $proyeccion_preliminar->docen_respo_trasnporte_rp_2=$docen_respo_trasnporte_rp[1]??NULL;
        $proyeccion_preliminar->docen_respo_trasnporte_rp_3=$docen_respo_trasnporte_rp[2]??NULL;
        $proyeccion_preliminar->docen_respo_trasnporte_ra_1=$docen_respo_trasnporte_ra[0]??NULL;
        $proyeccion_preliminar->docen_respo_trasnporte_ra_2=$docen_respo_trasnporte_ra[1]??NULL;
        $proyeccion_preliminar->docen_respo_trasnporte_ra_3=$docen_respo_trasnporte_ra[2]??NULL;

        $proyeccion_preliminar->otro_tipo_transporte_rp_1=$request->get('otro_transporte_rp_1');
        $proyeccion_preliminar->otro_tipo_transporte_rp_2=$request->get('otro_transporte_rp_2');
        $proyeccion_preliminar->otro_tipo_transporte_rp_3=$request->get('otro_transporte_rp_3');
        $proyeccion_preliminar->otro_tipo_transporte_ra_1=$request->get('otro_transporte_ra_1');
        $proyeccion_preliminar->otro_tipo_transporte_ra_2=$request->get('otro_transporte_ra_2');
        $proyeccion_preliminar->otro_tipo_transporte_ra_3=$request->get('otro_transporte_ra_3');


        $vlr_otro_tipo_transporte_rp_1=$request->get('vlr_otro_transporte_rp_1')!=Null?intval(str_replace(".","",$request->get('vlr_otro_transporte_rp_1'))):0;
        $vlr_otro_tipo_transporte_rp_2=$request->get('vlr_otro_transporte_rp_2')!=Null?intval(str_replace(".","",$request->get('vlr_otro_transporte_rp_2'))):0;
        $vlr_otro_tipo_transporte_rp_3=$request->get('vlr_otro_transporte_rp_3')!=Null?intval(str_replace(".","",$request->get('vlr_otro_transporte_rp_3'))):0;
        $vlr_otro_tipo_transporte_ra_1=$request->get('vlr_otro_transporte_ra_1')!=Null?intval(str_replace(".","",$request->get('vlr_otro_transporte_ra_1'))):0;
        $vlr_otro_tipo_transporte_ra_2=$request->get('vlr_otro_transporte_ra_2')!=Null?intval(str_replace(".","",$request->get('vlr_otro_transporte_ra_2'))):0;
        $vlr_otro_tipo_transporte_ra_3=$request->get('vlr_otro_transporte_ra_3')!=Null?intval(str_replace(".","",$request->get('vlr_otro_transporte_ra_3'))):0;

        $proyeccion_preliminar->vlr_otro_tipo_transporte_rp_1=$vlr_otro_tipo_transporte_rp_1;
        $proyeccion_preliminar->vlr_otro_tipo_transporte_rp_2=$vlr_otro_tipo_transporte_rp_2;
        $proyeccion_preliminar->vlr_otro_tipo_transporte_rp_3=$vlr_otro_tipo_transporte_rp_3;
        $proyeccion_preliminar->vlr_otro_tipo_transporte_ra_1=$vlr_otro_tipo_transporte_ra_1;
        $proyeccion_preliminar->vlr_otro_tipo_transporte_ra_2=$vlr_otro_tipo_transporte_ra_2;
        $proyeccion_preliminar->vlr_otro_tipo_transporte_ra_3=$vlr_otro_tipo_transporte_ra_3;

        $costo_total_transporte_menor_rp = $vlr_otro_tipo_transporte_rp_1 + $vlr_otro_tipo_transporte_rp_2 + $vlr_otro_tipo_transporte_rp_3;
        $costo_total_transporte_menor_ra = $vlr_otro_tipo_transporte_ra_1 + $vlr_otro_tipo_transporte_ra_2 + $vlr_otro_tipo_transporte_ra_3;

        $proyeccion_preliminar->costo_total_transporte_menor_rp =$costo_total_transporte_menor_rp;
        $proyeccion_preliminar->costo_total_transporte_menor_ra =$costo_total_transporte_menor_ra;

        $proyeccion_preliminar->det_materiales_rp=$request->get('det_materiales_rp');
        $proyeccion_preliminar->vlr_materiales_rp=intval(str_replace(".","",$request->get('vlr_materiales_rp')));
        $proyeccion_preliminar->det_materiales_ra=$request->get('det_materiales_ra');
        $proyeccion_preliminar->vlr_materiales_ra=intval(str_replace(".","",$request->get('vlr_materiales_ra')));
        
        $proyeccion_preliminar->areas_acuaticas_rp=$request->get('areas_acuaticas_rp')=='on'?1:0;
        $proyeccion_preliminar->areas_acuaticas_ra=$request->get('areas_acuaticas_ra')=='on'?1:0;
        $proyeccion_preliminar->alturas_rp=$request->get('alturas_rp')=='on'?1:0;
        $proyeccion_preliminar->alturas_ra=$request->get('alturas_ra')=='on'?1:0;
        $proyeccion_preliminar->riesgo_biologico_rp=$request->get('riesgo_biologico_rp')=='on'?1:0;
        $proyeccion_preliminar->riesgo_biologico_ra=$request->get('riesgo_biologico_ra')=='on'?1:0;
        $proyeccion_preliminar->espacios_confinados_rp=$request->get('espacios_confinados_rp')=='on'?1:0;
        $proyeccion_preliminar->espacios_confinados_ra=$request->get('espacios_confinados_ra')=='on'?1:0;

        $proyeccion_preliminar->cantidad_grupos=$request->get('cant_grupos');
        $proyeccion_preliminar->grupo_1=$request->get('grupo_1');
        $proyeccion_preliminar->grupo_2=$request->get('grupo_2');
        $proyeccion_preliminar->grupo_3=$request->get('grupo_3');
        $proyeccion_preliminar->grupo_4=$request->get('grupo_4');

        $fecha_salida_rp = new DateTime($proyeccion_preliminar->fecha_salida_aprox_rp);
        $fecha_regreso_rp = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_rp);
        $num_dias_rp = $fecha_salida_rp->diff($fecha_regreso_rp);
        $proyeccion_preliminar->duracion_num_dias_rp=$num_dias_rp->days+1;
        $fecha_salida_ra = new DateTime($proyeccion_preliminar->fecha_salida_aprox_ra);
        $fecha_regreso_ra = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_ra);
        $num_dias_ra = $fecha_salida_ra->diff($fecha_regreso_ra);
        $proyeccion_preliminar->duracion_num_dias_ra=$num_dias_ra->days+1;

        $viaticos_estudiantes_rp = intval(str_replace(".","",$request->get('vlr_apoyo_estudiantes_rp')));
        $viaticos_docente_rp =intval(str_replace(".","",$request->get('vlr_apoyo_docentes_rp')));

        $viaticos_estudiantes_ra = intval(str_replace(".","",$request->get('vlr_apoyo_estudiantes_ra')));
        $viaticos_docente_ra =intval(str_replace(".","",$request->get('vlr_apoyo_docentes_ra')));

        // $total_viaticos_estu = $viaticos_estudiantes_rp + $viaticos_estudiantes_ra;
        // $total_viaticos_docen= $viaticos_docente_rp + $viaticos_docente_ra;

        $proyeccion_preliminar->viaticos_estudiantes_rp=$viaticos_estudiantes_rp;
        $proyeccion_preliminar->viaticos_docente_rp=$viaticos_docente_rp;

        $proyeccion_preliminar->viaticos_estudiantes_ra=$viaticos_estudiantes_ra;
        $proyeccion_preliminar->viaticos_docente_ra=$viaticos_docente_ra;


        $proyeccion_preliminar->observ_coordinador= $request->get('observ_coordinador');
        $proyeccion_preliminar->aprobacion_coordinador= 5;

        $proyeccion_preliminar->aprobacion_asistD= 5;

        // $proyeccion_preliminar->observ_decano= $request->get('observ_decano');
        $proyeccion_preliminar->aprobacion_decano= 5;
        $proyeccion_preliminar->aprobacion_consejo_facultad= 5;

        if($idRole == 5 || $idRole == 1)
        {
            $proyeccion_preliminar->confirm_creador= 1;
            $proyeccion_preliminar->confirm_coord= 0;
            $proyeccion_preliminar->confirm_asistD= 0;
        }
        else
        {
            $proyeccion_preliminar->confirm_creador= 0;
            $proyeccion_preliminar->confirm_coord= 0;
            $proyeccion_preliminar->confirm_asistD= 0;
        }

        $proyeccion_preliminar->save();
        $filter = "all";
        
        return redirect('proyecciones/filtrar/all');
        // return route('proyeccion_filter',['filter'=>$filter]);
        // return Redirect::to('proyecciones');
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
                                                "nombre_usuario"=>$nomb_usuario
        
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
                // ->join('roles','users.id_role','=','roles.id')
                ->where('users.id_estado','=',1)
                ->where('users.id_role','=',5)->get();
        
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
                                                "nombre_usuario"=>$nomb_usuario
        
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
            
            $newArray_prog = array_unique($prog_aca_user, SORT_REGULAR);
            $nomb_usuario = $usuario_log->primer_nombre.' '.$usuario_log->segundo_nombre.' '.$usuario_log->primer_apellido.' '.$usuario_log->segundo_apellido;
    
            return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                             "programas_academicos"=>$programa_academico,
                                             "espacios_academicos"=>$espacio_academico,
                                             "periodos_academicos"=>$periodo_academico,
                                             "semestres_asignaturas"=>$semestre_asignatura,
                                             "tipos_transportes"=>$tipo_transporte,
                                             "programas_usuario"=>$newArray_prog,
                                             "usuario_log"=>$usuario_log,
                                             "nombre_usuario"=>$nomb_usuario
    
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
            $nomb_usuario = $usuario->primer_nombre.' '.$usuario->segundo_nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido;
    
            return view('proyecciones.edit',["proyeccion_preliminar"=>$proyeccion_preliminar,
                                             "programas_academicos"=>$programa_academico,
                                             "espacios_academicos"=>$espacio_academico,
                                             "periodos_academicos"=>$periodo_academico,
                                             "semestres_asignaturas"=>$semestre_asignatura,
                                             "tipos_transportes"=>$tipo_transporte,
                                             "programas_usuario"=>$newArray_prog,
                                             "nombre_usuario"=>$nomb_usuario
    
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
        if(Auth::user()->id_role == 4)
        {
            if(Auth::user()->id != $proyeccion_preliminar->id_docente_responsable)
            {
                $proyeccion_preliminar->observ_coordinador= $request->get('observ_coordinador');
                $proyeccion_preliminar->aprobacion_coordinador= (!empty($request->get('aprobacion_coordinador')))?
                $request->get('aprobacion_coordinador'):$proyeccion_preliminar->aprobacion_coordinador;

                $proyeccion_preliminar->id_coordinador_aprob = Auth::user()->id;
            }
            elseif(Auth::user()->id == $proyeccion_preliminar->id_docente_responsable)
            {
                $proyeccion_preliminar->grupo_1=$request->get('grupo_1');
                $proyeccion_preliminar->grupo_2=$request->get('grupo_2');
                $proyeccion_preliminar->grupo_3=$request->get('grupo_3');
                $proyeccion_preliminar->grupo_4=$request->get('grupo_4');

                $proyeccion_preliminar->fecha_salida_aprox_rp= $request->get('fecha_salida_aprox_rp');
                $proyeccion_preliminar->fecha_regreso_aprox_rp= $request->get('fecha_regreso_aprox_rp');
                $proyeccion_preliminar->fecha_salida_aprox_ra= $request->get('fecha_salida_aprox_ra');
                $proyeccion_preliminar->fecha_regreso_aprox_ra= $request->get('fecha_regreso_aprox_ra');

                $fecha_salida_rp = new DateTime($proyeccion_preliminar->fecha_salida_aprox_rp);
                $fecha_regreso_rp = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_rp);
                $num_dias_rp = $fecha_salida_rp->diff($fecha_regreso_rp);
                $proyeccion_preliminar->duracion_num_dias_rp=$num_dias_rp->days+1;

                $fecha_salida_ra = new DateTime($proyeccion_preliminar->fecha_salida_aprox_ra);
                $fecha_regreso_ra = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_ra);
                $num_dias_ra = $fecha_salida_ra->diff($fecha_regreso_ra);
                $proyeccion_preliminar->duracion_num_dias_ra=$num_dias_ra->days+1;

                $proyeccion_preliminar->num_estudiantes_aprox=$request->get('num_estudiantes_aprox');
                $proyeccion_preliminar->num_acompaniantes=$request->get('num_acompaniantes');
                $proyeccion_preliminar->det_recorrido_interno_rp=$request->get('det_recorrido_interno_rp');
                $proyeccion_preliminar->det_recorrido_interno_ra=$request->get('det_recorrido_interno_ra');

                $proyeccion_preliminar->destino_rp=$request->get('destino_rp');
                $proyeccion_preliminar->ruta_principal=$request->get('ruta_principal');
                $proyeccion_preliminar->destino_ra=$request->get('destino_ra');
                $proyeccion_preliminar->ruta_alterna=$request->get('ruta_alterna');
                $proyeccion_preliminar->lugar_salida_rp=$request->get('lugar_salida_rp');
                $proyeccion_preliminar->lugar_salida_ra=$request->get('lugar_salida_ra');
                $proyeccion_preliminar->lugar_regreso_rp=$request->get('lugar_regreso_rp');
                $proyeccion_preliminar->lugar_regreso_ra=$request->get('lugar_regreso_ra');

                $tipo_transporte_rp = $request->get('id_tipo_transporte_rp_');
                $tipo_transporte_ra = $request->get('id_tipo_transporte_ra_');
                $det_tipo_transporte_rp = $request->get('det_tipo_transporte_rp_');
                $det_tipo_transporte_ra = $request->get('det_tipo_transporte_ra_');
                $capacid_transporte_rp = $request->get('capac_transporte_rp_');
                $capacid_transporte_ra = $request->get('capac_transporte_ra_');

                $cod_esp_aca = (!empty($request->get('id_espacio_academico')))?
                $request->get('id_espacio_academico'):$proyeccion_preliminar->id_espacio_academico;

                $id_prog_aca = ($request->get('id_programa_academico'))?
                $request->get('id_programa_academico'):$proyeccion_preliminar->id_espacio_academico;

                $esp_aca = DB::table('espacio_academico')
                ->where('id_programa_academico','=',$id_prog_aca)
                ->where('codigo_espacio_academico','=',$cod_esp_aca)->first();
                $proyeccion_preliminar->id_espacio_academico=(!empty($esp_aca)||null)?
                $esp_aca->id:$proyeccion_preliminar->id_espacio_academico;

                $proyeccion_preliminar->id_peridodo_academico=$request->get('id_periodo_academico');
                $proyeccion_preliminar->id_semestre_asignatura=$request->get('id_semestre_asignatura');

                $proyeccion_preliminar->id_tipo_transporte_rp_1 =(!empty($tipo_transporte_rp[0]))?
                $tipo_transporte_rp[0]:$proyeccion_preliminar->id_tipo_transporte_rp_1;
                $proyeccion_preliminar->id_tipo_transporte_rp_2 =(!empty($tipo_transporte_rp[1]))?
                $tipo_transporte_rp[1]:$proyeccion_preliminar->id_tipo_transporte_rp_2;
                $proyeccion_preliminar->id_tipo_transporte_rp_3 =(!empty($tipo_transporte_rp[2]))?
                $tipo_transporte_rp[2]:$proyeccion_preliminar->id_tipo_transporte_rp_3;
                $proyeccion_preliminar->id_tipo_transporte_ra_1 =(!empty($tipo_transporte_ra[0]))?
                $tipo_transporte_ra[0]:$proyeccion_preliminar->id_tipo_transporte_ra_1;
                $proyeccion_preliminar->id_tipo_transporte_ra_2 =(!empty($tipo_transporte_ra[1]))?
                $tipo_transporte_ra[1]:$proyeccion_preliminar->id_tipo_transporte_ra_2;
                $proyeccion_preliminar->id_tipo_transporte_ra_3 =(!empty($tipo_transporte_ra[2]))?
                $tipo_transporte_ra[2]:$proyeccion_preliminar->id_tipo_transporte_ra_3;

                $proyeccion_preliminar->cant_transporte_rp=$request->get('cant_transporte_rp');
                $proyeccion_preliminar->cant_transporte_ra=$request->get('cant_transporte_ra');

                $proyeccion_preliminar->aprobacion_coordinador= (!empty($request->get('aprobacion_coordinador')))?
                $request->get('aprobacion_coordinador'):$proyeccion_preliminar->aprobacion_coordinador;

                $proyeccion_preliminar->id_coordinador_aprob = Auth::user()->id;
            }

            $proyeccion_preliminar->conf_curricul_plan_pract_rp=$request->get('conf_curricul_plan_pract_rp')=='on'?1:0;
            $proyeccion_preliminar->conf_curricul_plan_pract_ra=$request->get('conf_curricul_plan_pract_ra')=='on'?1:0;
        }

        if(Auth::user()->id_role == 2 )
        {
            // $proyeccion_preliminar->observ_coordinador= $request->get('observ_coordinador');
            // $proyeccion_preliminar->aprobacion_coordinador= $request->get('aprobacion_coordinador');
            $proyeccion_preliminar->observ_decano= $request->get('observ_decano');
            $proyeccion_preliminar->aprobacion_decano= $request->get('aprobacion_decano')!=null?$request->get('aprobacion_decano'):$proyeccion_preliminar->aprobacion_decano;

            $proyeccion_preliminar->id_decano_aprob = Auth::user()->id;

            if($proyeccion_preliminar->aprobacion_consejo_facultad == 3)
            {
                $proyeccion_preliminar->id_docente_responsable= $request->get('docentes_activos');
                $proyeccion_preliminar->id_estado= $request->get('estado_proyeccion');
            }
            $proyeccion_preliminar->update();
            return redirect('proyecciones/filtrar/pend');
        }

        if(Auth::user()->id_role == 3 )
        {
            if(($request->get('vlr_est_transp_rp') > 0) && ($request->get('vlr_est_transp_ra') > 0) && ($request->get('vlr_est_transp_rp') != null) && ($request->get('vlr_est_transp_ra') != null))
            {

                $valor_estimado_transporte_rp = $request->get('vlr_est_transp_rp')!=Null?intval(str_replace(".","",$request->get('vlr_est_transp_rp'))):0;
                $valor_estimado_transporte_ra = $request->get('vlr_est_transp_ra')!=Null?intval(str_replace(".","",$request->get('vlr_est_transp_ra'))):0;

                $costo_total_transporte_menor_rp = $proyeccion_preliminar->costo_total_transporte_menor_rp;
                $costo_total_transporte_menor_ra = $proyeccion_preliminar->costo_total_transporte_menor_ra;

                $viaticos_estudiantes_rp = $proyeccion_preliminar->viaticos_estudiantes_rp;
                $viaticos_estudiantes_ra = $proyeccion_preliminar->viaticos_estudiantes_ra;
                $viaticos_docente_rp = $proyeccion_preliminar->viaticos_docente_rp;
                $viaticos_docente_ra = $proyeccion_preliminar->viaticos_docente_ra;

                $total_presupuesto_rp= $costo_total_transporte_menor_rp + $valor_estimado_transporte_rp + $viaticos_docente_rp + $viaticos_estudiantes_rp;
                $total_presupuesto_ra= $costo_total_transporte_menor_ra + $valor_estimado_transporte_ra + $viaticos_docente_ra + $viaticos_estudiantes_ra;
                
                $proyeccion_preliminar->valor_estimado_transporte_rp = $valor_estimado_transporte_rp;
                $proyeccion_preliminar->valor_estimado_transporte_ra = $valor_estimado_transporte_ra;
                
                $proyeccion_preliminar->total_presupuesto_rp = $total_presupuesto_rp;
                $proyeccion_preliminar->total_presupuesto_ra = $total_presupuesto_ra;
                
                $vlr_otro_tip_trans_rp_1 = ($proyeccion_preliminar->vlr_otro_tipo_transporte_rp_1)!=null || !empty($proyeccion_preliminar->vlr_otro_tipo_transporte_rp_1)?$proyeccion_preliminar->vlr_otro_tipo_transporte_rp_1:0;
                $vlr_otro_tip_trans_rp_2 = ($proyeccion_preliminar->vlr_otro_tipo_transporte_rp_2)!=null || !empty($proyeccion_preliminar->vlr_otro_tipo_transporte_rp_2)?$proyeccion_preliminar->vlr_otro_tipo_transporte_rp_2:0;
                $vlr_otro_tip_trans_rp_3 = ($proyeccion_preliminar->vlr_otro_tipo_transporte_rp_3)!=null || !empty($proyeccion_preliminar->vlr_otro_tipo_transporte_rp_3)?$proyeccion_preliminar->vlr_otro_tipo_transporte_rp_3:0;
                $vlr_otro_tip_trans_ra_1 = ($proyeccion_preliminar->vlr_otro_tipo_transporte_ra_1)!=null || !empty($proyeccion_preliminar->vlr_otro_tipo_transporte_ra_1)?$proyeccion_preliminar->vlr_otro_tipo_transporte_ra_1:0;
                $vlr_otro_tip_trans_ra_2 = ($proyeccion_preliminar->vlr_otro_tipo_transporte_ra_2)!=null || !empty($proyeccion_preliminar->vlr_otro_tipo_transporte_ra_2)?$proyeccion_preliminar->vlr_otro_tipo_transporte_ra_2:0;
                $vlr_otro_tip_trans_ra_3 = ($proyeccion_preliminar->vlr_otro_tipo_transporte_ra_3)!=null || !empty($proyeccion_preliminar->vlr_otro_tipo_transporte_ra_3)?$proyeccion_preliminar->vlr_otro_tipo_transporte_ra_3:0;
                
                
                $proyeccion_preliminar->aprobacion_asistD = 3;
                $proyeccion_preliminar->id_asistD_aprob = Auth::user()->id;
                
            }

            if($proyeccion_preliminar->aprobacion_decano == 3)
            {
                $aprobacion_consejo_facultad = $request->get('aprobacion_consejo_facultad');
                $proyeccion_preliminar->aprobacion_consejo_facultad = $aprobacion_consejo_facultad;
                $proyeccion_preliminar->id_asistD_aprob_consejo = Auth::user()->id;
            }
        }

        if(Auth::user()->id_role == 1 ||  Auth::user()->id_role == 5)
        {
            
            $cod_esp_aca = $request->get('id_espacio_academico');
            $id_prog_aca = $request->get('id_programa_academico');
            $esp_aca = DB::table('espacio_academico')
            ->where('id_programa_academico','=',$id_prog_aca)
            ->where('codigo_espacio_academico','=',$cod_esp_aca)->first();
            $proyeccion_preliminar->id_espacio_academico=(!empty($esp_aca)||null)?
            $esp_aca->id:$proyeccion_preliminar->id_espacio_academico;

            $proyeccion_preliminar->id_peridodo_academico=$request->get('id_periodo_academico');
            $proyeccion_preliminar->id_semestre_asignatura=$request->get('id_semestre_asignatura');

            $proyeccion_preliminar->num_estudiantes_aprox=$request->get('num_estudiantes_aprox');
            $proyeccion_preliminar->num_acompaniantes=$request->get('num_acompaniantes');
            $proyeccion_preliminar->cantidad_grupos=$request->get('cant_grupos_edit');

            $proyeccion_preliminar->grupo_1=$request->get('grupo_1');
            $proyeccion_preliminar->grupo_2=$request->get('grupo_2');
            $proyeccion_preliminar->grupo_3=$request->get('grupo_3');
            $proyeccion_preliminar->grupo_4=$request->get('grupo_4');

            $proyeccion_preliminar->destino_rp=$request->get('destino_rp');
            $proyeccion_preliminar->ruta_principal=$request->get('ruta_principal');
            $proyeccion_preliminar->destino_ra=$request->get('destino_ra');
            $proyeccion_preliminar->ruta_alterna=$request->get('ruta_alterna');
            $proyeccion_preliminar->det_recorrido_interno_rp=$request->get('det_recorrido_interno_rp');
            $proyeccion_preliminar->det_recorrido_interno_ra=$request->get('det_recorrido_interno_ra');
            
            $proyeccion_preliminar->lugar_salida_rp=$request->get('lugar_salida_rp');
            $proyeccion_preliminar->lugar_salida_ra=$request->get('lugar_salida_ra');
            $proyeccion_preliminar->lugar_regreso_rp=$request->get('lugar_regreso_rp');
            $proyeccion_preliminar->lugar_regreso_ra=$request->get('lugar_regreso_ra');

            $proyeccion_preliminar->fecha_salida_aprox_rp= $request->get('fecha_salida_aprox_rp');
            $proyeccion_preliminar->fecha_regreso_aprox_rp= $request->get('fecha_regreso_aprox_rp');
            $proyeccion_preliminar->fecha_salida_aprox_ra= $request->get('fecha_salida_aprox_ra');
            $proyeccion_preliminar->fecha_regreso_aprox_ra= $request->get('fecha_regreso_aprox_ra');

            $fecha_salida_rp = new DateTime($proyeccion_preliminar->fecha_salida_aprox_rp);
            $fecha_regreso_rp = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_rp);
            $num_dias_rp = $fecha_salida_rp->diff($fecha_regreso_rp);
            $proyeccion_preliminar->duracion_num_dias_rp=$num_dias_rp->days+1;

            $fecha_salida_ra = new DateTime($proyeccion_preliminar->fecha_salida_aprox_ra);
            $fecha_regreso_ra = new DateTime($proyeccion_preliminar->fecha_regreso_aprox_ra);
            $num_dias_ra = $fecha_salida_ra->diff($fecha_regreso_ra);



            $tipo_transporte_rp = $request->get('id_tipo_transporte_rp_');
            $tipo_transporte_ra = $request->get('id_tipo_transporte_ra_');
            $det_tipo_transporte_rp = $request->get('det_tipo_transporte_rp_');
            $det_tipo_transporte_ra = $request->get('det_tipo_transporte_ra_');
            $capacid_transporte_rp = $request->get('capac_transporte_rp_');
            $capacid_transporte_ra = $request->get('capac_transporte_ra_');
            
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
            
            $proyeccion_preliminar->cant_transporte_rp=count($capacid_transporte_rp);
            $proyeccion_preliminar->cant_transporte_ra=count($capacid_transporte_ra);

            $proyeccion_preliminar->exclusiv_tiempo_rp_1=$request->get('exclusiv_tiempo_rp_1');
            $proyeccion_preliminar->exclusiv_tiempo_rp_2=$request->get('exclusiv_tiempo_rp_2');
            $proyeccion_preliminar->exclusiv_tiempo_rp_3=$request->get('exclusiv_tiempo_rp_3');
            $proyeccion_preliminar->exclusiv_tiempo_ra_1=$request->get('exclusiv_tiempo_ra_1');
            $proyeccion_preliminar->exclusiv_tiempo_ra_2=$request->get('exclusiv_tiempo_ra_2');
            $proyeccion_preliminar->exclusiv_tiempo_ra_3=$request->get('exclusiv_tiempo_ra_3');

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

        // $proyeccion_preliminar->id_espacio_academico=(!empty($esp_aca)||null)?
        // $esp_aca->id:$proyeccion_preliminar->id_espacio_academico;
        // $proyeccion_preliminar->id_peridodo_academico=(!empty($request->get('id_periodo_academico')))?
        // $request->get('id_periodo_academico'):$proyeccion_preliminar->id_peridodo_academico;
        // $proyeccion_preliminar->id_semestre_asignatura=(!empty($request->get('id_semestre_asignatura')))?
        // $request->get('id_semestre_asignatura'):$proyeccion_preliminar->id_semestre_asignatura;
        // $proyeccion_preliminar->cantidad_grupos=(!empty($request->get('cant_grupos_edit')))?
        // $request->get('cant_grupos_edit'):$proyeccion_preliminar->cantidad_grupos;
        
        // $proyeccion_preliminar->fecha_salida_aprox_rp=(!empty($request->get('fecha_salida_aprox_rp')))?
        // $request->get('fecha_salida_aprox_rp'):$proyeccion_preliminar->fecha_salida_aprox_rp;
        // $proyeccion_preliminar->fecha_salida_aprox_ra=(!empty($request->get('fecha_salida_aprox_ra')))?
        // $request->get('fecha_salida_aprox_ra'):$proyeccion_preliminar->fecha_salida_aprox_ra;
        // $proyeccion_preliminar->fecha_regreso_aprox_rp=(!empty($request->get('fecha_regreso_aprox_rp')))?
        // $request->get('fecha_regreso_aprox_rp'):$proyeccion_preliminar->fecha_regreso_aprox_rp;
        // $proyeccion_preliminar->fecha_regreso_aprox_ra=(!empty($request->get('fecha_regreso_aprox_ra')))?
        // $request->get('fecha_regreso_aprox_ra'):$proyeccion_preliminar->fecha_regreso_aprox_ra;
        
        
        // $proyeccion_preliminar->exclusiv_tiempo_rp_1=(!empty($request->get('exclusiv_tiempo_rp_1')))?
        // $request->get('exclusiv_tiempo_rp_1'):$proyeccion_preliminar->exclusiv_tiempo_rp_1;
        // $proyeccion_preliminar->exclusiv_tiempo_rp_2=(!empty($request->get('exclusiv_tiempo_rp_2')))?
        // $request->get('exclusiv_tiempo_rp_2'):$proyeccion_preliminar->exclusiv_tiempo_rp_2;
        // $proyeccion_preliminar->exclusiv_tiempo_rp_3=(!empty($request->get('exclusiv_tiempo_rp_3')))?
        // $request->get('exclusiv_tiempo_rp_3'):$proyeccion_preliminar->exclusiv_tiempo_rp_3;
        // $proyeccion_preliminar->exclusiv_tiempo_ra_1=(!empty($request->get('exclusiv_tiempo_ra_1')))?
        // $request->get('exclusiv_tiempo_ra_1'):$proyeccion_preliminar->exclusiv_tiempo_ra_1;
        // $proyeccion_preliminar->exclusiv_tiempo_ra_2=(!empty($request->get('exclusiv_tiempo_ra_2')))?
        // $request->get('exclusiv_tiempo_ra_2'):$proyeccion_preliminar->exclusiv_tiempo_ra_2;
        // $proyeccion_preliminar->exclusiv_tiempo_ra_3=(!empty($request->get('exclusiv_tiempo_ra_3')))?
        // $request->get('exclusiv_tiempo_ra_3'):$proyeccion_preliminar->exclusiv_tiempo_ra_3;
        

        $proyeccion_preliminar->update();
        return redirect('proyecciones/filtrar/not_send');
        // return Redirect::to('proyecciones');
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


    public function sendProy(Request $request)
    {

        $idRole = Auth::user()->id_role;
        $idUser = Auth::user()->id;

        $id_proyecciones_confimadas = $request->get('data');
        switch($idRole)
        {
            case 1:
            break;

            case 2:
            break;

            case 3:
                foreach($id_proyecciones_confimadas as $id)
                {
                    $proyeccion = proyeccion::find($id);
                    $proyeccion->confirm_asistD = 1;
                    $proyeccion->update();
                }
            break;

            case 4:
                foreach($id_proyecciones_confimadas as $id)
                {
                    $proyeccion = proyeccion::find($id);
                    $proyeccion->confirm_electiva_coord = 1;
                    $proyeccion->confirm_coord = 1;
                    $proyeccion->update();
                }
            break;

            case 5:
                foreach($id_proyecciones_confimadas as $id)
                {
                    $proyeccion = proyeccion::find($id);
                    $proyeccion->confirm_docente = 1;
                    $proyeccion->update();
                }
            break;

        }

        $filter = "send";

        return route('proyeccion_filter',['filter'=>$filter]);
        // response()->json(view('proyecciones.index',["proyecciones"=>$proyeccion, 'filter'=>$filter])->render());
        // view('proyecciones.index',["proyecciones"=>$proyeccion, 'filter'=>$filter]);
    }

    public function validar_electivas(Request $request)
    {
        $id_proyecciones_confimadas = $request->get('data');
        $proy = 0;
        $id_elect = [];

        if(count($id_proyecciones_confimadas) == 1)
        {
            $proyeccion=DB::table('proyeccion_preliminar as p_prel')
            ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico','e_aca.electiva')
            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
            ->where('p_prel.id','=',$id_proyecciones_confimadas)
            ->where('e_aca.electiva','=',1)->first();

            if(!empty($proyeccion))
            {
                $id_elect[] += $proyeccion->id;
            }
        }

        elseif(count($id_proyecciones_confimadas) > 1)
        {

            foreach($id_proyecciones_confimadas as $id)
            {
                $proyeccion=DB::table('proyeccion_preliminar as p_prel')
                            ->select('p_prel.id','e_aca.id_programa_academico','p_aca.programa_academico','e_aca.espacio_academico','e_aca.electiva')
                            ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
                            ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
                            ->where('p_prel.id','=',$id)
                            ->where('e_aca.electiva','=',1)->first();
    
                
                if(!empty($proyeccion))
                {
                    $id_elect[] += $proyeccion->id;
                }
            }
        }

        return response()->json($id_elect);
    }
}
