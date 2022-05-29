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
               @isset($dati)
               <ol class="commentlist ">
                  @foreach($dati as $d)
                  <!--li class="depth-1"-->
                  <li>
                      <!--div class="avatar2">
                        <img width="50" height="50" src="images/icona_utente.png" alt="">
                     </div-->
                      <div class="bordo_messaggi center">
                     <div class="comment-info">
                        
                         <h3 class="nome_mitt">{{ $d->nome_loc }} {{ $d->cognome_loc }}</h3>
                         <p>Sesso: {{$d->sesso}}<br>
                         Data di nascita: {{ date('d-m-Y', strtotime($d->data_nasc)) }}</p>

                        <div class="comment-meta">
                           <p class="ricevuto_messagistica">Richiesta di opzione inviata: {{ date('d-m-Y H:i', strtotime($d->created_at_opt)) }}</p>
                        </div>
                     </div>

                     <div class="dettagli_cat">
                         <cite class="nome_alloggio">Nome alloggio: {{ $d->nome_acc }}</cite>
                     </div>
                      
                       <button class="btn_mess_nvis" title ="Valutazione richiesta" onclick="location.href = '{{ route('home', [ 'id' => $d->id_acc ]) }}';">Accetta prenotazione</button>
                      
                       </div>
                  </li>
                     @endforeach
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $dati])</center>
               @endisset
               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->



@endsection
