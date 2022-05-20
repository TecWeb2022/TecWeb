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
          <h2 class="text-center add-bottom">{{ $acc->nome}}</h2>
          
          <div class="column">
                <div class="div_imgn_visual_casa">
                        <img  class="imgn_visual_casa" src="{{ $acc->path_foto }}" palt="">
                </div>
          </div>
          <div class="column">
               <h3>{{ $acc->tipologia }}</h3>

               <p>Disponibilità: {{ $acc->inizio_disp }} / {{ $acc->fine_disp }}</p>
                        
                     </div>

                     <div class="dettagli_cat">
                         <img class="icona_posizione" src="/images/position-icon.png" alt="">
                         <a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a>
                         
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