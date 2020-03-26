<?php

namespace PractiCampoUD\Http\Controllers\Pdf;

use Barryvdh\DomPDF\PDF as DomPDF;
use Illuminate\Http\Request;
use PDF;
use PractiCampoUD\Http\Controllers\Controller;

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
        return view('prueba');
    }

    public function exportPdf()
    {
        $pdf = PDF::LoadView('prueba');
        $pdf->setPaper('letter');
  
        return $pdf->download('resolucion_proyeccion.pdf');
    }

    public function exportSolicitudPdf()
    {
        $data = ['title' => 'Welcome to PractiCampoUD.com'];
        $pdf = PDF::LoadView('prueba', $data);
  
        return $pdf->download('resolucion_solicitud.pdf');
    }
}
