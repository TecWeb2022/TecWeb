@extends('layouts.public')

@section('title', 'Visualizza messaggio')

@section('content')

<script type="text/javascript">
     currNavBar(3);
</script>

@isset($mess)
<!-- Content
   ================================================== -->
 <section id="works">
     <div class="row">
          <div class="column">
              <div>
                  <div class="column">
               <p class="titolo">Destinatario: 
               <span class="testo">{{ $mess->dest->nome }} {{ $mess->dest->cognome }}</span>
               </p>
               <p class="titolo">Inviato: <span class="testo">{{ date('d-m-Y h:m', strtotime($mess->created_at)) }}</span></p> 
              <p class="titolo">Nome alloggio: <span class="testo">{{ $mess->alloggio->nome }}</span></p> 
               
              <div class="bordo_testo_messaggio"></div>
      
                    <div class="crick">
                    <h3>Testo del messaggio</h3>
                    <p class="testo_messaggio">"{{ $mess->testo }}"</p> 
                    
                </div>
                </div>
                </div> 
              <div class="sposta_btn">
                  <h3>Riscrivi</h3>
                  <div>
                        <button onclick="location.href = '{{ route('riscritturaMessLoc', [ 'id_mess' => $mess->id ]) }}';">Riscrivi</button>
                  </div>
              </div>
         </div>
         </div> <!-- Comments End -->
 </section>
@endisset

@endsection