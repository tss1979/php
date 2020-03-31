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
                <div class="card">
                     @forelse($newsAll as $news)
                         <h4>{{ $news['title'] }}</h4>
                         @if(!$news['isPrivate'])
                            <a href ="{{ route('news.show', $news['id']) }}">Читать новость</a><br>
                         @else
                            Извините, новость доступна только для зарегистрированных пользователей
                         @endif
                    @empty
                         Нет новостей
                    @endforelse
                 </div>
            </div>
        </div>
    </div>
@endsection
