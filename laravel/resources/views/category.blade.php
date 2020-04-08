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
                        <a class="cat-text" href ="{{ route('news.category.show', $category->slug) }}">
                            <div class="card_img" style="background-image: url({{ asset($category->category_image) }}"></div>
                            {{ $category->name }}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


