<div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark arch" id="scumcoin_navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img id="logo" src="/s_circle_blue.png" width="40" height="40" alt="">
            </a>
            <button class="navbar-toggler arch" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" id="navbar_toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @auth
                <ul class="navbar-nav mb-2 mb-md-0 me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ sprintf("/user/%s", Auth::user()->pubkey) }}">{{ Auth::user()->email }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ Auth::user()->balance }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ sprintf("/user/%s/pay", Auth::user()->pubkey) }}">Pay</a></li>
                            <li><a class="dropdown-item" href="/buy">Buy</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/change">Change password</a></li>
                            <li><a class="dropdown-item" href="/logout">Log out</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->power === "admin")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-toggle="dropdown" aria-expanded="false">
                            Administration
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                            <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
                @endauth

                @guest
                <form class="d-flex ml-auto" action="/login">
                    @csrf
                    <button class="btn btn-outline-success arch" type="submit" id="login_button_nav" style="margin-right: 10px">Login</button>
                    <button class="btn btn-outline-success arch" type="submit" id="register_button_nav" formaction="/register">Register</button>
                </form>
                @endguest

                <div class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLang" role="button" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('flags/' . App::getLocale() . '.svg') }}" width="30" height="20" alt="{{ App::getLocale() }}">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownLang">
                            @foreach(config('app.locales') as $lang => $language)
                            <li>
                                <a class="dropdown-item" href="{{ route('language.switch', $lang) }}">
                                    <img src="{{ asset('flags/' . $lang . '.svg') }}" width="30" height="20" alt="{{ $language }}"> {{ $language }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
</div>
