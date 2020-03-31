@extends('layouts.main')

@section('title')
    @parent Админка Меню
@endsection

@section('menu')
    <a href="<?=route('Home')?>">Главная</a>
    <a href="<?=route('admin.test1')?>">Тест 1</a>
    <a href="<?=route('admin.test2')?>">Тест 2</a>
@endsection
