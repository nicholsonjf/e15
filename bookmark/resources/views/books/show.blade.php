<!doctype html>
<html lang='en'>
<head>
    <title>{{ $title }}</title>
    <meta charset='utf-8'>
    <link href='/css/bookmark.css' type='text/css' rel='stylesheet'>
</head>
<body>

    <header>
        <a href='/'><img src='/images/bookmark-logo@2x.png' id='logo' alt='Bookmark Logo'></a>
    </header>

    <section>
        @if($bookFound)
        <h1>{{ $title }}</h1>

        <p>
            Details about this book will go here...
        </p>
        @else
        Book not found dude.
        @endif
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

</body>
</html>
