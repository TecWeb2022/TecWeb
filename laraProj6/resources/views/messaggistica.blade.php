@extends('layouts.public')

@section('title', 'Messaggistica')

@section('content')

<script type="text/javascript">
currNavBar(3);
</script>

<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><div><a href="{{ route('messaggisticaLoc') }}">Messaggi ricevuti</a> | <a href="{{ route('messaggiInvLoc') }}">Messaggi inviati</a></div></center>
               <!-- commentlist -->
               @isset($messRic)
               <ol class="commentlist ">
                  @foreach($messRic as $m)
                  <!--li class="depth-1"-->
                  <li>
                      <!--div class="avatar2">
                        <img width="50" height="50" src="images/icona_utente.png" alt="">
                     </div-->
                      <div class="bordo_messaggi center">
                     <div class="comment-info">
                         <img class="avatar2" src="images/icona_utente.png" alt="">
                         <h3 class="nome_mitt">{{ $m->mitt->nome }} {{ $m->mitt->cognome }}</h3>

                        <div class="comment-meta">
                           <p class="ricevuto_messagistica">Ricevuto: {{ date('d-m-Y h:m:s', strtotime($m->created_at)) }}</p>
                        </div>
                     </div>

                     <div class="dettagli_cat">
                         <cite class="nome_alloggio">Nome alloggio: {{ $m->alloggio->nome }}</cite>
                     </div>
                      @if($m->visualizzato)
                      <button class="btn_mess_vis" title ="Messaggio già visualizzato" onclick="location.href = '{{ route('messaggioLoc', [ 'id_mess' => $m->id ]) }}';">Leggi</button>
                      @else
                      <button class="btn_mess_nvis" title ="Messaggio non visualizzato" onclick="location.href = '{{ route('messaggioLoc', [ 'id_mess' => $m->id ]) }}';">Leggi</button>
                      @endif
                       </div>
                      @endforeach
                     
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $messRic])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->

@endisset

@endsection