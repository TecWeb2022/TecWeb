<ul id="nav">
    <li class="noCurrent"><a href="{{ route('homeAdmin') }}" title="Home Admin">Home</a></li>
    <li class="noCurrent"><a href="{{ route('statistiche') }}" title="Statistche">Statistiche</a></li>
    <li class="noCurrent"><a href="{{ route('gestFaqs') }}" title="Gestione Faqs">Gestione FAQs</a></li>
     @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>

