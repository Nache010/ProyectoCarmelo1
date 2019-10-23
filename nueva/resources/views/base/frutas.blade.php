@extends('base')
@section('contenido')


<div class="row">
    <h1>  {{ $empresa }}</h1>

    <h1>  {!! $empresa !!}</h1> <!-- este metodo permite meter etiquetas html en las etiquetas php pero te pueden inyectar codigo-->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Fruta</th>
                <th scope="col">Precio</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($frutas as $fruta)
            <tr>
                <th scope="row">{{ $fruta['nombre'] }}</th>
                <td>{{ $fruta['precio'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop