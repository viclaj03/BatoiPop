@extends('layouts.batoiEmpresa')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if(isset($category))
                <form method="POST" novalidate action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                    <h2>Editando</h2>
                    @method('PUT')
                    @else
                        <form method="POST" novalidate action="{{route('category.store')}}" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <?php if (isset($category->id)): ?>
                            <div class="form-group">
                                <label for="name">Editando la categoria:<?= $category->name ?></label>
                                <input name="id" type="hidden" value="<?= $category->id ?>">
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input name="name" type="text" class="form-control " id="title" aria-describedby="titleHelp" placeholder="Enter Title" value="{{old('name')??(isset($category)?$category->name:'')}}">
                                <small id="nameHelp" class="form-text text-muted">Nombre del  la categoria</small>
                                @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label><br>
                                <textarea name="description" > {{old('description')??(isset($category)?$category->desc:'')}}</textarea>
                                <small id="nameHelp" class="form-text text-muted">descripcion de la categoria</small>
                                @if ($errors->has('description'))
                                    <div class="text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="PhotoFile">Foto categoria</label>
                                <input type="file" name="photo" class="form-control-file " id="PhotoFile" value="{{old('photo')??(isset($category)?asset($category->image):'')}}">
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
