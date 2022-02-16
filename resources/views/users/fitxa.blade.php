@extends('layouts.batoiEmpresa')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-12 row-cols-xl-12 justify-content-center">
                <div  class="col-sm-12 col-md-12 col-lg-12">
                    <h1>Perfil de usuario</h1>
                    @if($reportMessage + $reportArticle >= 3 )
                        <table @class("table table-bordered table-danger")>
                            @else
                                <table @class("table table-bordered")>
                                    @endif
                                    <tr>
                                        <th rowspan="9">
                                            @if($user->imagen)
                                                <img src="{{$user->imagen}}" width="50%" alt="perfilPhoto" class="rounded border border-primary">
                                            @else
                                                <img src="{{asset('images/no-photo-employee.png')}}" width="200px" alt="perfilPhoto" class="rounded border border-primary">
                                            @endif
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>Nombre</th>
                                        <td colspan="2">{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td colspan="2">{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Puntucion</th>
                                        <td colspan="2">
                                        @for($i=1;$i<=$stars; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                            @for($i=1;$i<=$starsClear; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Localizacion </th>
                                        <td colspan="2">
                                        <iframe src="{{$user->location}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th > Nº Mensajes </th>
                                        <td colspan="2">{{$user->messageTransmitter->count()}}</td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2"> NºDenuncias <br> <span id="numberReport"> {{$reportMessage + $reportArticle}}</span> </th>
                                        <td >Articulos: {{$reportArticle}}</td>
                                        <td>
                                            <a href="{{route('user.report-article',$user)}}"> <i class="bi bi-eye"></i> </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mensajes : {{$reportMessage}}</td>
                                        <td>
                                            <a href="{{route('user.report-message',$user)}}"> <i class="bi bi-eye"></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Nº Productos </th>
                                        <td>{{$user->articles->count()}}</td>
                                        <td>
                                            <a href="{{route('article.user',$user)}}"> <i class="bi bi-eye"></i> </a>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td colspan="4" class="text-center">
                                            <form id="deleteUser" action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button  class="bi bi-trash">Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                </div>
            </div>
        </div>
    </section>
@endsection
