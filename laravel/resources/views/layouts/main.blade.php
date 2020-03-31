<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')Страница @show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <div class="container">
             <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                 @yield('menu')
              </nav>
             <main class="py-4">
                 @yield('content')
             </main>
        </div>
    </div>
</body>
</html>
