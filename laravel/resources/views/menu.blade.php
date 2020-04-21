@section('menu')
        <li><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
        <li><a class="nav-link" href="{{ route('news.category.index') }}">Разделы новостей</a></li>
        <li><a class="nav-link" href="{{ route('news.index') }}">Все Свежие новости</a></li>
        @if(Auth::user() && Auth::user()->is_admin)
            <li><a class="nav-link" href="{{ route('admin.index') }}">Админка</a></li>
        @endif
@endsection



