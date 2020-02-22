<nav class="navbar" style='margin-bottom:0;' id="myNavbar">
    <div class="container-fluid myNav">
        <div>
            <button> <a href="/become_member"> POSTANI ČLAN</a></button>
            <a href="/become_member">  <img src="/img/Postani-clan-ikonica.svg" alt="postaniclan" style="width: 25px;margin-left: 5px;"></a>
        </div>
        <div>
            <a href="/"> <img src="/img/UMPCG_logo.svg" alt="umpcg"></a>
        </div>
        <a href="/about" style="text-decoration: none;">
            <div class="aboutUs">
                <img src="/img/O nama - ikonica.svg" alt="O nama" id="aboutIco">
                <p>O NAMA</p>
            </div>
        </a>     
    </div>
</nav>

<nav class="navbar">
    <div class='mobile'>
            <form  action="{{ route('search') }}" method='get'>
                <input name="query" id="query" value="{{ request()->input('query') }}" placeholder="Search...">
                <div class="mobileSearch"></div>
            </form> 
    </div>
<div class="container-fluid" id="mySecondNav">
        <div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <div class="desctop">
            <div style="display:flex;">
                <div class="search-container">
                    <form action="{{ route('search') }}" method='get'>
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <input type="text" name="query" id="query" value="{{ request()->input('query') }}">
                    </form>
                </div>
            </div>
            <ul class="nav navbar-nav pages" id="navPages">
              <li><a href="/members">Članovi</a></li>
              <li><a href="/activities">Aktivnosti</a></li>
              <li><a href="">E-Books</a></li>
            </ul> 
            <ul class="nav navbar-nav navbar-right socialMedia">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href=""> <img src="/img/facebook.svg" alt="" style="width:20px;"> </a></li>
                    <li><a href=""> <img src="/img/instagram.svg" alt="" style="width:20px;"> </a></li>
                    <li><a href=""> <img src="/img/twitter.svg" alt="" style="width:20px;"> </a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/showMembers">Članovi</a></li>
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
    </div>
</nav>