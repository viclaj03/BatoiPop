@extends('layouts.batoiEmpresa')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-12 row-cols-xl-12 justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1>Reporte Usuarios</h1>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark bg-primary">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Denuncias</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allReports as $key => $report)
                            @if($report->count() >= 3)
                                <tr class="table-danger">
                                @else
                                <tr>
                                    @endif
                                    <td>{{ $report[0]->message?$report[0]->message->userTransmitter->id:$report[0]->article->user->id}}</td>
                                <td>{{$key}}</td>
                                <td>{{$report[0]->message?$report[0]->message->userTransmitter->email:$report[0]->article->user->email}}</td>
                                <td>
                                    @if($report[0]->message?$report[0]->message->userTransmitter->imagen:'')
                                        <img src="{{$report[0]->message?asset($report[0]->message->userTransmitter->imagen):$report[0]->article->user->imagen}}" width="50px">
                                    @else
                                        <img src="{{asset('images/no-photo-employee.png')}}" width="50px">
                                    @endif
                                </td>
                                <td>{{$report->count()}}</td>
                                <td>
                                    <button
                                        class="btn btn-sm"
                                        title="Ver Usurio"
                                    >
                                       <a href="{{route('user.show',$report[0]->message?$report[0]->message->userTransmitter->id:$report[0]->article->user->id)}}"> <i class="bi bi-eye"></i> </a>
                                    </button>
                                    <button
                                        class="btn btn-sm"
                                        title="Borrar usuario"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
