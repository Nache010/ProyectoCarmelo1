@extends('base')

@section('contenido')

    @isset($mensaje) 
    <h2>{{ $mensaje }}</h2> 
    @endisset

    <!--{ no{ $mensaje2 } no }-->

    <!-- { { $mensaje ? ? '' } } -->
    <!-- { ! ! $mensaje  ? ? '' ! ! } -->

    <form action="{{url('ruta16')}}" method="post">
        @csrf
        <input type="text" name="nombre" id="nombrefp" placeholder="nombre" required value="{{ old('nombre') }}">
        <input type="text" name="apellidos" id="apellidos" placeholder="apellidos" required value="{{ old('apellidos') }}">
        <input type="text" name="direccion" id="direccion" placeholder="dirección" value="{{ old('direccion') }}">
        <input type="email" name="correo" id="correo" placeholder="correo" value="{{ old('correo') }}">
        <input type="password" name="clave" id="clave" placeholder="clave" required value="{{ old('clave') }}">
        <input type="password" name="clave2" id="clave2" placeholder="repite clave" required value="{{ old('clave2') }}">
        <hr>
        <input type="submit" value="Enviar"><br>
    </form>
@stop 