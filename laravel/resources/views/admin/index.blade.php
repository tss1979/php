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
              </div>
          </div>
    </div>
@endsection
