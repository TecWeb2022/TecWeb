<ul id="nav">
    <li class="noCurrent"><a href="{{ route('home') }}" title="Home">Home</a></li>
    <li class="noCurrent"><a href="{{ route('catalogo') }}" title="Catalogo">Catalogo</a></li>
    <li class="noCurrent"><a href="{{ route('profilo') }}" title="Profilo locatore">Profilo</a></li>
    <li class="noCurrent"><a href="{{ route('messaggisticaAjax') }}" title="Messaggistica locatore">Messaggistica</a></li>
    <li class="noCurrent"><a href="{{ route('gestioneAcc') }}" title="Offerte locatore">Gestione Offerte</a></li>
    <li class="noCurrent"><a href="{{ route('visualizzaTutteOpzioni') }}" title="Opzioni offerte">Visualizza Opzioni</a></li>

    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>