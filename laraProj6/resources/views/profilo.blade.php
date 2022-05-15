@extends('layouts.public')

@section('title', 'Profilo utente')

@section('content')

<script type="text/javascript">
    document.getElementsByClassName("noCurrent")[1].className = "current";
</script>

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Profilo utente</h1>

            <form name="login" action="{{ route('modifica') }}" method="get">
                <p>
                    <input id="nome" size="40" type="text" placeholder="Nome" readonly>
                </p>
                <p>
                    <input id="cognome" size="40" type="password" placeholder="Cognome" readonly>
                </p>
                <p>
                    <!--label for="datanasc">Data di nascita</label-->
                    <input id="datanasc" type="date" title="Data di nascita" readonly>
                </p>
                <p>
                    <input id="username" size="40" type="text" placeholder="Username" readonly>
                </p>
                <p>
                    <input id="passw" size="40" type="password" placeholder="Password" readonly>
                </p>
                <p>
                    <input type="submit" value="Modifica i tuoi dati">
                </p>
            </form>
        </div>
          
        <!--div class="column">
            <h1>Sei già registrato?</h1>
            <button>Vai al Login</button>
        </div-->

    </div>

    </section> <!-- Works Section End-->
    
@endsection