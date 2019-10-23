<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model{
    
    use SoftDeletes; //deleted_at -> al poner que usamos softdeletes el campo para indicar si estaria borrado o no es deleted_at. creando bigdata.


    //todos los campos en protected, o public en su caso, nunca private, tengo que acceder a ellos de manera publica o por ""paquete""

    protected $table = 'producto'; //Sin "chuminas" nombres en minusculas
    //protected $primaryKey = 'id';// Si el campo primaryKey es ID no hace falta especificar este paso. Si nuestra PK es otra, aqui se pone.
    //el paso anterior es inutil, pues la pone por defecto.
    
    
    // protected $incrementing = false; //sólo si no es auto numérica la clave principal || para hacer el incremento de manera no natural. con palabras ej.
    // protected $keyType = 'string'; //sólo si el tipo de la clave principal no es entero. En nuestro caso, es id autoincrementado, asique es entero. (LO MAS COMUN)
    
    
    //ESPECIFICA false si no quieres que te añada el campo de abajo, para true o default(no ponerlo) añade los campos mencionados.
    //protected $timestamps = false; //sólo si la tabla no va a tener los campos created_at y updated_at
    //const CREATED_AT = 'fecha_creacion'; //sólo si se cambia el nombre del campo created_at || VALEN para cambiar el nombre
    //const UPDATED_AT = 'fecha_edicion'; //sólo si se cambia el nombre del campo updated_at  || Lo mismo, cambio de nombre
    
    //señala los campos que tu quieres ocultar para no mostrar
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    
    protected $fillable = ['nombre', 'descripcion', 'precio', 'iva', 'descuento', 'observacion']; //para definir los campos || añadimos todos los campos que no teniamos hasta ahora y que queremos en la tabla.
    
    protected $attributes = ['iva' => 0.21, 'descuento' => 0]; //sólo si hay campos con valores predeterminados || añadae valor predeterminado.

}
