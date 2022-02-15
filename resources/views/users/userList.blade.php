@extends('layouts.batoiEmpresa')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <form method="get" action="{{route('user.search')}}">
            @csrf
            <div class="form-group">
                <input name="name" type="text" class="form-control " id="name"  placeholder="Buscar por nombre" required >
            </div>
            <div class="form-group">
                Buscar por
                <select name="tipe" id="tipe">
                    <option value="email">Email</option>
                    <option value="name">Nombre</option>
                </select>
            </div>
        </form>
        <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-12 row-cols-xl-12 justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">

                @include('users.userTable')

                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
