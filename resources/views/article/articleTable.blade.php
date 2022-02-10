<h1>Listado de Articulos</h1>
<table class="table table-striped table-hover">
    <thead class="thead-dark bg-primary">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Categoria</th>
        <th>Loacalización</th>
        <th>Fecha de subida</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        @if(!empty($article->reports)?$article->reports:false )
            @dd($article->reports->id)
        @endif
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->name}}</td>
            <td>{{$article->price}} €</td>
            <td>{{$article->category->name}} </td>
            <td>{{$article->location}} </td>
            <td>{{ \Carbon\Carbon::make($article->created_at)->format("d-m-y")}} </td>
            <td>
                @if($article->imagen)
                    <img src="{{asset($article->imagen)}}" width="50px">
                @else
                    <img src="{{asset('images/no-photo-employee.png')}}" width="50px">
                @endif
            </td>
            <td>
                <button
                    class="btn btn-sm"
                    title="Ver Usurio"
                >
                    <a href="{{route('articles.show',$article)}}"> <i class="bi bi-eye"></i> </a>
                </button>
                <button
                    class="btn btn-sm"
                    title="Ver libros"
                >
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
