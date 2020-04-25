
@section('menu')
        <li><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
        <li><a class="nav-link" href="{{ route('admin.category.index') }}">Категории</a></li>
        <li><a class="nav-link" href="{{ route('admin.index') }}">Новости</a></li>
        <li><a class="nav-link" href="{{ route('admin.profile.index') }}">Пользователи</a></li>
        <li><a class="nav-link" href="{{ route('admin.profile.edit') }}">Изменить профиль</a></li>
        <li><a class="nav-link" href="{{ route('admin.resource.index') }}">Ресурсы</a></li>
        <li><a class="nav-link" href="{{ route('admin.resource.create') }}">Добавить Ресурс</a></li>
        <li><a class="nav-link" href="{{ route('admin.parser') }}">Получить новости</a></li>
        <li><a class="nav-link" href="{{ route('admin.create') }}">Добавить новость</a></li>
        <li><a class="nav-link" href="{{ route('admin.category.create') }}">Добавить категорию</a></li>
@endsection
