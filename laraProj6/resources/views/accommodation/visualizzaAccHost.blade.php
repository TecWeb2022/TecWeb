@extends('layouts.locatore')

@section('title', 'Info')

@section('content')

<script type="text/javascript">
     currNavBar(1);
</script>

@isset($acc)
<!-- Content
   ================================================== -->
 <section id="works">

      <div class="row row-bianco">
          <h2 class="text-center add-bottom">{{ $acc->nome}}  </h2>
         
      <div class="flex-box flex-inline add-bottom">
          <div class="column">
                <div class="div_imgn_visual_casa">
                        <img  class="imgn_visual_casa" src="{{ $acc->path_foto }}" palt="">
                </div>
          </div>
          <div class="column">
               <p class="titolo">Tipologia: 
               <span class="testo">@include('helpers/tipologiaAcc', ['acc' => $acc])</span>
               </p>
               <p class="titolo">Disponibilità: <span class="testo">{{ $acc->inizio_disp }} / {{ $acc->fine_disp }}</span></p> 
               <div class="flex-box flex-inline flex-left">
                    <img class="icona_posizione" src="/images/position-icon.png" alt="">
                    <h5><a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a></h5>
               </div>
              <p class="titolo">Numero di camere: <span class="testo">{{ $acc->num_camere}}</span></p> 
              <p class="titolo">Numero di bagni: <span class="testo">{{ $acc->num_bagni}}</span></p> 
              <p class="titolo">Posti letto totali: <span class="testo">{{ $acc->posti_letto_tot}}</span></p> 
              <p class="titolo">Superficie: <span class="testo">{{ $acc->sup}} m²</span></p> 
              <p class="titolo">Descrizione: <span class="testo">{{ $acc->descr}}</span></p> 
              <p class="titolo">Prezzo al mese: <span class="testo">{{ $acc->canone }} €</span></p> 
               
          </div>
      </div>
          <div class="flex-box flex-space">
                <div class="column">
                    <h3>Servizi</h3>
                    <p class="titolo">Cucina:
                        @include('helpers/boolTransAcc', ['value' => $acc->cucina])
                    </p> 
                    
                    <p class="titolo">Locale ricreativo: 
                         @include('helpers/boolTransAcc', ['value' => $acc->locale_ricreativo])
                    </p> 
                    
                    <p class="titolo">Letti nella camera: 
                         @include('helpers/boolTransAcc', ['value' => $acc->letti_camera])
                    </p> 
                    <p class="titolo">Angolo studio:  
                         @include('helpers/boolTransAcc', ['value' => $acc->angolo_studio])
                    </p> 
                    <p class="titolo">WiFi: 
                         @include('helpers/boolTransAcc', ['value' => $acc->wifi])
                    </p> 
                    <p class="titolo">Garage: 
                         @include('helpers/boolTransAcc', ['value' => $acc->garage])
                    </p> 
                    <p class="titolo">Climatizzatore: 
                         @include('helpers/boolTransAcc', ['value' => $acc->climatizzatore])
                    </p> 
                </div>
              <div class="column">
                    <h3>Requisiti da soddisfare per l'affitto</h3>
                    <p class="titolo">Sesso: 
                        @include('helpers/boolTransAcc', ['value' => $acc->sesso])
                    </p>
                    <p class="titolo">Età minima: 
                        @include('helpers/boolTransAcc', ['value' => $acc->eta_min])
                    </p>
                    <p class="titolo">Età massima: 
                        @include('helpers/boolTransAcc', ['value' => $acc->eta_max])
                    </p>
                </div>
              
         
         </div> <!-- Comments End -->
 </section>
@endisset()

@endsection
