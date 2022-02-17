@extends('layouts.batoiEmpresa')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-12 row-cols-xl-12 justify-content-center">

                <div class="container py-3  ">
                    <div class="title h1 text-center ">{{$article->name}}</div>
                    <!-- Card Start -->
                    <div class="card ">
                        <div class="row ">
                            <div >
                                <div class="container mt-5">
                                    <div class="carousel-container position-relative row">
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">

                                                @foreach($article->photos as $key =>$photo)
                                                    <div class="carousel-item {{$key===0?'active':''}} card-100 align-content-center" data-slide-number="{{$key}}">
                                                        <img src="{{asset($photo->image)}}" class="d-block w-25" alt="..." data-remote="https://source.unsplash.com/Pn6iimgM-wo/" data-type="image"    >
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Carousel Navigation -->
                                        <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner bg-black">
                                                <div class="carousel-item active">
                                                    <div class="row mx-0">
                                                        @foreach($article->photos as $key =>$photo)
                                                            <div id="carousel-selector-{{$key}}" class="thumb col-4 col-sm-2 px-1 py-2 {{$key===0?'selected':''}}" data-target="#myCarousel" data-slide-to="{{$key}}">
                                                                <img src="{{asset($photo->image)}}" class="img-fluid" alt="...">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 px-3">
                                <div class="card-block px-6">
                                    <h4 class="card-title">Propietario:<a href="{{route('user.show',$article->user->id)}}">{{$article->user->name}} </a></h4>
                                    @if($article->buyer_id)
                                        <h6 class="card-title">Comprado por:<a href="{{route('user.show',$article->buyer_id)}}">{{$article->buyer->name}} </a></h6>
                                    @endif
                                    <h6 class="card-title"> Categoria:{{$article->category->name}} </h6>
                                    <h7 class="card-title"> Etiqutas:
                                        @foreach($article->tags as $key => $tag)
                                        {{$key==0 ?'':'|'}} {{$tag->name}}
                                        @endforeach </h7>
                                    <p class="card-text">
                                        {{$article->description}}
                                    </p>
                                    <p class="card-text">Precio: {{$article->price}} €</p>
                                    <p>Subido el {{\Carbon\Carbon::make($article->created_at)->format("d-m-Y  h:i:s")}}</p>
                                    <p>Denuncias {{$article->reports->count()}}</p>
                                    <br>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End of card -->
                </div>
            </div>
        </div>
    </section>
@endsection
