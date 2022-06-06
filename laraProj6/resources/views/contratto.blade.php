<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>HouStudent | Contratto</title>
        <script type="text/javascript" src="{{ URL::asset('js/functions.js') }}"></script>
    </head>

    <body>
        <h1>Contratto di locazione</h1>
        <h2>Oggetto del contratto</h2>
        <p>
            Tipologia: @include('helpers/tipologiaAcc', ['tipologia' => $acc->tipologia])<br>
            Nome: {{ $acc->nome }}<br>
            Indirizzo: {{ $acc->via }} {{ $acc->num_civ }} {{ $acc->citta }} {{ $acc->prov }}<br>
            Inizio disponibilità: {{ date('d-m-Y', strtotime($acc->inizio_disp)) }}<br>
            Fine disponibilità: {{ date('d-m-Y', strtotime($acc->fine_disp)) }}<br>
            Canone: {{ $acc->canone }}€/Mese
        </p>
        <h2>Dati locatore</h2>
        <p>
            Nome: {{ Auth::user()->nome }}<br>
            Cognome: {{ Auth::user()->cognome }}<br>
            Data di nascita: {{ date('d-m-Y', strtotime(Auth::user()->data_nasc)) }}
        </p>
        <h2>Dati locatario</h2>
        <p>
            Nome: {{ $loc->nome }}<br>
            Cognome: {{ $loc->cognome }}<br>
            Data di nascita: {{ date('d-m-Y', strtotime($loc->data_nasc)) }}
        </p>
        <a href= "mailto:{{ $loc->nome }}.{{ $loc->cognome }}@info.com?subject=Contratto di locazione per {{ $loc->nome }} {{ $loc->cognome }}&body=">Invia email al locatario</a>

        <script type="text/javascript">
emailContratto();
        </script>
    </body>

</html>