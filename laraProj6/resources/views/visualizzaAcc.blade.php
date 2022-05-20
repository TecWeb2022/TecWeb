@extends('layouts.public')

@section('title', 'Info')

@section('content')

<script type="text/javascript">
    document.getElementsByClassName("noCurrent")[0].className = "current";
</script>

@isset($acc)
<!-- Content
   ================================================== -->
 <section id="works">

      <div class="row row-bianco">
          <h2 class="text-center">{{ $acc->nome}}</h2>
          
          <div class="column">
                <div class="imgn_visual_casa">
                        <img width="10" height="10" class="imgn_visual_casa" src="{{ $acc->path_foto }}" palt="">
                </div>
          </div>
          <div class="column">
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
                     
                            <div class="center">
                                <button onclick="location.href = '{{ route('register') }}';"> {{ $acc->canone }} €/notte</button> </div>
                         <!-- onclick va messo in un file js -->
                         <!-- Seconda casa in affitto -->
                     </div>
           
           </div>
          <div class="column">
                
          </div>
         </div> <!-- Comments End -->
 </section>
@endisset()

@endsection