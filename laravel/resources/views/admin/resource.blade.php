@extends('layouts.main')

@section('title')
    @parent Админка
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
                @forelse($resources as $resource)
                    <h4>{{ $resource->link }}</h4>
                    <a href="{{ route('admin.resource.destroy', $resource) }}">
                        <buton class="btn btn-danger" >Удалить</buton>
                    </a>
                @empty
                    Нет категорий
                @endforelse
            </div>
        </div>
    </div>
@endsection