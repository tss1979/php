@extends('layouts.main')

@section('title')
    @parent Добавления новостей
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if ($category->id) Изменить категорию@elseДобавить категорию@endif
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.category.change', $category) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Заголовок категории</label>
                                <div class="col-md-6">
                                    <input class="form-control @if ($errors->has('name')) is-invalid @else is-valid @endif" id="name"
                                           type="text" name="name" value="{{ $category->name ?? old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="col-md-12" >
                                            <small id="passwordHelp" class="text-danger">
                                                @foreach ($errors->get('name') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">Псевдоним категории</label>
                                <div class="col-md-6">
                                     <input type="text" id="slug" class="form-control @if ($errors->has('slug')) is-invalid @else is-valid @endif"
                                            name="slug" value="{{ $category->slug ?? old('slug') }}">
                                    @if ($errors->has('slug'))
                                        <div class="col-md-12" >
                                            <small id="passwordHelp" class="text-danger">
                                                @foreach ($errors->get('slug') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <input type="file" class="custom-file-input @if ($errors->has('category_image')) is-invalid @else is-valid @endif"
                                           id="customFile" name="category_image">
                                    @if ($errors->has('category_image'))
                                        <div class="col-md-12" >
                                            <small id="passwordHelp" class="text-danger">
                                                @foreach ($errors->get('category_image') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </small>
                                        </div>
                                    @endif
                                    <label class="custom-file-label" for="category_image">Добавить картинку</label>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary" name="add_category">
                                @if ($category->id) Изменить @else Добавить @endif
                            </button>
                        </form>

@endsection
