<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Helpdesk</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(Auth::check())
                @if( Auth::user()->hasrole('declarant') )
                <li class="nav-item">
                    <a class="{{ Request::is('tasks/create') ? "nav-link active" : "nav-link" }}" href="/tasks/create">Dodaj zadanie</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="{{ Request::is('tasks') ? "nav-link active" : "nav-link" }}" href="/tasks">Zobacz zadania</a>
                </li>
            @endif
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Zaloguj</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Zarejestruj</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<br>

