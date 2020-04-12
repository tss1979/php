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
                  @forelse($newsAll as $news)
                      <h4>{{ $news->title }}</h4>
                          <a href ="{{ route('news.show', $news) }}">
                              <buton class="btn btn-primary" >Читать новость</buton>
                          </a>
                         <a href="{{ route('admin.edit', $news) }}">
                            <buton class="btn btn-success" >Изменить новость</buton>
                         </a>
                          <a href="{{ route('admin.destroy', $news) }}">
                          <buton class="btn btn-danger" >Удалить новость</buton>
                          </a>
                  @empty
                      Нет новостей
                  @endforelse
                  <hr>
                  {{ $newsAll->links() }}
              </div>
          </div>
    </div>
@endsection
