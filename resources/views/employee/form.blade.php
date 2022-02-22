@extends('layouts.batoiEmpresa')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if(isset($employee))
                <form method="POST" novalidate action="{{route('employee.update',$employee->id)}}" enctype="multipart/form-data">
                    <h2>Editando</h2>
                    @method('PUT')
                    @else
                        <form method="POST" novalidate action="{{route('employee.store')}}" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <?php if (isset($employe->id)): ?>
                            <div class="form-group">
                                <label for="name">Editando la informacion de usuario:<?= $employee->name ?></label>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="title">Nombre de usuario:</label>
                                <input name="name" type="text" class="form-control " id="title" aria-describedby="titleHelp" placeholder="nombre usuario" value="{{old('name')??(isset($employee)?$employee->name:'')}}">
                                @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="title">Email:</label>
                                <input name="email" type="text" class="form-control " id="title" aria-describedby="titleHelp" placeholder="email" value="{{old('email')??(isset($employee)?$employee->email:'')}}">
                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="PhotoFile">Foto de Usuario</label>
                                <input type="file" name="photo" class="form-control-file " id="PhotoFile" value="{{old('photo')??(isset($employee)?asset($employee->image):'')}}">
                                @if(isset($employee))
                                Foto Actual:<img src="{{asset($employee->imagen)}}" width="100px"  @class('rounded-circle') alt="sin foto">
                                @endif
                            @if ($errors->has('photo'))
                                    <div class="text-danger">
                                        {{ $errors->first('photo') }}
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
        </div>
    </section>
@endsection
