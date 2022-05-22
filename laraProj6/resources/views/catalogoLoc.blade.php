@extends('layouts.locatario')

@section('title', 'Catalogo')

@section('content')

<script type="text/javascript">
    currNavBar(1);
</script>

<section id="works">
    <center><h2>Filtri per il catalogo</h2></center>
    <center><h1>Ricerca l'alloggio in base alle tue esigenze!</h1></center>

    <div class="row flex-box">
        
     <div class="column">
        {{ Form::open(array('route' => 'catalogoLoc', 'class' => 'filters-form')) }}

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

     </div>
    
    <div class="column">
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
        
        <div  class="wrap-input">
        {{ Form::label('letti_camera', 'Letti nella camera', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('letti_camera', '', ['id' => 'letti_camera', 'placeholder' => 'Letti nella camera', 'disabled']) }}
        @if ($errors->first('letti_camera'))
        <ul class="errors">
        @foreach ($errors->get('letti_camera') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
        </div>
        
    </div>
         
    <div class="column">
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
        
        <div  class="wrap-input">
            <div class="column">
            {{ Form::label('angolo_studio', 'Angolo studio', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('angolo_studio', true, false, ['id' => 'angolo_studio', 'disabled']) }}

            {{ Form::label('locale_ricreativo', 'Locale ricreativo', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('locale_ricreativo', true, false, ['id' => 'locale_ricreativo']) }}
            
            {{ Form::label('garage', 'Garage', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('garage', true, false, ['id' => 'garage']) }}
            </div>
            
            <div class="column">
            {{ Form::label('wifi', 'Wi-Fi', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('wifi', true, false, ['id' => 'wifi']) }}

            {{ Form::label('climatizzatore', 'Climatizzatore', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('climatizzatore', true, false, ['id' => 'climatizzatore']) }}
            </div>
        
        </div>
    </div>
    </div>
        
    <center><div class="container-form-btn">                
            {{ Form::submit('Filtra', ['class' => 'form-btn1']) }}
    </div></center>
    
    
    {{ Form::close() }}



</section>



@isset($cat)
<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h3>Catalogo alloggi</h3></center>
               <!-- commentlist -->
               <ol class="commentlist">
                  @foreach($cat as $acc)
                  <!--li class="depth-1"-->
                  <li>

                     <div class="imgn_casa">
                        <img width="10" height="10" class="imgn_casa" src="{{ $acc->path_foto }}" palt="">
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
                         <p>@include('helpers/tipologiaAcc', ['acc' => $acc])</p>
                         @include('helpers/descrAcc', ['acc' => $acc])
                     
                            <div class="center">
                                <button onclick="location.href = '{{ route('visualizzaAccLoc', [ 'id' => $acc->id ]) }}';"> {{ $acc->canone }} €/notte</button> </div>
                         <!-- onclick va messo in un file js -->
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