<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('ruta6/', function () {
    return view('ejemplos.saluda');
});

Route::get('ruta7/', function () {
    $valores = [    'uno' => 'María' ,
                    'dos' => 'pepe' ,
                ];
    return view('ejemplos.saluda2', $valores);
});

Route::get('ruta8/', function(){
    $valores = ['csrf' => csrf_token()];
    return view('ejemplos.formulario1', $valores);
});

Route::post('ruta9/', function(){
    return 'ruta9';
});

Route::get('ruta10/','PrimerController@ruta10')->name('manolo');
Route::get('ruta10a/', function(){

    return redirect() -> route('manolo');
});

Route::get('ruta10b/', function(){
    return redirect('ruta12/admin/Sesionlog');
});

Route::get('ruta11/abc/def/','PrimerController@ruta10');

Route::get('ruta12/{idusuario}/{idlog}','PrimerController@ruta12')->name('usuariolog');


Route::get('ruta1/', function() {
    return 'Hola mundo ,get';
});

Route::post('ruta1/', function() {
    return 'Hola mundo ,post';
});

Route::put('ruta1', function() {
    return 'Hola mundo ,put';
});

Route::delete('ruta1', function() {
    return 'Hola mundo ,delete';
});

Route::fallback(function () {
    return '<h1>404 de nacho </h1>';
});

Route::any('ruta2', function() {
    return 'Vale por todos';
});

Route::match(array('GET','POST'), 'ruta3/', function(){
    return 'este es un route match para los metodos del array de creacion';
});

Route::get('ruta4/{id}', function($id) {
    return 'El id es '. $id;
});

Route::get('ruta5/{id?}', function($id = 0) {
    return 'El id es '. $id;
});


Route::get('ruta13/','PrimerController@ruta13');
Route::any('ruta14/','PrimerController@ruta14'); 
Route::any('ruta15/{msj?}','PrimerController@ruta15');
Route::any('ruta16/','PrimerController@ruta16');
Route::get('subir/','FileUploadController@subir');
Route::post('upload/','FileUploadController@upload');
Route::get('ver/{archivo}','FileUploadController@ver');

Route::get('validate/form', 'ValidationController@create');
Route::post('validate/doform', 'ValidationController@store');



//rutas de controlador de recursos
Route::resource('recurso','ResourceController');
Route::resource('producto', 'ProductoController');
























