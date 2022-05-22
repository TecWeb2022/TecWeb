@extends('layouts.public')

@section('title', 'Modifica profilo utente')

@section('content')

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Profilo utente</h1>

            <form name="login">
                <p>
                    <input id="nome" size="40" type="text" placeholder="Nome" autofocus>
                </p>
                <p>
                    <input id="cognome" size="40" type="password" placeholder="Cognome">
                </p>
                <p>
                    <!--label for="datanasc">Data di nascita</label-->
                    <input id="datanasc" type="date" title="Data di nascita">
                </p>
                <p>
                    <input id="username" size="40" type="text" placeholder="Username">
                </p>
                <p>
                    <input id="passw" size="40" type="password" placeholder="Password">
                </p>
                <p>
                    <input type="submit" value="Salva">
                </p>
            </form>
        </div>
          
        <!--div class="column">
            <h1>Sei già registrato?</h1>
            <button>Vai al Login</button>
        </div-->

    </div>

    </section> <!-- Works Section End-->