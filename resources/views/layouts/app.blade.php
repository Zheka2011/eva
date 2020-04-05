<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        @include('inc.messages')

        @guest
            @yield('content')
        @else
            <div class="row">

                <div class="col-md-2 d-md-block bg-light mt-5">

                    @include('inc.aside')

                </div>

                <div class="col-md-10 d-md-block bg-light mt-5">
                    @yield('content')
                </div>
            </div>
        @endguest

    </div>
</body>
</html>
