
<h1>Listado de Articulos </h1>
<table class="table table-striped table-hover">
    <thead class="thead-dark bg-primary">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Foto</th>
        <th>Articulos</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->name}}</td>
            <td>{{$categoria->desc}}</td>
            <td>
                @if($categoria->image)
                    <img src="{{asset($categoria->image)}}" width="50px">
                @else
                    <img src="{{asset('images/no-photo-employee.png')}}" width="50px">
                @endif
            </td>
            <td>{{$categoria->article->count()}}</td>

            <td>
                <button
                    class="btn btn-sm"
                    title="Ver autor"
                >
                    <i class="bi bi-eye"></i>
                </button>
                <button
                    class="btn btn-sm"
                    title="Ver libros"
                >
                    <i class="bi bi-pencil"></i>
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
