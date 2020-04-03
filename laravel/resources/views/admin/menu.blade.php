
@section('menu')
    <ul class="navbar-nav mr-auto">
        <li><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
        <li><a class="nav-link" href="{{ route('admin.create') }}">Добавить новость</a></li>
    </ul>
@endsection
