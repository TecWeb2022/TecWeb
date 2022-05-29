@extends('layouts.public')

@section('title', 'Scrittura messaggio')

@section('content')

<script type="text/javascript">
currNavBar(3);
</script>

<!-- Content
   ================================================== -->
   <section class="info">

      <div class="row">

         <div id="primary" class="twelve columns">
            
             @isset($mess)
            <div id="comments2">
               
               <h1>Riscrivi a {{ $mess->dest->nome }} {{ $mess->dest->cognome }}</h1>
               <cite>In merito all'alloggio {{ $mess->alloggio->nome }}</cite>
               
               {{ Form::open(array('route' => 'inviaMessLoc', 'class' => 'filters-form')) }}
               
               <div  class="grande_crick">
                   <div>
                {{ Form::label('testo', 'Testo del messaggio', ['title' => 'Valore facoltativo']) }}
                {{ Form::textarea('testo', '', ['id' => 'testo', 'placeholder' => 'Scrivi il tuo messaggio qua']) }}
                  </div>
                   
                  <div>
                {{ Form::hidden('id_dest', $mess->dest->id, ['id' => 'id_dest']) }}
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