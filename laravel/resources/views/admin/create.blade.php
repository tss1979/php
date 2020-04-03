@extends('layouts.main')

@section('title')
    @parent Добавления новостей
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новость</div>
                     <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            <div class="form-group row">
                                <label for="author_name" class="col-md-4 col-form-label text-md-right">Автор новости</label>
                                <div class="col-md-6">
                                    <input id="author_name" name="author_name" type="text">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newsCategory" class="col-md-4 col-form-label text-md-right">Категория новости</label>
                                <div class="col-md-6">
                                    <select id="newsCategory" class="form-control" name="category">
                                        @forelse($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @empty
                                             <h2>Нет категорий</h2>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок новости</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" name="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Текст новости</label>
                                    <div class="col-md-6">
                                     <textarea id="text" class="form-control" rows="3" name="text"></textarea>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="isPrivate">

                                        <label class="form-check-label" for="isPrivate">
                                            Только для зарегистрированных пользователей
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить новость</button>
                        </form>

@endsection
