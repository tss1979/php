@extends('layouts.main')

@section('title')
    @parent Разделов Новостей
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($categoryAll as $category)
                         <a href ="{{ route('news.category.show', $category['slug']) }}">{{ $category['name'] }}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


