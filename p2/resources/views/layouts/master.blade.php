<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', 'Population')</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='/css/population.css' rel='stylesheet'>

    @yield('head')
</head>
<body>
    <div class='container-fluid'>
        <div class="row flex-xl-nowrap">
            <div class="col-12 col-md-3 col-xl-2 bd-sidebar"></div>
            <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
                <div class='row mb-n2 ml-0'>
                    <h1>The Population Game!</h1>
                </div>
                <small class='text-muted'>
                        Developed by:
                            <a href='https://github.com/nicholsonjf' class='text-secondary'>
                                <u>James Nicholson</u>
                            </a>
                </small>
                <header class='pt-4'>
                    <a href='/'><img src='/images/geo-world.jpg' id='logo' alt='Population Logo' class='img-fluid rounded-sm'></a>
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
