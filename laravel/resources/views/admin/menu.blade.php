
@section('menu')
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
        <li><a class="nav-link" href="{{ route('admin.category.index') }}">Категории</a></li>
        <li><a class="nav-link" href="{{ route('admin.index') }}">Новости</a></li>
        <li><a class="nav-link" href="{{ route('admin.profile.index') }}">Пользователи</a></li>
        <li><a class="nav-link" href="{{ route('admin.profile.edit') }}">Изменить профиль</a></li>
        <li><a class="nav-link" href="{{ route('admin.create') }}">Добавить новость</a></li>
        <li><a class="nav-link" href="{{ route('admin.category.create') }}">Добавить категорию</a></li>

    </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
    </div>
@endsection
