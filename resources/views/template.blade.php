<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('main') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Главная</a></li>
                @if(Auth::check())
                    @if(Auth::user()->role === "admin")
                        <li class="nav-item"><a href="{{ route('authors.index') }}" class="nav-link {{ request()->is('authors*') ? 'active' : '' }}">Авторы</a></li>
                        <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link {{ request()->is('books*') ? 'active' : '' }}">Книги</a></li>
                        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">Пользователи</a></li>
                    @endif
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Выйти</a></li>
                    <li class="nav-item"><a class="nav-link">👤 {{ Auth::user()->name }}</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link {{ request()->is('login') ? 'active' : '' }}">Авторизоваться</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link {{ request()->is('register') ? 'active' : '' }}">Регистрироваться</a></li>
                @endif
            </ul>
        </header>
    </div>
</header>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    <div class="container fixed-bottom">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">© 2021 Company, Inc</p>
        </footer>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

