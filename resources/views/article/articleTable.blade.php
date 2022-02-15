<h1>Listado de Articulos</h1>
@foreach($articles as $article)
    <div class="col mb-5">
        <div class="card h-100" style="width: 18rem;">

            <div id="myCarousel{{$article->id}}" class="carousel slide" data-ride="carousel">

                <ul class="carousel-indicators">
                    @foreach($article->photos as $key =>$photo)
                    <li data-target="#myCarousel{{$article->id}}" data-slide-to="{{$key}}" class="{{$key===0?'active':''}}"></li>
                    @endforeach
                </ul>

                <div class="carousel-inner">
                    @foreach($article->photos as $key =>$photo)
                    <div class="carousel-item  {{$key===0?'active':''}} " data-interval="10000">
                        <img class="card-img-top d-block w-100"  src="{{asset($photo->image)}}"  alt="product">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#myCarousel{{$article->id}}" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel{{$article->id}}" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$article->name}}</h5>
                <p class="card-text">{{$article->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Precio:{{$article->price}}</li>
                <li class="list-group-item">Categoria:{{$article->category->name}}</li>
                <li class="list-group-item">Propietario: {{$article->user->name}}</li>
                @if($article->buyer_id)
                    <li class="list-group-item">Comprador: {{$article->buyer->name}}</li>
                @endif
            </ul>
            <div class="card-body">
                <a href="{{route('articles.show',$article)}}" class="card-link">Ver articulo</a>
            </div>
        </div>
    </div>
@endforeach







