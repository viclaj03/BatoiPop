@php()
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="no" />
    <title>Report</title>
</head>
<body>
<h1 style="color: red">Su Articulo se ha subido con exito </h1>
<h3>Sr/a {{$article->user->name}} su Articulo {{$article->name}} se ha subido a nuestra pagina web</h3>
<p>Gracias por usar nuestro servicio </p>
</body>
</html>
