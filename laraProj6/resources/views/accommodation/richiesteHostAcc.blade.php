@extends('layouts.locatore')

@section('title', 'Richieste di opzione')

@section('content')



<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><div><h2>Richieste di opzione ricevute</h2></div></center>
               <!-- commentlist -->
               @isset($opzione)
               <ol class="commentlist ">
                  @foreach($opzione as $m)
                  <!--li class="depth-1"-->
                  <li>
                      <!--div class="avatar2">
                        <img width="50" height="50" src="images/icona_utente.png" alt="">
                     </div-->
                      <div class="bordo_messaggi center">
                     <div class="comment-info">
                         <img class="avatar2" src="images/icona_utente.png" alt="">
                         <h3 class="nome_mitt">{{ $m->loc->nome }} {{ $m->loc->cognome }}</h3>

                        <div class="comment-meta">
                           <p class="ricevuto_messagistica">Richiesta di opzione inviata: {{ date('d-m-Y h:m:s', strtotime($m->created_at)) }}</p>
                        </div>
                     </div>

                     <div class="dettagli_cat">
                         <cite class="nome_alloggio">Nome alloggio: {{ $m->alloggio->nome }}</cite>
                     </div>
                      
                       <button class="btn_mess_nvis" title ="Valutazione richiesta" onclick="location.href = '{{ route('accettaOpz', [ 'id' => $m->id ]) }}';">Accetta prenotazione</button>
                      
                       </div>
                    
                     
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $opzione])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->

@endisset

@endsection
