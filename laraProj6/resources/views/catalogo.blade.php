@extends('layouts.public')

@section('title', 'Catalogo')

@section('content')

<script type="text/javascript">
    currNavBar(1);
</script>

<!-- Se è locatario, allora ha i filtri sul catalogo alloggi -->
@can('isLoc')
<section id="works" >
    <div>
    <center><h2>Filtri per il catalogo</h2></center>
    <center><h1>Ricerca l'alloggio in base alle tue esigenze!</h1></center>

    <div class="row">
        <center>
        <div class="flex-box-filtri pressa">
          
            <div>
       
        {{ Form::open(array('route' => 'catalogoLoc', 'class' => 'filters-form')) }}
       <div class="flex-box-items">
        <div  class="wrap-input">
            
            {{ Form::label('tipologia', 'Tipologia', ['title' => 'Valore obbligatorio']) }}
            {{ Form::select('tipologia', ['all' => 'Tutti', 'ap' => 'Appartamento', 'cs' => 'Camera singola', 'cd' => 'Camera doppia'],'', ['id' => 'tipologia', 'onclick'=>'filters()']) }}
        </div>
        
        <div  class="wrap-input">
        {{ Form::label('prov', 'Provincia', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('prov', '', ['id' => 'prov', 'placeholder' => 'Provincia']) }}
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
        {{ Form::label('posti_letto_tot', 'Numero posti letto tot', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('posti_letto_tot', '', ['id' => 'posti_letto_tot', 'placeholder' => 'Numero posti letto tot']) }}
        @if ($errors->first('nome'))
        <ul class="errors">
        @foreach ($errors->get('nome') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif        
        </div>
        
        <div  class="wrap-input">
        {{ Form::label('inizio_disp', 'Inizio disponibilità', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::date('inizio_disp', '', ['id' => 'inizio_disp']) }}
        @if ($errors->first('inizio_disp'))
        <ul class="errors">
        @foreach ($errors->get('inizio_disp') as $message)
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
        {{ Form::label('prezzo_min', 'Prezzo minimo', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('prezzo_min', '', ['id' => 'prezzo_min', 'placeholder' => 'Prezzo minimo']) }}
        @if ($errors->first('prezzo_min'))
        <ul class="errors">
        @foreach ($errors->get('prezzo_min') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
        </div>
        
         <div  class="wrap-input">
        {{ Form::label('sup', 'Superficie minima', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('sup', '', ['id' => 'sup', 'placeholder' => 'Superficie']) }}
        @if ($errors->first('sup'))
        <ul class="errors">
        @foreach ($errors->get('sup') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
        </div>
        </div>
        <div class="flex-box-items">
        <div  class="wrap-input">
        {{ Form::label('letti_camera', 'Letti nella camera', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('letti_camera', '', ['id' => 'letti_camera', 'placeholder' => 'Letti nella camera']) }}
        @if ($errors->first('letti_camera'))
        <ul class="errors">
        @foreach ($errors->get('letti_camera') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
        </div>
        
        <div  class="wrap-input">
        {{ Form::label('fine_disp', 'Fine disponibilità', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::date('fine_disp', '', ['id' => 'fine_disp']) }}
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
        {{ Form::label('prezzo_max', 'Prezzo massimo', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('prezzo_max', '', ['id' => 'prezzo_max', 'placeholder' => 'Prezzo massimo']) }}
        @if ($errors->first('prezzo_max'))
        <ul class="errors">
        @foreach ($errors->get('prezzo_max') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
        
        </div>
        
        <div  class="wrap-input">
        {{ Form::label('num_camere', 'Numero minimo camere', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('num_camere', '', ['id' => 'num_camere', 'placeholder' => 'Numero minimo camere']) }}
        @if ($errors->first('num_camere'))
        <ul class="errors">
        @foreach ($errors->get('num_camere') as $message)
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
            {{ Form::label('angolo_studio', 'Angolo studio', ['title' => 'Valore facoltativo']) }}
            <span>{{ Form::checkbox('angolo_studio', true, false, ['id' => 'angolo_studio']) }}</span>
               </div>
                <div class="div-checkbox">
            {{ Form::label('locale_ricreativo', 'Locale ricreativo', ['title' => 'Valore facoltativo']) }}
            <span>{{ Form::checkbox('locale_ricreativo', true, false, ['id' => 'locale_ricreativo']) }}</span>
               </div>
                <div class="div-checkbox">
            {{ Form::label('garage', 'Garage', ['title' => 'Valore facoltativo']) }}
            <span>{{ Form::checkbox('garage', true, false, ['id' => 'garage']) }}</span>
               </div>
            </div>
            
            <div class="column">
                <div class="div-checkbox">
            {{ Form::label('wifi', 'Wi-Fi', ['title' => 'Valore facoltativo']) }}
            <span>{{ Form::checkbox('wifi', true, false, ['id' => 'wifi']) }}</span>
               </div>
                  <div class="div-checkbox">
            {{ Form::label('climatizzatore', 'Climatizzatore', ['title' => 'Valore facoltativo']) }}
            <span>{{ Form::checkbox('climatizzatore', true, false, ['id' => 'climatizzatore']) }}</span>
               </div>
                <div class="div-checkbox">
            {{ Form::label('cucina', 'Cucina', ['title' => 'Valore facoltativo']) }}
            <span>{{ Form::checkbox('cucina', true, false, ['id' => 'cucina']) }}</span>
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
    </div></center>
    
    
    {{ Form::close() }}


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
                          
                       
                       @if($acc->assegnato == false)
                         <div>
                             <button onclick="location.href = '{{ route('visualizzaAcc', [ 'id' => $acc->id ]) }}';"> {{ $acc->canone }} €/Mese</button>
                         </div>
                         @else
                         <div>
                             <button disabled>Assegnato</button>
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

@endisset()

@endsection