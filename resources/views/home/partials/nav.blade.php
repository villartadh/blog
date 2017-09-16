<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">JVILLARTA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav pull-left">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            <ul class="clearfix"></ul>
            @if (Route::has('login'))
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}"><i class="fa fa-tachometer" aria-hidden="true"></i>
                                &nbsp;<small>DASHBOARD</small></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}"><small>Login</small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}"><small>Register</small></a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</nav>