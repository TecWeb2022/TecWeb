<ul id="nav">
    <li class="noCurrent"><a href="{{ route('homeHost') }}" title="Home">Home</a></li>
    <li class="noCurrent"><a href="{{ route('homeHost') }}" title="Catalogo">Catalogo</a></li>
    <li class="noCurrent"><a href="{{ route('gestioneAnn') }}" title="Annunci">Gestione Annunci</a></li>
    <li class="noCurrent"><a href="{{ route('homeHost') }}" title="Chat">Chat</a></li>
    <li class="noCurrent"><a href="{{ route('homeHost') }}" title="Profilo">Profilo</a></li>
    <li class="noCurrent"><a href="{{ route('insertAcc') }}" title="Inserimento offerta">Inserimento offerta</a></li>
    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>