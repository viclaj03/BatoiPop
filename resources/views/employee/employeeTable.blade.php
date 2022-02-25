<h1>Listado de Empleado</h1>
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
    @foreach($employees as $employe)
        @if(Auth::user()->email == $employe->email)
            <tr class="bg-success">
        @else
            <tr>
        @endif
        <td>{{$employe->id}}</td>
        <td>{{$employe->name}}</td>
        <td>{{$employe->email}}</td>
        <td>
            @if($employe->imagen)
            <img src="{{asset($employe->imagen)}}" width="50px"  @class('rounded-circle')>
            @else
                <img src="{{asset('images/no-photo-employee.png')}}" width="50px">
            @endif
        </td>
        <td>
            @if(Auth::user()->email == $employe->email)

                <button
                    class="btn btn-sm"
                    title="Editar Usuario"
                >
                    <a href="{{route('employee.edit',$employe)}}">
                        <i class="bi bi-pencil"></i>
                    </a>
                </button>
            @endif

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
