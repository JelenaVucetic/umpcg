<nav class="navbar" style='margin-bottom:0;'>
    <div class="container-fluid myNav">
        <ul class="nav navbar-nav" style="width:55%">
            <div class="navLeft">
                <div class="member">
                    <button> <a href="/member" style="color:white;text-decoration:none;"> POSTANI ČLAN</a></button>
                    <img src="/img/Postani-clan-ikonica.svg" alt="postaniclan">
                </div>
              
                <img src="/img/UMPCG_logo.svg" alt="umpcg">
            </div>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <div style="display:flex; margin-right: 17px;align-items: center;padding-top: 18px;">
                <img src="/img/O nama - ikonica.svg" alt="O nama" style="padding: 0 10px;">
                <li style="color:#F15B5B;font-weight:600;padding-top:5px;">O NAMA</li>
            </div>
        </ul>
    </div>
</nav>

<nav class="navbar">
    <div class="container-fluid" style="background: #EFEFEF; margin: 0 140px;">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

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
              <li><a href="/about">Članovi</a></li>
              <li><a href="/services">Projekti & Aktivnosti</a></li>
              <li><a href="/services">E-Books</a></li>
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