<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formularios;
use App\Secciones;
use App\Preguntas;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formularios = Formularios::all();
        $secciones = Secciones::all();
        $preguntas = Preguntas::all();
        $sp =array();


        foreach ($secciones as $seccion) {
            # code...
            $p = array();
            foreach (Preguntas::where('id_seccion',$seccion->id)->get() as $pregunta) {
                # code...
                $valor =array( 'id' => $pregunta->id,'descripcion' => $pregunta->descripcion,'numeracion' => $pregunta->numeracion  );
                array_push($p, $valor);
            }

            $fila = array('descripcion' => $seccion->descripcion,
                          'preguntas' =>$p);

           array_push($sp, $fila);
        }
       
      // return $sp;
        return view('home',array('formularios'=>$formularios,'secciones'=>$sp));
       // return view('home');
    }
   
}
