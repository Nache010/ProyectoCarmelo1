<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    function subir(){
        return view('base.subir');
    }
    
    function upload(Request $request){
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $file = $request->file('file');
            $target = '../../../safeuploads/';
            $name = date('YmdHis') . $file->getClientOriginalName();
            $file->move($target,$name);
        }
        //return redirect('subir');
        return response()->file($target . $name);
        
    }

    function ver($archivo){
        $array = [
            '1' => '1.txt',
            'z' => '2.jpg'
            ];
        $mostrar = 'default.jpg';
        if(isset($array[$archivo])){
            $mostrar = $array[$archivo];
        }
        return response()->file('../../../safeuploads/'.$mostrar);
        
    }
    
    function ver2(Request $request, $archivo){
        
    }
}
