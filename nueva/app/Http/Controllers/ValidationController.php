<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller; no es necesario por que el espacio de nombres me carga la carpeta y las clases que estan dentro son accesibles.
//use App\Http\Requests\ValidationRequest;
use App\Http\Requests\ValidationRequest;

class ValidationController extends Controller
{
    function create(){
        return view('validate.create');
    }
    
    function store(ValidationRequest $request){
        //aqui iban las reglas de validacion, nos las hemos llevao a validationrequest
        $datosValidados = $request->validated();
    }
        
}
