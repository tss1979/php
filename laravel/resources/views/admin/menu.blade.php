
@section('menu')
    <ul class="navbar-nav mr-auto">
        <li><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
        <li><a class="nav-link" href="{{ route('admin.category.index') }}">Категории</a></li>
        <li><a class="nav-link" href="{{ route('admin.index') }}">Новости</a></li>
        <li><a class="nav-link" href="{{ route('admin.create') }}">Добавить новость</a></li>
        <li><a class="nav-link" href="{{ route('admin.category.create') }}">Добавить категорию</a></li>
    </ul>
@endsection
