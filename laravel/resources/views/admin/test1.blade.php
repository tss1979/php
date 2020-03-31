@extends('layouts.main')

@section('title')
    @parent Админка Тест 1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p class="card-text">Тест 1</p>
                </div>
            </div>
        </div>
    </div>
@endsection
