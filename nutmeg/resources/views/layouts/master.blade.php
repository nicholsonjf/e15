<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', 'Nutmeg')</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='/css/nutmeg.css' rel='stylesheet'>
    @yield('head')
</head>
<body>
    <div class='container-fluid'>
        <div class="row flex-xl-nowrap">
            <div class="col-12 col-md-3 col-xl-2 bd-sidebar"></div>
            <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
                @include('includes/nav')
                <header class='pt-4'>
                    <a href='/'><img src='/images/empty-recipe.jpg' id='logo' alt='nutmeg logo' class='img-fluid rounded-sm'></a>
                </header>

                <section>
                    @yield('content')
                </section>
                <footer>
                    &copy; {{ date('Y') }}
                </footer>
            </main>
        </div>
    </div>
</body>
</html>
