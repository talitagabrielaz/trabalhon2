<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Artesanal') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Lato', sans-serif;
            background-color: #faf9f7;
            color: #3a3a3a;
        }

        /* NAVBAR */
        .navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e8e0d5;
            padding: 16px 0;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #5c4a32 !important;
            letter-spacing: 1px;
        }

        .navbar-brand::before {
            content: "✦ ";
            font-size: 0.9rem;
            color: #b8965a;
        }

        .nav-link {
            color: #5c4a32 !important;
            font-size: 0.9rem;
            font-weight: 400;
            letter-spacing: 0.5px;
            padding: 6px 16px !important;
            transition: color 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            color: #b8965a !important;
            font-weight: 700;
        }

        .dropdown-menu {
            border: 1px solid #e8e0d5;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .dropdown-item {
            color: #5c4a32;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            background-color: #faf3e8;
            color: #b8965a;
        }

        /* MAIN */
        main {
            min-height: calc(100vh - 70px);
            padding: 40px 0;
        }

        /* CARDS */
        .card {
            border: 1px solid #e8e0d5;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
            background: #ffffff;
        }

        .card-header {
            background-color: #faf3e8 !important;
            border-bottom: 1px solid #e8e0d5;
            font-family: 'Playfair Display', serif;
            color: #5c4a32;
            font-size: 1.1rem;
            border-radius: 12px 12px 0 0 !important;
            padding: 16px 20px;
        }

        /* BUTTONS */
        .btn-primary {
            background-color: #5c4a32 !important;
            border-color: #5c4a32 !important;
            border-radius: 8px;
            font-size: 0.9rem;
            padding: 8px 20px;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #b8965a !important;
            border-color: #b8965a !important;
        }

        .btn-secondary {
            background-color: #e8e0d5 !important;
            border-color: #e8e0d5 !important;
            color: #5c4a32 !important;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .btn-danger {
            border-radius: 8px;
            font-size: 0.9rem;
        }

        /* TABLE */
        .table {
            font-size: 0.9rem;
        }

        .table thead th {
            background-color: #faf3e8;
            color: #5c4a32;
            font-weight: 700;
            border-bottom: 2px solid #e8e0d5;
            font-family: 'Playfair Display', serif;
        }

        .table tbody tr:hover {
            background-color: #faf9f7;
        }

        /* FORMS */
        .form-control, .form-select {
            border: 1px solid #e8e0d5;
            border-radius: 8px;
            font-size: 0.9rem;
            padding: 10px 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #b8965a;
            box-shadow: 0 0 0 0.2rem rgba(184, 150, 90, 0.15);
        }

        .form-label {
            color: #5c4a32;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.3px;
        }

        /* ALERTS */
        .alert-success {
            background-color: #f0f7f0;
            border-color: #c3e6cb;
            color: #2d6a4f;
            border-radius: 8px;
        }

        .alert-danger {
            background-color: #fff5f5;
            border-color: #f5c6cb;
            color: #8b2635;
            border-radius: 8px;
        }

        /* BADGE */
        .badge {
            border-radius: 6px;
            font-weight: 400;
            font-size: 0.8rem;
            padding: 5px 10px;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 20px;
            color: #a0856a;
            font-size: 0.8rem;
            border-top: 1px solid #e8e0d5;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Artesanal') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('produtos.*') ? 'active fw-bold' : '' }}" href="{{ route('produtos.index') }}">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('categorias.*') ? 'active fw-bold' : '' }}" href="{{ route('categorias.index') }}">Categorias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('landing') }}" target="_blank">Ver site público</a>
                            </li>
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nome }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            ✦ {{ config('app.name', 'Artesanal') }} &mdash; Feito com cuidado
        </footer>
    </div>
</body>
</html>