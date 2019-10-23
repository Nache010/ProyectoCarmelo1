@extends('base')
@section('contenido')
        
    @isset($error)
        <h3>{{$error}}</h3>
    @endisset
    
    @isset($result)
        <h3>{{$result}}</h3>
    @endisset
    
    <form action="{{url('producto/' . $producto->id )}}" method="post">
        
        @csrf
        @method('put')
        <h4 class="text-center">  id -> {{$producto->id}}</h4>
        <input name = "nombre"      class="form-control"    placeholder="nombre del producto"       type="text"  value="{{old('nombre',$producto->nombre)}}"      maxlenght="50" minlenght="2"  size="50" required>
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <input name = "descripcion" class="form-control"    placeholder="descripcion del producto"  type="text"  value="{{old('descripcion',$producto->descripcion)}}" maxlenght="255"    size="50" required>
        @error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <input name = "precio"      class="form-control"    placeholder="precio del producto"       type="number"  value="{{old('precio',$producto->precio)}}"    min="0" max="1000" size="50" required>
        @error('precio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <input name = "iva"         class="form-control"    placeholder="iva del producto"          type="number" value="{{old('iva',$producto->iva)}}" min="0.00" max="1.00" step="0.01"  size="50" value="0.21" required>
        @error('iva')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <input name = "descuento"   class="form-control"    placeholder="descuento"  required       type="number" value="{{old('descuento',$producto->descuento)}}"  min="0.00" max="1.00" step="0.01" value="{{old('descuento','0.00')}}" size="50" value="0.21">
        @error('descuento')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <textarea name="observacion"   class="form-control"    placeholder="observaciones del producto" type="textarea" class="form-control">{{old('observacion',$producto->observacion)}}</textarea>
        @error('observacion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <input type = "submit" class="btn btn-info" value="Editar">
        <a href="{{route('producto.index')}}" class="btn btn-info">Volver</a>
        
    </form>
    

@stop