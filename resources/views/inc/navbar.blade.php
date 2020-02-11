<nav class="navbar" style='margin-bottom:0;' id="myNavbar">
    <div class="container-fluid myNav">
        <ul class="nav navbar-nav" id="navUl">
            <div class="navLeft">
                <div class="member">
                    <button> <a href="/member"> POSTANI ČLAN</a></button>
                    <img src="/img/Postani-clan-ikonica.svg" alt="postaniclan">
                </div>

                <a href="/"> <img src="/img/UMPCG_logo.svg" alt="umpcg"></a>
            </div>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <a href="/about" style="text-decoration: none;">
                <div class="aboutUs">
                    <img src="/img/O nama - ikonica.svg" alt="O nama" style="padding: 0 10px;">
                    <li>O NAMA</li>
                </div>
            </a>
        </ul>
    </div>
</nav>

<nav class="navbar">
    <div class="container-fluid" id="mySecondNav">
        <div class="navbar-header" id="myNavbarHeader">

            <!-- Collapsed Hamburger -->
            <div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Branding Image -->
            <div class="search-container">
                <form action="">
                <input type="text" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav pages">
              <li><a href="">Članovi</a></li>
              <li><a href="">Projekti & Aktivnosti</a></li>
              <li><a href="">E-Books</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>