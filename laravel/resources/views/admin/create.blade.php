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
                        @if ($news->id) Изменить новость@else Добавить новость @endif
                    </div>
                     <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="@if (!$news->id){{ route('admin.create') }}@else{{ route('admin.update', $news) }}@endif">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок новости</label>
                                <div class="col-md-6">
                                    <input class="@if ($errors->has('title')) is-invalid @else is-valid @endif"
                                           id="title" type="text" name="title" value="{{ $news->title ?? old('title') }}">
                                </div>
                                    @if ($errors->has('title'))
                                        <div class="col-md-6 offset-md-4" >
                                            <small id="passwordHelp" class="text-danger">
                                                @foreach ($errors->get('title') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </small>
                                        </div>
                                    @endif
                            </div>

                            <div class="form-group row">
                                <label for="newsCategory" class="col-md-4 col-form-label text-md-right">Категория новости</label>
                                <div class="col-md-6">
                                    <select id="newsCategory" class="form-control @if ($errors->has('category_id')) is-invalid @else is-valid @endif" name="category_id">
                                        @forelse($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                            <h2>Нет категорий</h2>
                                        @endforelse
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <div class="col-md-6 offset-md-4" >
                                            <small id="passwordHelp" class="text-danger">
                                                @foreach ($errors->get('category_id') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Текст новости</label>
                                    <div class="col-md-6">
                                     <textarea id="text" class="form-control @if ($errors->has('text')) is-invalid @else is-valid @endif" rows="3" name="text">
                                         {{ $news->text ?? old('text') }}
                                     </textarea>
                                    </div>
                                @if ($errors->has('text'))
                                    <div class="col-md-6 offset-md-4" >
                                        <small id="passwordHelp" class="text-danger">
                                            @foreach ($errors->get('text') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </small>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <input type="file" class="custom-file-input @if ($errors->has('text')) is-invalid @else is-valid @endif" id="customFile" name="image">
                                    <label class="custom-file-label" for="image">Добавить картинку</label>
                                    @if ($errors->has('image'))
                                        <div class="col-md-6 offset-md-4" >
                                            <small id="passwordHelp" class="text-danger">
                                                @foreach ($errors->get('image') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">

                                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked  @endif
                                        class="form-check-input @if ($errors->has('text')) is-invalid @else is-valid @endif"
                                               type="checkbox" value="1" name="isPrivate">

                                        <label class="form-check-label" for="isPrivate">
                                            Только для зарегистрированных пользователей
                                        </label>
                                        @if ($errors->has('text'))
                                            <div class="col-md-6 offset-md-4" >
                                                <small id="passwordHelp" class="text-danger">
                                                    @foreach ($errors->get('isPrivate') as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" name="add">
                                @if($news->id)Изменить@elseДобавить@endif
                            </button>
                        </form>

@endsection
