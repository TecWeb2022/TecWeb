@extends('layouts.public')

@section('title', 'Profilo utente')

@section('content')

<script type="text/javascript">
    currNavBar(2);
</script>

<!-- Works Section
   ================================================== -->
   <section id="works_profilo">

      <div class="row align-center-div ">
          
          <div class="column ">
              <center>
              <div class="crick"><h1>Profilo utente</h1></div>
              
                     <div>
                         <img class="avatar_profilo" src="/images/icona_utente.png" alt="">
                    </div>
                  
                  
                  
                  <div id="box-profilo">
            <p class="titolo piccolo-crick">Nome: <span class="testo">{{ auth()->user()->nome }}</span></p>
            <p class="titolo piccolo-crick">Cognome: <span class="testo">{{ auth()->user()->cognome }}</span></p>
            <p class="bordo_normale piccolo-crick"></p>
            <p class="titolo piccolo-crick ">Sesso: <span class="testo">@include('helpers/sessoUser', ['sesso' =>  auth()->user()->sesso])</span></p>
            <p class="titolo piccolo-crick ">Data di nascita: <span class="testo">{{ date('d-m-Y', strtotime(auth()->user()->data_nasc)) }}</span></p>
            <p class="titolo piccolo-crick ">Username: <span class="testo">{{ auth()->user()->username }}</span></p>
            </div>
                
            <button class="crick" onclick="location.href = '{{ route('modificaProfilo') }}';">Modifica i tuoi dati</button>
             </center>
          </div>
       </div>

    </section> <!-- Works Section End-->
    
@endsection