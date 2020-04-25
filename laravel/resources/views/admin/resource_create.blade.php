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
                        Добавить
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.resource.saveData') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Ссылка на ресурс</label>
                                <div class="col-md-6">
                                    <input class="form-control @if ($errors->has('name')) is-invalid @else is-valid @endif" id="link"
                                           type="text" name="link" value="{{ $resource->link ?? old('link') }}">
                                    @if ($errors->has('link'))
                                        <div class="col-md-12" >
                                            <small id="passwordHelp" class="text-danger">
                                                @foreach ($errors->get('link') as $error)
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
                                           name="slug" value="{{ $resource->slug ?? old('slug') }}">
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



                            <button type="submit" class="btn btn-primary" name="add_resource">
                               Добавить
                            </button>
                        </form>

@endsection
