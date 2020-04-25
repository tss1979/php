@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                     <div class="card-header">
                         {{ $news->title }}
                         <div class="card_img" style="background-image: url({{ ($news->image) ? asset($news->image) : asset('storage/default.jpg') }})"></div>
                     </div>
                          <div class="card-body">
                              @if(!$news->isPrivate)
                                <a href="{{ route('news.category.show', $category->slug) }}" class="card-title">{{ $category->name }}</a>
                                <p class="card-text">{!! $news->text !!} </p>
                                  <a href="{{ route('news.index') }}" class="btn btn-primary">Все новости</a>
                              @else
                                Извините, новость доступна только для зарегистрированных пользователей
                              @endif
                          </div>
                </div>
            </div>
        </div>
    </div>
@endsection

