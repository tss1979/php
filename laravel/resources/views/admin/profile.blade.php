@extends('layouts.main')

@section('title')
    @parent Профиль
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
                        {{ $user->name }}
                        <div class="card_img" style="background-image: url({{ ($news->image) ? asset($news->image) : asset('storage/default.jpg') }})"></div>
                    </div>
                    <div class="card-body">
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text">@if($user->is_admin) Администратор @elseПользователь@endif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
