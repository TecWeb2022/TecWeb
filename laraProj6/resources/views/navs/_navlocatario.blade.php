<ul id="nav">
    <li class="noCurrent"><a href="{{ route('home') }}" title="Home Locatario">Home</a></li>
    <li class="noCurrent"><a href="{{ route('catalogoLoc') }}" title="Catalogo alloggi">Catalogo</a></li>
    <li class="noCurrent"><a href="{{ route('profilo') }}" title="Profilo locatario">Profilo</a></li>
    <li class="noCurrent"><a href="{{ route('messaggisticaLoc') }}" title="Messaggistica locatario">Messaggistica</a></li>
    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>