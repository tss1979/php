@extends('layouts.main')

@section('title')
    @parent Админка Пользователей
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
                @forelse($users as $user)
                    <h4>{{ $user->name }}</h4>
                <h4 class="admin">@if ($user->is_admin) Администратор @else Пользователь @endif</h4>

                    @if (!$user->is_admin)
                         <a href="{{ route('admin.profile.change_admin_status', $user) }}">
                         <buton class="btn btn-success" >Назначить администратором</buton>
                        </a>
                    @else
                        <a href="{{ route('admin.profile.change_admin_status', $user) }}">
                        <buton class="btn btn-danger" >Снять статус администратора</buton>
                        </a>
                    @endif
                @empty
                    Нет категорий
                @endforelse
                <hr>
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
