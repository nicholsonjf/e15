<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', 'Population')</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
