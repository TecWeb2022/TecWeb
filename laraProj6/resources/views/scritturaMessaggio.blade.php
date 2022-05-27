@extends('layouts.public')

@section('title', 'Scrittura messaggio')

@section('content')

<script type="text/javascript">
currNavBar(3);
</script>

<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="twelve columns">
            
             @isset($mess)
            <div id="comments2">
               
               <h1>Rispondi a {{ $mess->mitt->nome }} {{ $mess->mitt->cognome }}</h1>
               <h3>In merito all'alloggio:<p>{{ $mess->alloggio->nome }}<p></h3>
               <h5>Testo del messaggio ricevuto:<cite> "{{ $mess->testo }}"</cite></h5>
               
               {{ Form::open(array('route' => 'inviaMessLoc', 'class' => 'filters-form')) }}
               
               <div class="crick">
                {{ Form::label('testo', 'Testo del messaggio', ['title' => 'Valore facoltativo']) }}
                {{ Form::textarea('testo', '', ['id' => 'testo', 'placeholder' => 'Scrivi il tuo messaggio qua']) }}
                
                {{ Form::hidden('id_dest', $mess->mitt->id, ['id' => 'id_dest']) }}
                {{ Form::hidden('id_alloggio', $mess->alloggio->id, ['id' => 'id_alloggio']) }}
               
                <center><div class="container-form-btn">                
                {{ Form::submit('Invia messaggio', ['class' => 'form-btn1']) }}
                </div></center>
    
                {{ Form::close() }}

               </div> <!-- Respond End -->
             @endisset
            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->

@endsection