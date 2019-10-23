@extends('base')
@section('contenido')

    <form action="ruta14" method="get">
        <input type="text" name="nombre" id="nombrefg" placeholder="nombre">
        <input type="submit" value="Enviar"><br>
    </form>
    <form action="ruta14?nombre=paco" method="post">
        @csrf
        <input type="text" name="nombre" id="nombrefp" placeholder="nombre">
        <input type="submit" value="Enviar"><br>
    </form>
@stop 