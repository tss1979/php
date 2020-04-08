@extends('layouts.main')

@section('title')
    @parent Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @php phpinfo(); @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-title">Добро пожаловать на наш новостной портал</h1>
                    <p class="card-text">Флагманский сайт медиагруппы — стал первым из новостных ресурсов рунета, вошедших в топ-20 Европы</p>
                 </div>
            </div>
        </div>
    </div>
@endsection
