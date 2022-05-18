@extends('layouts.public')

@section('title', 'Catalogo')

@section('content')

<script type="text/javascript">
    document.getElementsByClassName("noCurrent")[1].className = "current";
</script>

@isset($cat)
<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h3>I più frequenti</h3></center>
               <!-- commentlist -->
               <ol class="commentlist">
                  @foreach($cat as $acc)
                  <!--li class="depth-1"-->
                  <li>

                     <div class="imgn_casa">
                        @include('helpers/mainAccPhoto', ['id_acc' => $acc->id])
                        
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
                         <p>{{ $acc->tipologia }}</p>
                         @include('helpers/descrAcc', ['acc' => $acc])
                         <!--p>4 camere, 6 posti letto, 110 m2</p-->
                     
                            <div class="center">
                                <button onclick=""> {{ $acc->canone }} €/notte</button> </div>
                        
                         <!-- Seconda casa in affitto -->
                     </div>
                    @endforeach
                     
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $cat])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->

@endisset()

@endsection