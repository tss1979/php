@extends('layouts.main')

@section('title')
    @parent Новостей
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    @foreach($categories as $category)
                        <a class="cat-text" href ="{{ route('news.category.show', $category->slug) }}">
                            <button class="btn btn-info">{{ $category->name }}</button></a>
                    @endforeach
                </div>
                <div class="card">
                     @forelse($newsAll as $news)
                         <h4>{{ $news->title }}</h4>
                    <div class="card_img" style="background-image: url({{ ($news->image) ? asset($news->image) : asset('storage/default.jpg') }})"></div>
                         @if(!$news->isPrivate)
                            <a href ="{{ route('news.show', $news) }}">Читать новость</a><br>
                         @else
                            Извините, новость доступна только для зарегистрированных пользователей
                         @endif
                    @empty
                         Нет новостей
                    @endforelse
                         <hr>
                         {{ $newsAll->links() }}
                 </div>
            </div>
        </div>
    </div>
@endsection
