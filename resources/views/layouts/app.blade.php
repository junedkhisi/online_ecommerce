<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('Online Shop', ' Online Shop') }}</title>

    <!-- Logo -->
    <link rel="icon"
    href="data:image/png;base64,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"
    type="image/x-icon" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!--- Fa Fa icon Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!--- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <div class="border border-danger-success"> --}}
                    <b>
                        <a class="navbar-brand text-danger" href="{{ url('/dashboard') }}">
                            {{ config('Online Shopp', 'Online Shopp') }}
                            {{-- <img  src="/public/logo/eCommerce_logo.png"> --}}
                    </a>
                </b>
                {{-- </div> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">




                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="navbar-brand" href="{{ url('/show-product-data') }}">
                                Product
                            </a>
                            <a class="navbar-brand" href="{{ url('/phone-list') }}">
                                List
                            </a>
                            <a class="navbar-brand" href="{{ url('/show-brand') }}">
                                Brand
                            </a>
                            <a class="navbar-brand" href="{{ url('/shopping-cart') }}">
                                Cart
                            </a>
                            <a class="navbar-brand" href="{{ url('/history-transaction') }}">
                                History
                            </a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
