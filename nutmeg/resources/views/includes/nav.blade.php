<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <a class="navbar-brand" href="/home">Nutmeg</a>
        @if(Auth::user())
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/shopping-lists">Shopping Lists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/collections">Collections</a>
            </li>
        </ul>
        @endif
        <div class='navbar-nav ml-auto'>
            @if(!Auth::user())
                <a href='/login' class="nav-item nav-link">Login</a>
            @else
                <form class="form-inline" method='POST' id='logout' action='/logout'>
                    {{ csrf_field() }}
                    <a href='#' class="nav-item nav-link" onClick='document.getElementById("logout").submit();'>
                        Logout {{ $user->name }}
                    </a>
                </form>
            @endif
        </div>
    </div>
</nav>
