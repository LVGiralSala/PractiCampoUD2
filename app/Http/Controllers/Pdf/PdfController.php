<?php

namespace PractiCampoUD\Http\Controllers\Pdf;

use Barryvdh\DomPDF\PDF as DomPDF;
use Illuminate\Http\Request;
use PDF;
use DB;
use PractiCampoUD\Http\Controllers\Controller;
use PractiCampoUD\solicitud;

class PdfController extends Controller
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

    public function generateHtml()
    {
        $solicitudes_practica =DB::table('solicitud_practica as sol_prac')
        ->where('si_capital','=',1)
        ->where('tiene_resolucion','=',1)->get();
        return view('prueba',[
            "solicitudes_practica"=>$solicitudes_practica,
        ]);
    }

    public function exportPdf($id)
    {
        $solicitudes_practica =DB::table('solicitud_practica as sol_prac')
        // $solicitudes_practica_aprob =DB::table('solicitud_practica as sol_prac')
        ->select('p_prel.id','p_aca.programa_academico','e_aca.espacio_academico',
                'p_prel.destino_rp','p_prel.fecha_salida_aprox_rp','p_prel.fecha_regreso_aprox_rp',
                'p_prel.id_docente_responsable','docen_pract.docente_apoyo_1',
                'p_prel.duracion_num_dias_rp','c_proy.viaticos_docente_rp','c_proy.viaticos_estudiantes_rp','c_proy.total_presupuesto_rp',
                DB::raw('CONCAT_WS(" ",users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido) as full_name'))
        ->join('proyeccion_preliminar as p_prel','sol_prac.id_proyeccion_preliminar','=','p_prel.id')
        ->join('espacio_academico as e_aca','p_prel.id_espacio_academico','=','e_aca.id')
        ->join('programa_academico as p_aca','e_aca.id_programa_academico','=','p_aca.id')
        ->join('costos_proyeccion as c_proy','sol_prac.id_proyeccion_preliminar','=','c_proy.id')
        ->join('docentes_practica as docen_pract','sol_prac.id_proyeccion_preliminar','=','docen_pract.id')
        ->join('users','p_prel.id_docente_responsable','=','users.id')
        ->where('id_estado_solicitud_practica','=',3)
        ->where('si_capital','=',1)
        ->where('tiene_resolucion','=',1)
        ->where('sol_prac.id_proyeccion_preliminar','=',$id)->get();

        // foreach($solicitudes_practica_aprob as $item)
        // {
        //     $solicitudes_practica=DB::table('solicitud_practica as sol_prac')
        //     ->join('proyeccion_preliminar as p_prel','sol_prac.id_proyeccion_preliminar','=','p_prel.id')
        //     // ->groupBy('p_prel.id_docente_responsable')
        //     ->where('p_prel.id_docente_responsable','=',$item->id_docente_responsable)
        //     ->where('sol_prac.id','=',$item->id)->get();
            $pdf = PDF::LoadView('prueba',["solicitudes_practica"=>$solicitudes_practica]);
            $pdf->setPaper('letter');
        // }
        return $pdf->download('resolucion_proyeccion.pdf');
        
    }

    public function exportSolicitudPdf()
    {
        $data = ['title' => 'Welcome to PractiCampoUD.com'];
        $pdf = PDF::LoadView('prueba', $data);
  
        return $pdf->download('resolucion_solicitud.pdf');
    }
}
