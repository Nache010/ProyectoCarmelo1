<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        //select * from producto
        //$productos = DB::table('producto')->get();    //array que devuelve todos los productos
        $productos = Producto::all();                   //igual que arriba (en realidad son colecciones)
        
        $op     = $request->session()->get('op');
        $result = $request->session()->get('result');
        $error  = $request->session()->get('error');
        $datos  = [
            'productos' => $productos
        ];
        $mensajes = [
            'store'     => 'El producto ha sido ingresado con exito',
            'update'    => 'El producto se ha actualizado correctamente',
            'destroy'   => 'Se ha morio el producto',
        ];
        
        $mensajes_neg = [
            'store'     => 'Error al ingresar producto',
            'update'    => 'No se ha podido actualizar el producto',
            'destroy'   => 'Eliminar este producto no es posible en este momento',
        ];
        
        if(isset($result)){
            if($result){
                $datos += [
                'result' => $result,
                'tipo'   => 'success',
                'mensaje'=> $mensajes[$op],
                ];
            } else {
                $datos += [
                'result' => $result,
                'tipo'   => 'danger',
                'mensaje'=> $mensajes_neg[$op],
                'error'  => $error
                ];
                
            }
            
        }
        return view('producto.index')->with($datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request){
        $error = '';
        $input = $request->validated();     //Array asociativo con todos los valores validados y limpios.
        $producto = new Producto($input);   //Momento magico
        
        try{
            $result = $producto->save();
            
        }catch(\Exception $e){
            
            $error = $e->getMessage();
            $result = false;
        }
        
        
        return redirect(route('producto.index'))->with(['result' => $result,'op'=>'store' ,'error'=>$error]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto){
        return view('producto.show')->with(['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto){
        return view('producto.edit')->with(['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, Producto $producto){
        
        // Los errores se muestran tanto en la pagina que redirigimos como en la misma. Cuando salga un error volvemos a la pagina misma con los errores mostrados y cuando vaya a index mostramos exito.
        // se deberia programar tambien los mensajes de error en index por lo que pueda pasar.
        $input = $request->validated();
        $error = '';

        try{
            $result = $producto->update($input);
            
        }catch(\Exception $e){
            
            $error = $e->getMessage();
            $result = false;
            $datos = [
                'error'     => $error,
                'result'    => $result,
            ];
  
            return redirect()->back()->withInput();

        }
        
        return redirect(route('producto.index'))->with(['result' => $result,'op'=>'update' ,'error'=>$error]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto){
        $error = 'no hay';
        $result = $producto->delete();
        return redirect(route('producto.index'))->with(['result' => $result,'op'=>'destroy' ,'error'=>$error]);
    }
}
