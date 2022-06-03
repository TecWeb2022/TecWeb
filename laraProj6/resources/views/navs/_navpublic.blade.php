<ul id="nav">
    <li class="noCurrent"><a href="{{ route('home') }}" title="Home">Home</a></li>
    <li class="noCurrent"><a href="{{ route('catalogo') }}" title="Catalogo degli alloggi">Catalogo</a></li>
    @guest
    <li class="noCurrent"><a href="{{ route('login') }}" title="Login">Login</a></li>
    <li class="noCurrent"><a href="{{ route('register') }}" title="Registrazione">Registrati</a></li>
    @endguest
    @can('isLoc')
    <li class="noCurrent"><a href="{{ route('profilo') }}" title="Profilo locatario">Profilo</a></li>
    <li class="noCurrent"><a href="{{ route('messaggisticaLoc') }}" title="Messaggistica locatario">Messaggistica</a></li>
    @endcan
    @can('isAdmin')
    <li class="noCurrent"><a href="{{ route('statistiche') }}" title="Statistiche">Statistiche</a></li>
    <li class="noCurrent"><a href="{{ route('gestFaqs') }}" title="Gestione Faqs">Gestione FAQs</a></li>
    @endcan
    @can('isHost')
    <li class="noCurrent"><a href="{{ route('profilo') }}" title="Profilo locatore">Profilo</a></li>
    <li class="noCurrent"><a href="{{ route('messAjaxxx') }}" title="Messaggistica locatore">Messaggistica</a></li>
    <li class="noCurrent"><a href="{{ route('gestioneAcc') }}" title="Offerte locatore">Gestione Offerte</a></li>
    <li class="noCurrent"><a href="{{ route('visualizzaTutteOpzioni') }}" title="Opzioni offerte">Visualizza Opzioni</a></li>
    @endcan
    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>