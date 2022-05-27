@extends('layouts.locatario')

@section('title', 'Opzionamento')

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
               <p class="titolo">Tipologia: 
               <span class="testo">@include('helpers/tipologiaAcc', ['tipologia' => $acc->tipologia])</span>
               </p>
               <p class="titolo">Disponibilità: <span class="testo">{{ $acc->inizio_disp }} / {{ $acc->fine_disp }}</span></p> 
               <div class="flex-box flex-inline flex-left">
                    <img class="icona_posizione" src="/images/position-icon.png" alt="">
                    <h5><a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a></h5>
               </div>
              <p class="titolo">Descrizione: <span class="testo">{{ $acc->descr}}</span></p> 
              <p class="titolo">Prezzo al mese: <span class="testo">{{ $acc->canone }} €</span></p> 
               
          </div>
          <div class="column">
               {{ Form::open(array('route' => array('opzioneAccPost',$acc->id), 'class' => 'register-form')) }}
               @csrf
            <div  class="wrap-input">
                <h3>Inserisci i dati per fare richiesta di affitto</h3>
                {{ Form::label('data_inizio', 'Data inizio soggiorno') }}
                {{ Form::date('data_inizio', '', ['id' => 'data_inizio']) }}
                @if ($errors->first('data_inizio'))
                <ul class="errors">
                    @foreach ($errors->get('data_inizio') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
               
            <div  class="wrap-input">
                {{ Form::label('data_fine', 'Data fine soggiorno') }}
                {{ Form::date('data_fine', '', ['id' => 'data_fine']) }}
                @if ($errors->first('data_fine'))
                <ul class="errors">
                    @foreach ($errors->get('data_fine') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('nota', 'Nota') }}
                {{ Form::textarea('nota', '', ['id' => 'nota', 'placeholder' => 'Nota']) }}
                @if ($errors->first('nota'))
                <ul class="errors">
                    @foreach ($errors->get('nota') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
          
            <div class="container-form-btn">                
                {{ Form::submit('Conferma affitto', ['class' => 'form-btn1']) }}
            </div>
            
            {{ Form::close() }}
            
          </div>
      </div>
          <!-- da fare -->
              <div class="column">
                  <h3>Chatta col proprietario</h3>
                  <div class="flex-box">
                        <button onclick="location.href = '{{ route('catalogo') }}';"> Affitta per {{ $acc->canone}}€ al mese</button> 
                  </div>
              </div>
         
         </div> <!-- Comments End -->
 </section>
@endisset()

@endsection