@extends('layouts.public')

@section('title', 'Visualizza messaggio')

@section('content')

<script type="text/javascript">
     currNavBar(3);
</script>

@isset($mess)
<!-- Content
   ================================================== -->
 <section id="info">
     <div class="row">
         <div id="primary" class="twelve column">
     
          <div class="column ">
               <p class="titolo">Mittente: 
               <span class="testo">{{ $mess->mitt->nome }} {{ $mess->mitt->cognome }}</span>
               </p>
               <p class="titolo">Ricevuto: <span class="testo">{{ date('d-m-Y H:i', strtotime($mess->created_at)) }}</span></p> 
              <p class="titolo">Nome alloggio: <span class="testo">{{ $mess->alloggio->nome }}</span></p> 
               
              <div class="bordo_testo_messaggio"></div>
          
                <div class="crick">
                    <h3>Testo del messaggio</h3>
                    <cite class="testo_messaggio">"{{ $mess->testo }}"</cite> 
                    <h3 class="zeppa">Rispondi</h3>
                  <div>
                      {{ Form::open(array('route' => 'scritturaMessLoc', 'class' => 'flex-box')) }}
                      {{ Form::hidden('id_mess', $mess->id, ['id' => 'id_mess']) }}
                      {{ Form::submit('Rispondi', ['title' => 'Rispondi']) }}
                      {{ Form::close() }}
                  </div>
                </div>
           </div>
         
          <!-- Comments End -->
         </div>
     </div>
 </section>
@endisset

@endsection