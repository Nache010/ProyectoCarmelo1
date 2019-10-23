@extends('base')
@section('contenido')



{{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{url('validate/doform')}}" method="post">
        
        @csrf
        
        <input name = "login"       placeholder="login requerido entre 5 y 10 caracteres alfabeticos"   type="text"       value="{{old('login')}}"      size="50">
        @error('login')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <input name = "mail"        placeholder="email requerido formato coreo max: 100 caracteres"     type="text"       value="{{old('mail')}}"       size="50">
        @error('mail')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <input name = "password"    placeholder="clave requerida minimo 8 caracteres"                   type="password"   value="{{old('password')}}"   size="50">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <input name = "date"        placeholder="fecha opcional formato aaaa/mm/dd"                     type="text"       value="{{old('date')}}"       size="50">
        @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <input type = "submit" value="enviar">
        
    </form>
    
@stop