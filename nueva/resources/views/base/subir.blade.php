@extends('base')
@section('contenido')
<img src="ver/2">
<form action="{{url('upload')}}"                             method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="texto" value="texto">
    <input type="file" name="file" id="file1">
    <input type="submit" value="upload">
</form>

<form action="{{ action('FileUploadController@upload') }}"   method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="texto" value="texto">
    <input type="file" name="file" id="file2">
    <input type="submit" value="upload">
</form>

<form action="{{ action('FileUploadController@upload') }}"   method="post" enctype="application/x-www-form-urlencoded">
    @csrf
    <input type="text" name="texto" value="texto">
    <input type="file" name="file" id="file">
    <input type="submit" value="upload">
</form>

@stop