<nav class="navbar fixed-top navbar-expand-lg @if(request()->path() != '/') dark-navbar @endif">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Booking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @if(!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Front::cms.login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link log-in--link" href="{{ route('Front::cms.register') }}">Sign Up</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Front::cms.profile') }}">My account</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
