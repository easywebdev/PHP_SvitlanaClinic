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
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
        @stack('css')

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <title>{{isset($page->title) ? $page->title : config('app.name', '')}}</title>
    </head>

    <body>
        <header class="s-header">
            <div class="container flex-grid">
                <div class="logo-wraper">
                    <a href="{{ route('index') }}" class="link-base">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </a>    
                </div>

                <div class="flex-grid__item_streach flex-column">
                    <div class="">
                        <h1 class="h1">{{ config('app.name', 'Svitlanaclinic') }}</h1>
                    </div>    

                    <nav class="">
                        @include('mainmenu')
                    </nav>
                </div>
            </div>
        </header>

        <main class="s-main">
            @yield('content')
        </main>

        <footer class="s-footer">
            @include('footer')
        </footer>

        @stack('scripts')
    </body>
</html>