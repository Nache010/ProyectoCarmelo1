<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerController extends Controller
{
    private $mensajes = [
        'mensaje1' => 'pepe no es valido',
        'mensaje2' => 'Otra cosa'
        ];
    public function ruta10(){
        //$valores = ['csrf' => csrf_token()];
        //return view('ejemplos.formulario1', $valores);
        //return view('ejemplos.formulario1')->with($valores);
        $frutas = [
            ['nombre'=>'melocoton', 'precio'=> 1.34],
            ['nombre'=>'kiwi', 'precio'=>2.44],
            ['nombre'=>'papaya', 'precio'=>4.67],
            ['nombre'=>'aguacate', 'precio'=>0.74],
            ['nombre'=>'maracuya', 'precio'=>5.34],
            ['nombre'=>'fruta del dragon', 'precio'=>7.98],
        ];
        $empresa = 'Hermanos <br> Fruteros';
        $valores = [
            'frutas'=>$frutas,
            'empresa'=>$empresa
        ];
        //echo '<pre>' .var_export($valores, true) .'</pre>';
        //exit;
        return view('base.frutas')->with($valores);
    }

    function ruta12($idusuario, $idlog){
        $valores = ['idusuario'=> $idusuario, 'idlog' => $idlog];
        return view('base.ruta12')->with($valores);
    }

    function ruta13(){
        return view('base.ruta13');
    }

    function ruta14(Request $peticion){
        $nombre = $peticion->input('nombre');
        $nombre2 = $peticion->query('nombre','no llega');
        return $nombre.' '.$nombre2.' '.$peticion->nombre;
    } 
    function ruta15(Request $peticion, $mensaje = ''){
        $datos = [];
        if(isset($this->mensajes[$mensaje])){
            $datos = [
            'mensaje'=> $this->mensajes[$mensaje]
            ];
        }
        return view('base.ruta15')->with($datos);
    }
    function ruta16(Request $request){
        $nombre = $request->input('nombre');

        if(strcasecmp($nombre, 'pepe') === 0){
            return redirect('ruta15/mensaje1')->withInput($request->except('clave','clave2'));
        }else{
            return redirect('ruta15/mensaje2');
        }
        return view('base.ruta16');
    }
    
    function subir(){
        return view('base.subir');
    }
}
