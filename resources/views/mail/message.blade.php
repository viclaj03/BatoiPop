<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="no" />
    <title>Report</title>
</head>
<body>
@if(!$date->buy)
<h1 style="color: red">Tienes un nuevo mensaje </h1>
@else
<h1 style="color: red">Tienes una peticion de compra </h1>
@endif
<h3>Sr/a {{$date->article->user->name}} su Articulo {{$date->article->name}} ha recibido un nuevo mensaje</h3>
<div style="border: 1px solid black">

<h4>Enviado por {{$date->userTransmitter->name}}</h4>
<h5>Contenido:{{$date->message}} </h5>
</div>

<p>Gracias por usar nuestro servicio </p>
</body>
</html>
