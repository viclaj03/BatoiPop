<h1>Listado de Usuarios</h1>
<table class="table table-striped table-hover">
    <thead class="thead-dark bg-primary">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Foto</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $employe)
    <tr>
        <td>{{$employe->id}}</td>
        <td>{{$employe->name}}</td>
        <td>{{$employe->email}}</td>
        <td>
            @if($employe->imagen)
            <img src="{{asset($employe->imagen)}}" width="50px">
            @else
                <img src="{{asset('images/no-photo-employee.png')}}" width="50px">
            @endif
        </td>
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
