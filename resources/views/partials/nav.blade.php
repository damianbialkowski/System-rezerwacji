    <div class="preNav">
        <div class="container-fluid">
            <div class="d-flex justify-content-between socialLinks">
              <div class="web_page_title">
                <p>web_page_title</p>
              </div>
              <div class="social-media d-flex">
                  <p>Social media</p>
                  <a href="mailto:" class="google" title="google"><i class="fab fa-google"></i></a>
                  <a href="" target="_blank" class="facebook" title="facebook"><i class="fab fa-facebook-square"></i></a>
                  <a href="" target="_blank" class="instagram" title="instagram"><i class="fab fa-instagram"></i></a>
                  
              </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" class="navbar-logo" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>	
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/') }}">Strona główna</a>
                </li>
                <!--<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Nba
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mecze</a>
                    <a class="dropdown-item" href="#">1</a>
                    <a class="dropdown-item" href="#">2</a>
                  </div>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="#search" id="searchInput">Szukaj</a>
                  </li>
                @if(\Auth::user())
                <li class="nav-item dropdown nav-item_important">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> {{ (isset(\Auth::user()->username) ? \Auth::user()->username : \Auth::user()->name) }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profil</a>
                    @if(\Auth::user()->role_id == 1)
                      <a class="dropdown-item" href="{{ url('/admin') }}">Panel</a>
                    @endif
                    <a class="dropdown-item" href="#">Ustawienia</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Wyloguj się</a>
                  </div>
                </li>
                @else
                {{-- <li class="nav-item">
                  <a class="nav-link" href="{{ url('login') }}">Logowanie</a>
                </li>
                <li class="nav-item nav-item_important">
                  <a class="nav-link" href="{{ url('register') }}">Rejestracja</a>
                </li> --}}
                @endif
              </ul>
              <div class="searchArea">
                  <div class="d-flex justify-content-around align-items-center">
                    <form action="{{ url('search') }}" method="GET">
                      @csrf
                      <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Wyszukaj...">
                        <div class="input-group-append">
                          <button class="btn" type="submit">Szukaj</button>
                        </div>
                      </div>
                    </form>
                    <span class="close-nav">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>  
            </div>
            
        </div> 
 
    </nav>
