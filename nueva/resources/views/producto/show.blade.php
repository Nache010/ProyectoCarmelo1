@extends('base')
@section('contenido')
    <table class="table table-striped table-hover">
        <tr>
            <th> Nombre </th>
            <td>
                {{$producto->nombre}}
            </td>
        </tr>
        <tr>
            <th> Descripcion </th>
            <td>
                {{$producto->descripcion}}
            </td>
        </tr>
        <tr>
            <th> Precio </th>
            <td>
                {{$producto->precio}}
            </td>
        </tr>
        <tr>
            <th> Iva </th>
            <td>
                {{$producto->iva}}
            </td>
        </tr>
        <tr>
            <th> Descuento </th>
            <td>
                {{$producto->descuento}}
            </td>
        </tr>
        <tr>
            <th> Observacion </th>
            <td>
                {{$producto->observacion}}
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <th>
                <a class="btn btn-info" href="{{route('producto.index')}}"> Volver </a>
            </th>
        </tr>
    </table>
@stop