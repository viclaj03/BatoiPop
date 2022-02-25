@extends('layouts.batoiEmpresa')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form method="get" action="{{route('article.search')}}">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control " id="name"  placeholder="Buscar por nombre" required >
                </div>
            </form>
            <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-12 row-cols-xl-12 justify-content-center">
                    @include('article.articleTable')
            </div>

        </div>
    </section>
    <div class="d-flex justify-content-center">
        {!! $articles->links() !!}
    </div>

@endsection
