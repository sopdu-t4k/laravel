<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>@section('title') - News portal @show</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center py-2 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">News portal</span>
                    </a>

                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('about') }}">О проекте</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('category') }}">Категории новостей</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('news') }}">Все новости</a>
                    </nav>
                </div>
            </div>
        </header>

        <main class="container">
            @yield('content')
        </main>

        <x-footer/>
    </body>
</html>
