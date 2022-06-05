<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>@section('title') - News portal @show</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center py-2 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">News portal</span>
                    </a>

                    @auth
                        @if(Auth::user()->is_admin)
                            <div class="small mx-3">
                                <a href="{{ route('admin.index') }}">Администрирование</a>
                            </div>
                        @endif
                    @endauth

                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('about') }}">О проекте</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('category') }}">Категории новостей</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('news') }}">Все новости</a>
                    </nav>
                    <div class="dropdown">
                        @guest
                            <a class="btn btn-primary" href="{{ route('login') }}">Войти</a>
                        @else
                            <a href="#" role="button" data-bs-toggle="dropdown" class="btn btn-light">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('account') }}">Профиль</a>
                                <a class="dropdown-item" href="{{ route('account.logout') }}">Выход</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        <main class="container">
            @yield('content')
        </main>

        <x-footer/>
    </body>
</html>
