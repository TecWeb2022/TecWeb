<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>HouStudent | Contratto</title>
    </head>
    
    <body>
        <h1>Contratto di locazione</h1>
        <h2>Oggetto del contratto</h2>
        <p>
            Tipologia: @include('helpers/tipologiaAcc', ['tipologia' => $acc->tipologia])<br>
            Nome: {{ $acc->nome }}<br>
            Indirizzo: {{ $acc->via }} {{ $acc->num_civ }} {{ $acc->citta }} {{ $acc->prov }}<br>
            Inizio disponibilità: {{ $acc->inizio_disp }}<br>
            Fine disponibilità: {{ $acc->fine_disp }}<br>
            Canone: {{ $acc->canone }}
        </p>
        <h2>Dati locatore</h2>
        <p>
            Nome: {{ Auth::user()->nome }}<br>
            Cognome: {{ Auth::user()->cognome }}<br>
            Data di nascita: {{ Auth::user()->data_nasc }}
        </p>
        <h2>Dati locatario</h2>
        <p>
            Nome: {{ $loc->nome }}<br>
            Cognome: {{ $loc->cognome }}<br>
            Data di nascita: {{ $loc->data_nasc }}
        </p>
        <a href= "mailto:info@houstudent.com">Invia email al locatario</a>
    </body>
    
</html>