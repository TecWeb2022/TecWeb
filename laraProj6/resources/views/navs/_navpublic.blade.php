<ul id="nav">
    <li class="noCurrent"><a href="{{ route('home') }}" title="Home">Home</a></li>
    <li class="noCurrent"><a href="{{ route('catalogo') }}" title="Catalogo degli alloggi">Catalogo</a></li>
    @guest
    <li class="noCurrent"><a href="{{ route('login') }}" title="Login">Login</a></li>
    <li class="noCurrent"><a href="{{ route('register') }}" title="Registrazione">Registrati</a></li>
    @endguest
    @can('isLoc')
    <li class="noCurrent"><a href="{{ route('profiloLoc') }}" title="Profilo utente">Profilo</a></li>
    @endcan
    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>