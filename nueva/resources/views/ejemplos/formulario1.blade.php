<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="ruta9" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="nombre" placeholder="pon aqui tu nombre">
        <input type="submit">
    </form>

    <form action="ruta9" method="post">
        @csrf
        <input type="text" name="nombre" placeholder="pon aqui tu nombre">
        <input type="submit">
    </form>

    <form action="ruta9" method="post">
        <input type="hidden" name="_token" value="{{ $csrf }}">
        <input type="text" name="nombre" placeholder="pon aqui tu nombre">
        <input type="submit">
    </form>
    
    <form action="ruta9" method="post">
        <input type="text" name="nombre" placeholder="pon aqui tu nombre">
        <input type="submit">
    </form>

</body>
</html>