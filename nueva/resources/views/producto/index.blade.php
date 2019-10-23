@extends('base')
@section('contenido')
    
    
        @isset($result)
            <div class="alert alert-{{$tipo}}" role="alert">
                {{$mensaje}}
                @isset($error)
                    <hr>
                    {{$error}}
                @endisset
            </div>
       
        @endisset
    
    
    <!-- Aqui va el listado -->
    <table class="table table-hover table-striped text-center border border-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Iva</th>
                <th scope="col">Descuento</th>                
                <th scope="col" colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr class="">
                <td class="border-dark  border-left-0" scope="row">{{ $producto['nombre'] }}</td>
                <td class="border-dark  border-left-0" scope="row">{{ $producto['descripcion'] }}</td>
                <td class="border-dark  border-left-0" scope="row">{{ $producto['precio'] }}</td>
                <td class="border-dark  border-left-0" scope="row">{{ $producto['iva'] }}</td>
                <td class="border-dark  border-left-0" scope="row">{{ $producto['descuento'] }}</td>
                <td class="border-dark  border-left-0" scope="row"><a href="{{url('producto/'.$producto->id)}}" class="btn btn-info">Ver</a></td>
                <td class="border-dark  border-left-0" scope="row"><a href="{{url('producto/'.$producto->id.'/edit')}}" class="btn btn-info">Editar</a></td>
                <td class="border-dark  border-left-0" scope="row">
                <form method="POST" action="{{url('producto/'.$producto->id)}}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
                </td>
                <!--
                <td class="border-dark  border-left-0" scope="row">
                    <form action="{{url('producto/'.$producto->id)}}">
                        @method('DELETE') 
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                </td>
                -->
                
            </tr>
        @endforeach
        </tbody>
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Iva</th>
                <th scope="col">Descuento</th>                
                <th scope="col" colspan="3">Acciones</th>
            </tr>
        </thead>
    </table>
    <!-- termina listado -->
    <div class="row">
        <a href="{{url('producto/create')}}"                 class="btn btn-info">Agregar producto</a>
        <hr>
        <a href="{{action('ProductoController@create')}}"    class="btn btn-info">Agregar producto</a>
        <hr>
        <a href="{{route('producto.create')}}"                 class="btn btn-info">Agregar producto</a>

    </div>
    <hr>
@stop