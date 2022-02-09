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
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            @if($user->imagen)
            <img src="{{asset($user->imagen)}}" width="50px">
            @else
                <img src="{{asset('images/no-photo-employee.png')}}" width="50px">
            @endif
        </td>
        <td>
            <button
                class="btn btn-sm"
                title="Ver Usurio"
            >
                <a href="{{route('user.show',$user)}}"> <i class="bi bi-eye"></i> </a>
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
