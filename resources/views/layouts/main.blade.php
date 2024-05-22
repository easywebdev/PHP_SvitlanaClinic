<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{isset($page->keywords) ? $page->keywords : ''}}">
        <meta name="description" content="{{isset($page->description) ? $page->description : ''}}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        @stack('css')

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <title>{{isset($title) ? $title : config('app.name', '')}}</title>
    </head>

    <body>
        <header>
            <div class="container">
                <div class="logo-wraper">
                    <img src="images/logo.png" alt="logo">
                </div>
                <div>
                    <div>
                        <h1>{{ config('app.name', 'Svitlanaclinic') }}</h1>
                    </div>    

                    <nav>
                        @include('mainmenu')
                    </nav>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            @include('footer')
        </footer>

        @stack('scripts')
    </body>
</html>