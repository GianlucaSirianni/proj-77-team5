<!doctype html>
<html data-bs-theme="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- font-awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- !ricordiamoci di mettere bootstrap sopra il css --}}
    {{-- bootstrap --}}

    {{-- icone - bootstrap --}}
    <link href="/node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- font-awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body data-bs-theme="light">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container px-3">
                <div class="logo-cont">
                    <a href="{{ url('/') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}

                        <img src="{{ asset('img/logo-deliveboo-nav.png')}}" alt="logo">
                    </a>
                </div>

                <div class="d-none d-lg-block ">
                    <a href="/" class="navbar-brand ps-2 fs-4 text-orange fw-bold">
                        DeliveBoo
                    </a>
                </div>

                <div class="js_darkmode pt-1 c-pointer">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </div>

                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex align-items-center">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item text-dark">
                                <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="d-md-none d-lg-block text-decoration-none me-5 text-dark fw-bold w-100"
                                href="{{ route('admin.restaurants.index') }}">
                                {{ __('Ristorante') }}
                            </a>
                            <a class="d-md-none d-lg-block text-decoration-none me-5 text-dark fw-bold"
                                href="{{ route('admin.dishes.index') }}">Menu
                            </a>
                            <a class="d-md-none d-lg-block text-decoration-none text-dark fw-bold" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <li class="nav-item dropdown d-sm-block d-lg-none">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.restaurants.index') }}">
                                        {{ __('Ristorante') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.dishes.index') }}">Menu
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

        <main class="container pt-4">
            @yield('content')
        </main>
    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
