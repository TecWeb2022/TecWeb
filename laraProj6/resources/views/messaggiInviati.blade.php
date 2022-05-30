@extends('layouts.public')

@section('title', 'Messaggistica')

@section('content')

<script type="text/javascript">
currNavBar(3);
</script>

<!-- Content
   ================================================== -->
   <div class="content-outer">
      <div class="row">
      

         <div id="primary" class="twelve columns">

            <!-- Comments
            ================================================== -->
            
            <div id="comments" >
                <center>
                <center><div><a href="{{ route('messaggisticaLoc') }}">Messaggi ricevuti</a> | <a href="{{ route('messaggiInvLoc') }}">Messaggi inviati</a></div></center>
               <!-- commentlist -->
               @isset($mess)
               <ol class="commentlist2">
                  @foreach($mess as $m)
                  <!--li class="depth-1"-->
                  <li>
                      <!--div class="avatar2">
                        <img width="50" height="50" src="images/icona_utente.png" alt="">
                     </div-->
                      <div class="bordo_normale piccolo-crick flex-box-mess">
                     
                          
                          
                         <h3 class="stoppino">{{ $m->dest->nome }} {{ $m->dest->cognome }}</h3>

                        <div class="comment-meta">
                           <p class="ricevuto_messagistica">Inviato: {{ date('d-m-Y H:i', strtotime($m->created_at)) }}</p>
                        </div>
                   

                     <div class="dettagli_cat">
                         <cite class="nome_alloggio column">Nome alloggio: {{ $m->alloggio->nome }}</cite>
                     </div>

                      <button class="btn_mess_vis" title ="Messaggio inviato" onclick="location.href = '{{ route('messaggioInvLoc', [ 'id_mess' => $m->id ]) }}';">Leggi</button>
                      </div>
                      @endforeach
                        
               </ol> 
               </center> 
               <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $mess])</center>
               
               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

      
        </div>
         </div> <!-- Comments End -->

@endisset

@endsection