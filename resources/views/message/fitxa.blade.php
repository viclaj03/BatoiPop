@extends('layouts.batoiEmpresa')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-12 row-cols-xl-12 justify-content-center">
                <div  class="col-sm-12 col-md-12 col-lg-12">
                    <h1>Mensaje Reportado</h1>
                    <table @class("table table-bordered table-danger")>
                        <tr>
                            <th>Enviado por:</th>
                            <th>Recibido por:</th>
                        </tr>
                        <tr>
                            <td>
                                @if($message->userTransmitter->imagen)
                                    <img src="{{$message->userTransmitter->imagen}}" width="100px" alt="perfilPhoto" class="rounded border border-primary">
                                @else
                                    <img src="{{asset('images/no-photo-employee.png')}}" width="100px" alt="perfilPhoto" class="rounded border border-primary">
                                @endif
                                    {{$message->userTransmitter->name}}
                                    <button
                                        class="btn btn-sm"
                                        title="Ver Usurio"
                                    >
                                        <a href="{{route('user.show',$message->userTransmitter)}}"> <i class="bi bi-eye"></i> </a>
                                    </button>
                            </td>
                            <td>
                                @if($message->article->user->imagen)
                                    <img src="{{$message->article->user->imagen}}" width="100px" alt="perfilPhoto" class="rounded border border-primary">
                                @else
                                    <img src="{{asset('images/no-photo-employee.png')}}" width="100px" alt="perfilPhoto" class="rounded border border-primary">
                                @endif
                                {{$message->article->user->name}}
                                    <button
                                        class="btn btn-sm"
                                        title="Ver Usurio"
                                    >
                                        <a href="{{route('user.show',$message->article->user)}}"> <i class="bi bi-eye"></i> </a>
                                    </button>
                            </td>
                        </tr>
                        <tr>
                            <td>{{$message->userTransmitter->email}}</td>
                            <td>{{$message->article->user->email}}</td>
                        </tr>
                        <tr>
                            <td>Enviado el: {{\Carbon\Carbon::make($message->created_at)->format("d-m-Y  h:i:s")}}  </td>
                            <td>Articulo: {{$message->article->name}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Mensaje: {{$message->message}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

