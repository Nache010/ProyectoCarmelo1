<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
{

    public function authorize(){
        return true;
    }
    
    public function attributes(){
        return [
            'login'     => 'nombre de usuario'  ,
            'mail'      => 'correo electronico' ,                
            'password'  => 'clave de acceso'    ,
            'date'      => 'fecha'
        ];
    }
    
    public function messages(){
        $obligatorio = 'El campo :attribute es obligatorio';
        $min = 'La longitud minima del campo :attribute es :min';
        $max = 'La longitud maxima del campo :attribute es :max';
        $comun = 'El campo :attribute no tiene formato valido';
        
        return [
            'login.required'    => $obligatorio,
            'login.min'         => $min,
            'login.max'         => $max,
            'login.alpha_num'   => 'Los caracteres permitidos en el campo :attribute son solo alfanumericos',
            'mail.required'     => $obligatorio,
            'mail.max'          => $max,
            'mail.email'        => $comun,
            'password.required' => $obligatorio,
            'password.min'      => $min,
            'date.date'         => $comun,
        ];
    }

    public function rules(){
        return [
            'login'     => 'required | min:5    | max:10 | alpha_num'   ,
            'mail'      => 'required | max:100  | email'                ,
            'password'  => 'required | min:8'                           ,
            'date'      => 'nullable | date',
            //'nombre'    => 'required | min:5' Esto chilla pero puedes hacer una clase que te extienda de esta y usar parent::y los metodos para ir rellenandolo
            // tambien tienes que usar array_merge() para las salidas. el operador + une arrays.
        ];
    }
    
}
