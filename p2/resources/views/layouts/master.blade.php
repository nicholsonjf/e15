<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', 'Population')</title>
    <meta charset='utf-8'>

    <link href='/css/population.css' rel='stylesheet'>

    @yield('head')
</head>
<body>
<h1>Population Guesser!</h1>
<header>
    <a href='/'><img src='/images/earth.png' id='logo' alt='Population Logo'></a>
</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

</body>
</html>
