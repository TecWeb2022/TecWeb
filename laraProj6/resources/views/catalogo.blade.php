@extends('layouts.public')

@section('title', 'Catalogo')

@section('scripts')
@parent
<script>
    $(document).ready( function() {
        currNavBar(1);
        filters();
        
        $("#tipologia").change(function(){
            filters();
        });
});
</script>

<script>
$(document).ready( function() {
     $('#reset').click(function(){
        $('.wrap-input > :input').val('');
        $('#tipologia').val('all');
        $('.div-checkbox > span > :input').prop('checked', false);
        filters();
    });
});
</script>
@endsection

@section('content')

<!-- Se è locatario, allora ha i filtri sul catalogo alloggi -->
@can('isLoc')
<section id="works-filtri" >
    <div>
    <center><h2>Filtri per il catalogo</h2></center>
    <center><h1 >Ricerca l'alloggio in base alle tue esigenze!</h1></center>

    <div class="row">
        <center>
        <div class="flex-box-filtri pressa">
          
    <div>
       
        {{ Form::open(array('route' => 'catalogoLocPost', 'id' => 'filterForm','class' => 'filters-form')) }}
       <div class="flex-box-items">
           
           @if(!empty($oldFilters))
            <div  class="wrap-input">
                {{ Form::label('tipologia', 'Tipologia', ['title' => 'Valore obbligatorio']) }}
                {{ Form::select('tipologia', ['all' => 'Tutti', 'ap' => 'Appartamento', 'cs' => 'Posto letto in camera singola', 'cd' => 'Posto letto in camera doppia'], ['id' => 'tipologia','placeholder' => $oldFilters['tipologia']]) }}
            </div>
           @else
           <div  class="wrap-input">
                {{ Form::label('tipologia', 'Tipologia', ['title' => 'Valore obbligatorio']) }}
                {{ Form::select('tipologia', ['all' => 'Tutti', 'ap' => 'Appartamento', 'cs' => 'Posto letto in camera singola', 'cd' => 'Posto letto in camera doppia'],'', ['id' => 'tipologia']) }}
            </div>
           @endif
           

            <div  class="wrap-input">
                 @if(!empty($oldFilters))
                {{ Form::label('prov', 'Provincia', ['title' => 'Valore facoltativo']) }}
                {{ Form::text('prov', $oldFilters['prov'], ['maxlength' => '2','id' => 'prov', 'placeholder' => 'Provincia']) }}
                @else
                {{ Form::label('prov', 'Provincia', ['title' => 'Valore facoltativo']) }}
                {{ Form::text('prov', '', ['maxlength' => '2','id' => 'prov', 'placeholder' => 'Provincia']) }}
                @endif
                
                @if ($errors->first('prov'))
                <ul class="errors">
                @foreach ($errors->get('prov') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif
            </div>
       </div>
        
       <div class="flex-box-items">
           <div  class="wrap-input">
                @if(!empty($oldFilters))
                    {{ Form::label('inizio_disp', 'Inizio disponibilità', ['title' => 'Valore facoltativo']) }}
                    {{ Form::date('inizio_disp', $oldFilters['inizio_disp'], ['id' => 'inizio_disp']) }}
                @else
                    {{ Form::label('inizio_disp', 'Inizio disponibilità', ['title' => 'Valore facoltativo']) }}
                    {{ Form::date('inizio_disp', '', ['id' => 'inizio_disp']) }}
                @endif

                @if ($errors->first('inizio_disp'))
                <ul class="errors">
                @foreach ($errors->get('inizio_disp') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif        
            </div>
           
           <div  class="wrap-input">
                @if(!empty($oldFilters))
                    {{ Form::label('fine_disp', 'Fine disponibilità', ['title' => 'Valore facoltativo']) }}
                    {{ Form::date('fine_disp', $oldFilters['fine_disp'], ['id' => 'fine_disp']) }}
                @else
                    {{ Form::label('fine_disp', 'Fine disponibilità', ['title' => 'Valore facoltativo']) }}
                    {{ Form::date('fine_disp', '', ['id' => 'fine_disp']) }}
                @endif
                
                @if ($errors->first('fine_disp'))
                <ul class="errors">
                @foreach ($errors->get('fine_disp') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif        
           </div>
       </div>
     </div>
    
    <div>
        <div class="flex-box-items">
            <div  class="wrap-input">
                @if(!empty($oldFilters) && $oldFilters['prezzo_min'] != 0)
                    {{ Form::label('prezzo_min', 'Prezzo minimo', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('prezzo_min', $oldFilters['prezzo_min'], ['min' => '0','step' => '0.1','id' => 'prezzo_min', 'placeholder' => 'Prezzo minimo']) }}
                @else
                    {{ Form::label('prezzo_min', 'Prezzo minimo', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('prezzo_min', '', ['min' => '0','step' => '0.1','id' => 'prezzo_min', 'placeholder' => 'Prezzo minimo']) }}
                @endif
                
                @if ($errors->first('prezzo_min'))
                <ul class="errors">
                @foreach ($errors->get('prezzo_min') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                @if(!empty($oldFilters))
                    {{ Form::label('prezzo_max', 'Prezzo massimo', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('prezzo_max', $oldFilters['prezzo_max'], ['min' => '0','step' => '0.1','id' => 'prezzo_max', 'placeholder' => 'Prezzo massimo']) }}
                @else
                    {{ Form::label('prezzo_max', 'Prezzo massimo', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('prezzo_max', '', ['min' => '0','step' => '0.1','id' => 'prezzo_max', 'placeholder' => 'Prezzo massimo']) }}
                @endif
                @if ($errors->first('prezzo_max'))
                <ul class="errors">
                @foreach ($errors->get('prezzo_max') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif
            </div>
        </div>
        
        <div class="flex-box-items">
        
            <div  class="wrap-input">
                @if(!empty($oldFilters) && array_key_exists('num_camere', $oldFilters))
                    {{ Form::label('num_camere', 'Numero minimo camere', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('num_camere', $oldFilters['num_camere'], ['min' => '0','id' => 'num_camere', 'placeholder' => 'Numero minimo camere']) }}
                @else
                    {{ Form::label('num_camere', 'Numero minimo camere', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('num_camere', '', ['min' => '0','id' => 'num_camere', 'placeholder' => 'Numero minimo camere']) }}
                @endif
               
                @if ($errors->first('num_camere'))
                <ul class="errors">
                @foreach ($errors->get('num_camere') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                @if(!empty($oldFilters))
                    {{ Form::label('posti_letto_tot', 'Numero posti letto tot', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('posti_letto_tot', $oldFilters['posti_letto_tot'], ['min' => '0','id' => 'posti_letto_tot', 'placeholder' => 'Numero posti letto tot']) }}
                @else
                    {{ Form::label('posti_letto_tot', 'Numero posti letto tot', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('posti_letto_tot', '', ['min' => '0','id' => 'posti_letto_tot', 'placeholder' => 'Numero posti letto tot']) }}
                @endif
                
                @if ($errors->first('nome'))
                <ul class="errors">
                @foreach ($errors->get('nome') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif        
            </div>
        </div>
    </div>
         
    <div>
        <div class="flex-box-items">
   
            <div  class="wrap-input">
                 @if(!empty($oldFilters))
                    {{ Form::label('sup', 'Superficie minima', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('sup', $oldFilters['sup'], ['min' => '0','id' => 'sup', 'placeholder' => 'Superficie']) }}
                @else
                    {{ Form::label('sup', 'Superficie minima', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('sup', '', ['min' => '0','id' => 'sup', 'placeholder' => 'Superficie']) }}
                @endif
                
                @if ($errors->first('sup'))
                <ul class="errors">
                @foreach ($errors->get('sup') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                 @if(!empty($oldFilters)  && array_key_exists('letti_camera', $oldFilters))
                    {{ Form::label('letti_camera', 'Letti nella camera', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('letti_camera', $oldFilters['letti_camera'], ['min' => '0','id' => 'letti_camera', 'placeholder' => 'Letti nella camera']) }}
                @else
                    {{ Form::label('letti_camera', 'Letti nella camera', ['title' => 'Valore facoltativo']) }}
                    {{ Form::number('letti_camera', '', ['min' => '0','id' => 'letti_camera', 'placeholder' => 'Letti nella camera']) }}
                @endif
                
                @if ($errors->first('letti_camera'))
                <ul class="errors">
                @foreach ($errors->get('letti_camera') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif
            </div>
        </div>
        
        <div class="flex-box-items">
            <div  class="wrap-input">
                <div class="column">
                    <div class="div-checkbox">
                        @if(!empty($oldFilters) && array_key_exists('angolo_studio', $oldFilters))
                        {{ Form::label('angolo_studio', 'Angolo studio', ['title' => 'Valore facoltativo']) }}
                        <span>{{ Form::checkbox('angolo_studio', true, $oldFilters['angolo_studio'], ['id' => 'angolo_studio']) }}</span>
                        @else
                        {{ Form::label('angolo_studio', 'Angolo studio', ['title' => 'Valore facoltativo']) }}
                        <span>{{ Form::checkbox('angolo_studio', true, false, ['id' => 'angolo_studio']) }}</span>
                        @endif
                    
                    </div>
                    <div class="div-checkbox">
                         @if(!empty($oldFilters) && array_key_exists('locale_ricreativo', $oldFilters))
                            {{ Form::label('locale_ricreativo', 'Locale ricreativo', ['title' => 'Valore facoltativo']) }}
                           <span>{{ Form::checkbox('locale_ricreativo', true, $oldFilters['locale_ricreativo'], ['id' => 'locale_ricreativo']) }}</span>
                        @else
                            {{ Form::label('locale_ricreativo', 'Locale ricreativo', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('locale_ricreativo', true, false, ['id' => 'locale_ricreativo']) }}</span>
                        @endif
                    
                    </div>
                    <div class="div-checkbox">
                         @if(!empty($oldFilters) && array_key_exists('garage', $oldFilters))
                            {{ Form::label('garage', 'Garage', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('garage', true, $oldFilters['garage'], ['id' => 'garage']) }}</span>
                        @else
                            {{ Form::label('garage', 'Garage', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('garage', true, false, ['id' => 'garage']) }}</span>
                        @endif
                    
                    </div>
                </div>

                <div class="column">
                    <div class="div-checkbox">
                        @if(!empty($oldFilters) && array_key_exists('wifi', $oldFilters))
                            {{ Form::label('wifi', 'Wi-Fi', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('wifi', true, $oldFilters['wifi'], ['id' => 'wifi']) }}</span>
                        @else
                            {{ Form::label('wifi', 'Wi-Fi', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('wifi', true, false, ['id' => 'wifi']) }}</span>
                        @endif
                    
                    </div>
                    <div class="div-checkbox">
                        @if(!empty($oldFilters) && array_key_exists('climatizzatore', $oldFilters))
                            {{ Form::label('climatizzatore', 'Climatizzatore', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('climatizzatore', true, $oldFilters['climatizzatore'], ['id' => 'climatizzatore']) }}</span>
                        @else
                            {{ Form::label('climatizzatore', 'Climatizzatore', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('climatizzatore', true, false, ['id' => 'climatizzatore']) }}</span>
                        @endif
                    
                    </div>
                    <div class="div-checkbox">
                        @if(!empty($oldFilters) && array_key_exists('cucina', $oldFilters))
                            {{ Form::label('cucina', 'Cucina', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('cucina', true, $oldFilters['cucina'], ['id' => 'cucina']) }}</span>
                        @else
                            {{ Form::label('cucina', 'Cucina', ['title' => 'Valore facoltativo']) }}
                            <span>{{ Form::checkbox('cucina', true, false, ['id' => 'cucina']) }}</span>
                        @endif
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </div>
        </center>
    </div>
        
    <center><div class="container-form-btn">
            {{ Form::submit('Filtra', ['class' => 'form-btn1']) }}
                {{ Form::close() }}
            <button id='reset'>Azzera</button>
    </div></center>
    
    



      </div>
</section>

@endcan


@isset($cat)
<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="twelve columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h2>Catalogo alloggi</h2></center>
               <!-- commentlist -->
               <center>
               <ol class="commentlist2">
                  @foreach($cat as $acc)
                  <!--li class="depth-1"-->
                  <li>

                      <div class="bordo_normale piccolo-crick-mk2"></div>
                         <div>
                        <img src="{{asset('/storage/' . $acc->path_foto) }}" palt="">
                     </div>

                     <div>
                         <h2 class="piccolo-crick">{{ $acc->nome }}</h2>

                        <div>
                           <h5 class="">Disponibilità: {{ date('d-m-Y', strtotime($acc->inizio_disp)) }} / {{ date('d-m-Y', strtotime($acc->fine_disp)) }}</h5>
                        </div>
                     </div>

                     <div>
                         <img width="10" height="10" class="icona_posizione" src="/images/position-icon.png" alt="">
                         <a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a>
                         <p>@include('helpers/tipologiaAcc', ['tipologia' => $acc->tipologia])</p>
                         <p>@include('helpers/descrAcc', ['acc' => $acc])</p>
                          
                       
                       @if($acc->assegnato == true)
                         <div>
                             <button disabled>Assegnata</button>
                         </div>
                         @elseif($acc->fine_disp <= date('Y-m-d'))
                         <div>
                             <button disabled>Scaduta</button>
                         </div>
                         @else
                         <div>
                             <button onclick="location.href = '{{ route('visualizzaAcc', [ 'id' => $acc->id ]) }}';"> {{ $acc->canone }} €/Mese</button>
                         </div>
                         @endif
                         <!-- onclick va messo in un file js -->
                         <!-- Seconda casa in affitto -->
                     </div>
                    @endforeach
                     
                        
               </ol> <!-- Commentlist End -->
               </center>
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $cat])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->

@endisset

@endsection