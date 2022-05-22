@extends('layouts.locatario')

@section('title', 'Profilo utente')

@section('content')

<script type="text/javascript">
    currNavBar(2);
</script>

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Profilo utente</h1>

            <form name="profilo" action="{{ route('modificaLoc') }}" method="post">
                <p>
                    <label for="nome">Nome</label>
                    <input id="nome" size="40" type="text" placeholder="{{ auth()->user()->nome }}" disabled>
                </p>
                <p>
                    <label for="cognome">Cognome</label>
                    <input id="cognome" size="40" type="text" placeholder="{{ auth()->user()->cognome }}" disabled>
                </p>
                <p>
                    <label for="datanasc">Data di nascita</label>
                    <input id="datanasc" type="text" placeholder="{{ auth()->user()->data_nasc }}" title="Data di nascita" disabled>
                </p>
                <p>
                    <label for="username">Username</label>
                    <input id="username" size="40" type="text" placeholder="{{ auth()->user()->username }}" disabled>
                </p>
                <p>
                    <input id="passw" size="40" type="password" placeholder="********" disabled>
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