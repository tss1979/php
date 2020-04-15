@extends('layouts.main')

@section('title')
    @parent Админка Категории
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p class="card-text">Админка</p>
                </div>
                @forelse($categories as $category)
                    <h4>{{ $category->name }}</h4>

                    <a href="{{ route('admin.category.edit', $category) }}">
                        <buton class="btn btn-success" >Изменить категорию</buton>
                    </a>
                    <a href="{{ route('admin.category.destroy', $category) }}">
                        <buton class="btn btn-danger" >Удалить категорию</buton>
                    </a>
                @empty
                    Нет категорий
                @endforelse
            </div>
        </div>
    </div>
@endsection
