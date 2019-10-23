@extends('base')
@section('contenido')


<h1> este es mi contenido </h1>
<h2> @isset($hola) {{$hola}} @endisset</h2>
@stop