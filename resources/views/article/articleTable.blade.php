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
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->name}}</td>
            <td>{{$article->price}} €</td>
            <td>{{$article->category->name}} </td>
            <td>{{$article->location}} </td>
            <td>{{ \Carbon\Carbon::make($article->created_at)->format("d-m-y")}} </td>
            <td>
                @if($article->photos[0])
                    <img src="{{asset($article->photos[0]->image)}}" width="50px">
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
@foreach($articles as $article)
    <div class="col-sm-12 col-md-4 col-lg-3">
<div class="card h-100" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
    </div>
@endforeach
