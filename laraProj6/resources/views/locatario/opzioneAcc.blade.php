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
          <div class="column maxw-40">
               {{ Form::open(array('route' => array('opzioneAccPost',$acc->id), 'class' => 'register-form')) }}
               @csrf
         
            <div  class="wrap-input">
                {{ Form::label('testo', 'Invia un messaggio al proprietario') }}
                {{ Form::textarea('testo', 'Salve, sono interessato ad affittare il suo alloggio', ['id' => 'testo']) }}
                @if ($errors->first('testo'))
                <ul class="errors">
                    @foreach ($errors->get('testo') as $message)
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
      </div> <!-- Comments End -->
 </section>
@endisset()

@endsection