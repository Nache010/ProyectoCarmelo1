<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    
    
    public function attributes(){
        return [
            'nombre'        => 'Nombre del producto',
            'descripcion'   => 'Descripcion del producto',
            'precio'        => 'Precio del producto',
            'iva'           => 'Iva del producto',
            'descuento'     => 'Descuento a aplicar en el producto',
            'observacion'   => 'Obervaciones',
        ];
        
    }
    
    
    public function messages(){
        
        $obligatorio = 'El campo :attribute es obligatorio';
        $min = 'La longitud minima del campo :attribute es :min';
        $max = 'La longitud maxima del campo :attribute es :max';
        $comun = 'El campo :attribute no tiene formato valido';
        $gte = 'El campo :attribute debe ser mayor o igual que 0';
        $lte = 'El campo :attribute debe ser menor o igual que el valor especificado';
        $between = 'El campo :attribute debe estar entre los valores especificados :campo1 :campo2';
        $carmelo = 'Existen validaciones gte y lte que son greater than equal y less than equal para hacer min y max';
        
        return [
            'nombre.required'       => $obligatorio,
            'nombre.max'            => $max,
            'nombre.alpha_num'      => $comun,
            'nombre.min'            => $min,
            'descripcion.required'  => $obligatorio,
            'descripcion.max'       => $lte,
            'precio.required'       => $obligatorio,
            'precio.between'        => $between,
            'precio.numeric'        => $comun,
            'iva.required'          => $obligatorio,
            'iva.between'           => $between,
            'iva.numeric'           => $comun,
            'descuento.required'    => $obligatorio,
            'descuento.between'     => $between,
            'descuento.numeric'     => $comun,
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'nombre'        => 'required    | min:2     | max:50    | alpha_num',
            'descripcion'   => 'required    | max:255',
            'precio'        => 'required    | numeric',
            'iva'           => 'required    | between:0,100         | numeric',
            'descuento'     => 'required    | between:0,100         | numeric',
            'observacion'   => 'nullable',
        ];
    }
}
