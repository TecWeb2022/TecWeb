@extends('layouts.locatore')

@section('title', 'Gestione alloggi')

@section('scripts')
@parent
<script>
    $(document).ready( function() {
        currNavBar(4);
    });
</script>
@endsection

@section('content')

  <div id="works">

      <div class="row row-bianco">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h2>Gestione Offerte</h2></center>
               <!-- commentlist -->
               @isset($catHost)
               <ol class="optionlist ">
                  @foreach($catHost as $acc)
                  
                  <li class="flex-box flex-row">
                     
                      <div class="div_imgn_casa_catalog">     
                        <img class="imgn_visual_casa_catalog" src="{{asset('/storage/' . $acc->path_foto) }}" palt="">
                      </div>
                      
                     <div class="column seven">
                     
                        
                         <h3 class="nome_mitt">{{ $acc->nome }}</h3>
                                 <p class="titolo">Disponibilità: 
                                 <span class="testo"> {{ $acc->inizio_disp }} / {{ $acc->fine_disp }}
                             </span></p>
                     
                         <img width="10" height="10" class="icona_posizione" src="images/position-icon.png" alt="">
                         <a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a>
                         <p class="titolo" class="remove-bottom">Tipologia: <span class="testo">@include('helpers/tipologiaAcc', ['tipologia' => $acc->tipologia])</span></p>
                         <p class="titolo">Info: <span class="testo">@include('helpers/descrAcc', ['acc' => $acc])</span></p>
                         <p class="titolo">Prezzo: <span class="testo"> {{ $acc->canone }} €/mese</span></p>
                           
                         
                         <div hidden id="{{$acc->id}}">
                             <center><h4>Informazioni</h4></center>
                              <p class="titolo">Descrizione: <span class="testo"> {{ $acc->descr }}</span></p>
                              <p class="titolo">Superficie: <span class="testo"> {{ $acc->sup }} m²</span></p>
                              <p class="titolo">Numero di posti letto totali: <span class="testo"> {{ $acc->posti_letto_tot }}</span></p>
                              <p class="titolo">Numero di bagni: <span class="testo"> {{ $acc->num_bagni }}</span></p>
                              
                              @if($acc->tipologia == 'cs' || $acc->tipologia == 'cd')
                              <p class="titolo">Numero di letti nella camera: <span class="testo"> {{ $acc->letti_camera }}</span></p>
                              <p class="titolo">Angolo studio:
                                  @include('helpers/boolTransAcc', ['value' => $acc->angolo_studio])
                              </p> 
                              @else
                              <p class="titolo">Numero di camere: <span class="testo"> {{ $acc->num_camere }}</span></p>
                              <p class="titolo">Locale ricreativo: 
                                    @include('helpers/boolTransAcc', ['value' => $acc->locale_ricreativo])
                              </p> 
                    
                               <p class="titolo">Cucina:  
                                    @include('helpers/boolTransAcc', ['value' => $acc->cucina])
                               </p> 
                                <p class="titolo">Garage: 
                                    @include('helpers/boolTransAcc', ['value' => $acc->garage])
                               </p> 
                              @endif
                              
                            
                               <p class="titolo">WiFi: 
                                    @include('helpers/boolTransAcc', ['value' => $acc->wifi])
                               </p> 
                              
                               <p class="titolo">Climatizzatore: 
                                    @include('helpers/boolTransAcc', ['value' => $acc->climatizzatore])
                               </p> 
                               
                               <center><h3>Requisiti da soddisfare</h3></center>
                               <p class="titolo">Sesso: 
                                   <span class="testo">@include('helpers/sessoUser', ['sesso' => $acc->sesso])</span>
                               </p>
                               <p class="titolo">Età minima: 
                                   @include('helpers/boolTransAcc', ['value' => $acc->eta_min])
                               </p>
                               <p class="titolo">Età massima: 
                                   @include('helpers/boolTransAcc', ['value' => $acc->eta_max])
                               </p>
                              
                         </div>

                      
                  
                     </div>
                      
                      <div class="width-opt-button">
                   
                                <button class="btn_gestione_acc" onclick="toggleInfoAcc({{$acc->id}});">Info</button> 
                                
                                {{ Form::open(array('route' => 'visualizzaOpzioniAcc', 'class' => '')) }}
                                {{ Form::hidden('id_acc', $acc->id, ['id' => 'id_acc']) }}
                                {{ Form::submit('Opzioni', ['class' => 'btn_gestione_acc', 'title' => 'Visualizza le richieste di opzione']) }}
                                {{ Form::close() }}
                                
                                {{ Form::open(array('route' => 'modificaHostAcc', 'class' => '')) }}
                                {{ Form::hidden('id_acc', $acc->id, ['id' => 'modifica_acc']) }}
                                {{ Form::submit('Modifica', ['class' => 'btn_gestione_acc', 'title' => 'Modifica alloggio']) }}
                                {{ Form::close() }}
                               
                                {{ Form::open(array('route' => 'eliminaAcc', 'class' => '', 'onsubmit' => 'return ConfirmDelete()')) }}
                                {{ Form::hidden('id_acc', $acc->id, ['id' => 'elimina_acc']) }}
                                {{ Form::submit('Elimina', ['class' => 'btn_gestione_acc', 'title' => 'Elimina alloggio']) }}
                                {{ Form::close() }}
                           
                       </div>
                  </li>
                     @endforeach
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $catHost])</center>
               @endisset
               </div><!-- Respond End -->

            </div>  <!-- Comments End -->

         </div> <!-- Comments End -->
         <div class="fab" title="Inserisci una nuova offerta" id="fab"><a href="{{route('insertAcc')}}"> + </a></div>
        
@endsection
