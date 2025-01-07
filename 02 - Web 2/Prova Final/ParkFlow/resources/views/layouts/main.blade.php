<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="/css/index.css">
        @yield('header')

        <script src="/js/index.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body >
        <header>
            <a class="logo-container" href="/">
                <img src="/img/logo.png" alt="logo.png" width="30">
                <img src="/img/extended_logo.svg" alt="extendedLogo" width="100">
            </a>
            <a href="/login">
                <h1>
                    LogOut
                </h1>
            </a>
        </header>
        <nav>
            <section>
                <a href="/login"><span class="material-symbols-outlined">apartment</span><p>Companies</p></a>
                <a href="/users"><span class="material-symbols-outlined">group</span><p>Users</p></a>
                <a href="/userDetails"><span class="material-symbols-outlined">monitoring</span><p>User Details</p></a>
                <a href="/login"><span class="material-symbols-outlined">paid</span><p>Plans</p></a>
            </section>

            <section>
                <a><span class="material-symbols-outlined">settings</span><p>Settings</p></a>
            </section>

        </nav>
        <main>
            @yield('content')
        </main>

        <footer>
            <p>ParkFlow &copy; 2024</p>
        </footer>
    </body>
</html>
