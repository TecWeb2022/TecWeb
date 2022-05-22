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
            
            <div>
            <p class="titolo">Nome: <span class="testo">{{ auth()->user()->nome }}</span></p>
            <p class="titolo">Cognome: <span class="testo">{{ auth()->user()->cognome }}</span></p>
            <p class="titolo">Data di nascita: <span class="testo">{{ auth()->user()->datanasc }}</span></p>
            <p class="titolo">Username: <span class="testo">{{ auth()->user()->username }}</span></p>
            </div>

            <button onclick="location.href = '{{ route('profiloLocdaModificare') }}';">Modifica i tuoi dati</button>

    </div>

    </section> <!-- Works Section End-->
    
@endsection