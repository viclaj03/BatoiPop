<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="no" />
    <title>Report</title>
</head>
<body>
    <h1 style="color: red">Su Articulo ha sido denunciado </h1>
    <h3>Sr/a {{$user->article->user->name}} su Articulo {{$user->article->name}} ha incumplido las reglas de nuestro servidor web</h3>
    <img class="card-img-top d-block w-100"  src="{{$img}}"  alt="product">
    <p>Le recordamos que si sufre 3 faltas puede ser expulsado del servidor</p>
</body>
</html>
