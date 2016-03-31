<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                WEBKAT
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
                
                <!-- @include('category')-->
                
                <li class="dropdown"><a href="{{ url('/websites') }}" class="dropdown-toggle" data-toggle="dropdown">Kategorien<b class="caret"></b></a>
                	<ul class="dropdown-menu">
                        <li><a href="{{ url('/beruf-und-karriere') }}">Beruf und Karriere</a></li>
                        <li><a href="{{ url('/finanzen-und-versicherung') }}">Finanzen und Versicherung</a></li>
                        <li><a href="{{ url('/firmen-und-vereine') }}">Firmen und Vereine</a></li>
                        <li><a href="{{ url('/flora-und-fauna') }}">Flora und Fauna</a></li>
                        <li><a href="{{ url('/hobby-und-freizeit') }}">Hobby und Freizeit</a></li>
                        <li><a href="{{ url('/kaufen-und-verkaufen') }}">Kaufen und Verkaufen</a></li>
                        <li><a href="{{ url('/kunst-und-kultur') }}">Kunst und Kultur</a></li>
                        <li><a href="{{ url('/technik-und-mobiles') }}">Technik und Mobiles</a></li>
                        <li><a href="{{ url('/urlaub-und-reisen') }}">Urlaub und Reisen</a></li>
                        <li><a href="{{ url('/wissenschaft-und-forschung') }}">Wissenschaft und Forschung</a></li>
                        <li><a href="{{ url('/wohnen-und-leben') }}">Wohnen und Leben</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/addwebsite') }}">Webseite eintragen</a></li>
                <li><a href="{{ url('/impressum') }}">Impressum</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        	<li><a href="{{ url('/mysites') }}"><i class="fa fa-btn"></i>Meine Seiten</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

