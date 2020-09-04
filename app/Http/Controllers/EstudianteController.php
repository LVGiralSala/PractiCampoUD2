<?php

namespace PractiCampoUD\Http\Controllers;

use Illuminate\Http\Request;
use PractiCampoUD\image;
use DB;
use PractiCampoUD\estudiantes_practica;

class EstudianteController extends Controller
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
    
    public function showLoginFormEst()
    {
        return view('auth.loginEst');
    }

    public function loginEst(Request $request)
    {
        $cod_estudiantil = $request->get('usuario');
        $docum_estudiante = $request->get('password');
        $estudiante = DB::table('estudiantes_solicitud_practica as esp')
        ->where('num_identificacion','=',$docum_estudiante)
        ->where('cod_estudiantil','=',$cod_estudiantil)->first();

        if($estudiante == null || $estudiante->estado_estudiante != 1)
        {
            Abort('401');
            // return view('auth.fallida_est');
        }
        else if($estudiante != null || $estudiante->estado_estudiante == 1)
        {

            return view('estudiantes.cargue_docs_est',["estudiante"=>$estudiante]);
        }
    }

    public function importDoc(Request $request, $id, $cod_est)
    {
        $file1 = $request->file('seguro_estudiantil');
        $file2 = $request->file('documento_adicional_1');
        $file3 = $request->file('documento_adicional_2');
        $seguro_est= base64_encode(file_get_contents($request->file('seguro_estudiantil')->path()));
        $doc_adic_1= base64_encode(file_get_contents($request->file('documento_adicional_1')->path()));
        $doc_adic_2= base64_encode(file_get_contents($request->file('documento_adicional_2')->path()));
        $v = "dsf";

        // $image1=new image();
        // $image1->id = 111;
        // $image1->image= $img1;

        // $image2=new image();
        // $image2->id = 112;
        // $image2->image= $img2;

        // $image3=new image();
        // $image3->id = 113;
        // $image3->image= $img3;

        // $image1->save();
        // $image2->save();
        // $image3->save();

        // $doc_estudiante = DB::table('estudiantes_solicitud_practica')
        // ->where('num_identificacion', '=', $id)
        // ->where('cod_estudiantil', '=', $cod_est)->first();
        $doc_estudiante= estudiantes_practica::where('num_identificacion', '=', $id)
        ->where('cod_estudiantil', '=', $cod_est)->first();
        $doc_estudiante->seguro_estudiantil = $seguro_est;
        $doc_estudiante->documento_adicional_1 = $doc_adic_1;
        $doc_estudiante->documento_adicional_2 = $doc_adic_2;
        $doc_estudiante->detalle_documento_adicional_1 = $request->get('detalle_documento_adicional_1');
        $doc_estudiante->detalle_documento_adicional_2 = $request->get('detalle_documento_adicional_2');

        $doc_estudiante->update();

        // $rec_image1=DB::table('images')
        // ->where('id','=',111)->first();

        // $rec_image2=DB::table('images')
        // ->where('id','=',112)->first();

        // $rec_image3=DB::table('images')
        // ->where('id','=',113)->first();

        $rec_doc= DB::table('estudiantes_solicitud_practica')
        ->where('num_identificacion', '=', $id)
        ->where('cod_estudiantil', '=', $cod_est)->first();

        $ccc1 = $rec_doc->seguro_estudiantil;
        $show_image1 = base64_decode($ccc1);
        $img1="data:image/png;base64,$ccc1";

        $ccc2 = $rec_doc->documento_adicional_1;
        $show_image2 = base64_decode($ccc2);
        $img2="data:image/png;base64,$ccc2";

        $ccc3 = $rec_doc->documento_adicional_2;
        $show_image3 = base64_decode($ccc3);
        $img3="data:image/png;base64,$ccc3";

        return view('estudiantes.ppp',["imagen1"=>$show_image1, "img1"=>$img1,
                                       "imagen2"=>$show_image2, "img2"=>$img2,
                                       "imagen3"=>$show_image3, "img3"=>$img3]);
        // return view('proyecciones.image',["imagen"=>$show_image, "img"=>$img]);
    }
}
