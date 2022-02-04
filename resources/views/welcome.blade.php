@extends('layouts.batoiEmpresa')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-12 row-cols-xl-12 justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Bienvenido {{Auth::user()->name}}</h2>
                <img src="https://srv.latostadora.com/canvas3D.dll/dont_forget_youre_here_forever_-_no_lo_olvide_esta_aqui_para_siempre--i:135623196063601356231;s:D_D1;w:700;h:520;k:2e01db8efe56aae63981081acdc2bc51.jpg">
            </div>
        </div>
    </div>
</section>
@endsection
