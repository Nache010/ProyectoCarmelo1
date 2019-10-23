<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {

            //Cosas de apuntes
            //$table->primary(array('id'));
            $table->engine = 'InnoDB';                    //motor
            $table->charset = 'utf8';                     // conjunto de caracteres
            $table->collation = 'utf8_unicode_ci';        // en el phpmyadmin le llaman cotejamiento: se le aplican reglas de lenguaje a campos de texto para que salga 
                                                          // todo bien ordenao y colocado en las bases de datos. (las tablas lo ordenan por su cotejacion binaria, y con 
                                                          // ese codigo nos lo ordena por el lenguaje español). Importante definirlo bien.
                                                          //codificacion utf-8 y tipos mime tambien son aspectos genericos que deberiamos tener en cuenta para desarrollar.
            $table->bigIncrements('id');                  //especifica que es un autonumerico grande y aqui si es obligatorio
            
            //'nombre', 'descripcion', 'precio', 'iva', 'descuento', 'observacion'
            //los campos de arriba estan cogidos del modelo, para hacer la migracion, son los siguientes.
            //los campos se crean en orden, por eso los dos ultimos estan separaos al final.
            $table->string('nombre', 50)->unique();
            $table->string('descripcion')->nullable();    
            $table->decimal('precio', 10, 3);           //la diferencia entre decimal y float es que float tiene la posible perdida de precision
            $table->float('iva', 6, 2);        
            $table->float('descuento', 6, 2);        
            $table->text('observacion')->nullable();

            
            $table->timestamps();                         //añade marcas de tiempo created_at y updated_at
            $table->softDeletes();                        //añade los softdeletes y añade deleted_at
            //para crear la migracion usar php artisan migrate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
