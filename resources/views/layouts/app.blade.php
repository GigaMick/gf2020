<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js"
            integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,800;0,900;1,400;1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eb48d217fb.js" crossorigin="anonymous"></script>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/main.css?r=').rand(0000,9999) }}" rel="stylesheet">
</head>
<body>
@include('toasts')
@if (! \Request::is('/'))
    <div class="nav py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="/"><img src="{{secure_asset('img/header-logo-green.png')}}" class="nav-logo"></a>
                        </div>
                        <div class="links">
                            @auth
                                @hasrole('cook')
                                <a href="/dashboard" class="px-2">Dashboard</a>
                                <a href="/meals/add-meal-name" class="px-2">Add Meal</a>
                                <a href="/logout" class="px-2">Schedule</a>
                                <a href="/logout" class="px-2">Go Online</a>
                                @endhasrole
                                <a href="/logout" class="btn-hero px-5">Logout</a>
                            @else
                                <a href="/get-started" class="btn-hero px-5">Sign Up</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@yield('content')
@livewireScripts
<section class="footer bg-dark py-5 mt-4">

</section>
</body>
</html>
