@extends('layouts.locatore')

@section('title', 'Gestione alloggi')

@section('content')

<script type="text/javascript">
    currNavBar(2);
</script>


@isset($catHost)
<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h3>Gestione alloggi</h3></center>
               <!-- commentlist -->
               <ol class="commentlist">
                  @foreach($catHost as $acc)
                  <!--li class="depth-1"-->
                  <li>

                     <div class="imgn_casa">
                        <img class="imgn_casa" src="{{asset('/storage/' . $acc->path_foto) }}" palt="">
                     </div>

                     <div class="comment-info">
                         <cite>{{ $acc->nome }}</cite>

                        <div class="comment-meta">
                           <p>Disponibilità: {{ $acc->inizio_disp }} / {{ $acc->fine_disp }}</p>
                        </div>
                     </div>

                     <div class="dettagli_cat">
                         <img width="10" height="10" class="icona_posizione" src="images/position-icon.png" alt="">
                         <a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a>
                         <p class="remove-bottom">@include('helpers/tipologiaAcc', ['tipologia' => $acc->tipologia])</p>
                         @include('helpers/descrAcc', ['acc' => $acc])
                         <p>Prezzo {{ $acc->canone }} €/notte</p>
                            <div class="flex-box flex-space">
                                <button onclick="location.href = '{{ route('infoAccHost', [ 'id' => $acc->id ]) }}';">Info</button> 
                                <button onclick="location.href = '{{ route('modificaHostAcc', [ 'id' => $acc->id ]) }}';">Modifica</button> 
                                <button onclick="location.href = '{{ route('visualizzaAcc', [ 'id' => $acc->id ]) }}';">Elimina</button> 
                            </div>
                         <!-- onclick va messo in un file js -->
                         <!-- Seconda casa in affitto -->
                     </div>
                    @endforeach
                     
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $catHost])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>
       
         </div> <!-- Comments End -->
         <div class="fab" title="Inserisci una nuova offerta" id="fab"><a href="{{route('insertAcc')}}"> + </a></div>

@endisset()

@endsection