<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}: @yield('title')</title>

    <!-- Default scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Plugin scripts -->
    <script src="{{ mix('js/plugins.js') }}" defer></script>

    <!-- Each page scripts from this theme -->
    <script src="{{ mix('js/allTheme.js') }}" defer></script>

    <!-- Each module core scripts -->
    <script src="{{ mix('js/all.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Default styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Plugin styles -->
    <link href="{{ mix('css/plugins.css') }}" rel="stylesheet">

    <!-- Each page styles from this theme -->
    <link href="{{ mix('css/allTheme.css') }}" rel="stylesheet">

    <!-- Each module core styles -->
    {{--<link href="{{ mix('css/all.css') }}" rel="stylesheet">--}}
</head>
<body>
    <div id="app">
        <!-- Sidebar navigation section -->
        @include('includes.sidenavbar')

        <div class="page">
            <!-- Header navigation section -->
            @include('includes.navbar')

            <!-- Main content section -->
            @yield('content')

            <!-- Footer section -->
            @include('includes.footer')
        </div>
    </div>
</body>
</html>
