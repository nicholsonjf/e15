<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <link href='/css/bookmark.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

<header>
    <a href='/'><img src='/images/bookmark-logo@2x.png' id='logo' alt='bookmark Logo'></a>
</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

</body>
</html>
