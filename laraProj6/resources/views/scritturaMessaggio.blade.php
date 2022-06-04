@extends('layouts.public')

@section('title', 'Scrittura messaggio')

@section('scripts')
@parent
<script>
    $(document).ready( function() {
        currNavBar(3);
    });
</script>
@endsection

@section('content')

<!-- Content
   ================================================== -->
   <section id="info">

      <div class="row">

         <div id="primary" class="twelve columns">
            
             @isset($mess)
            <div id="comments2">
                
               @if($mess->dest->id == Auth::user()->id)
                    <h1>Rispondi a {{ $mess->mitt->nome }} {{ $mess->mitt->cognome }}</h1>
                    <cite>In merito all'alloggio:{{ $mess->alloggio->nome }}</cite>
                    <h5 class="bordo_normale crick">Testo del messaggio ricevuto: "{{ $mess->testo }}"</h5>
               @else
                    <h1>Riscrivi a {{ $mess->dest->nome }} {{ $mess->dest->cognome }}</h1>
                    <cite>In merito all'alloggio:{{ $mess->alloggio->nome }}</cite>
                    <h5 class="bordo_normale crick">Testo del messaggio inviato: "{{ $mess->testo }}"</h5>
               @endif
               
               
               
               {{ Form::open(array('route' => 'inviaMess', 'class' => 'filters-form')) }}
               
               <div class="grande_crick">
                <div>
                {{ Form::label('testo', 'Testo del messaggio') }}
                {{ Form::textarea('testo', '', ['id' => 'testo', 'placeholder' => 'Scrivi il tuo messaggio']) }}
                @if ($errors->first('testo'))
                    <ul class="errors">
                @foreach ($errors->get('testo') as $message)
                    <li>{{ $message }}</li>
                @endforeach
                    </ul>
                @endif
               </div>
               <div>
                @if($mess->dest->id == Auth::user()->id)
                   {{ Form::hidden('id_dest', $mess->mitt->id, ['id' => 'id_dest']) }}
               @else
                   {{ Form::hidden('id_dest', $mess->dest->id, ['id' => 'id_dest']) }}
               @endif
                {{ Form::hidden('id_alloggio', $mess->alloggio->id, ['id' => 'id_alloggio']) }}
               </div>
                <center>
                <div class="container-form-btn">                
                {{ Form::submit('Invia messaggio', ['class' => 'form-btn1']) }}
                </div>
                </center>
    
                {{ Form::close() }}

               </div> <!-- Respond End -->
             @endisset
            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->
         </section>
@endsection