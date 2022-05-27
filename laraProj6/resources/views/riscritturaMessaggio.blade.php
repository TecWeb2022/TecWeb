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

         <div id="primary" class="ten columns">
            
             @isset($mess)
            <div id="comments">
               
               <h1>Riscrivi a {{ $mess->dest->nome }} {{ $mess->dest->cognome }}</h1>
               <h2>In merito all'alloggio {{ $mess->alloggio->nome }}</h2>
               
               {{ Form::open(array('route' => 'inviaMessLoc', 'class' => 'filters-form')) }}
               
               <div  class="wrap-input">
                {{ Form::label('testo', 'Testo del messaggio', ['title' => 'Valore facoltativo']) }}
                {{ Form::textarea('testo', '', ['id' => 'testo', 'placeholder' => 'Scrivi il tuo messaggio qua']) }}
                
                {{ Form::hidden('id_dest', $mess->dest->id, ['id' => 'id_dest']) }}
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