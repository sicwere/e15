<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <!--<link href='/css/bookmark.css' rel='stylesheet'>-->

    @yield('head')
</head>
<body>

<header>
    <h1>
        @yield('heading')
    </h1>
</header>

<main>
    @yield('content')
</main>

<footer>
    @yield('copyright')
</footer>

</body>
</html>