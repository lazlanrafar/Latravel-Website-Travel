<nav class="navbar navbar-expand-lg navbar-light p-3 px-md-4 mb-3 bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ url('/assets/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-md-4 active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-4" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-4" href="#">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-4" href="#">Teams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-4" href="/empty.html">Empty</a>
                </li>
            </ul>
            <div class="d-flex">
                @guest
                    <form action="{{ url('login') }}" method="GET">
                        @csrf
                        <button class="btn btn-masuk text-light" type="submit">Login</button>
                    </form>
                @endguest

                @auth
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-masuk text-light" type="submit">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>