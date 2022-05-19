<ul id="nav">
    <li class="noCurrent"><a href="{{ route('home') }}" title="Home">Home</a></li>
    <li class="noCurrent"><a href="{{ route('') }}" title="Catalogo">Catalogo</a></li>
    <li class="noCurrent"><a href="{{ route('') }}" title="Chat">Chat</a></li>
    <li class="noCurrent"><a href="{{ route('') }}" title="Logout">Logout</a></li>
    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>