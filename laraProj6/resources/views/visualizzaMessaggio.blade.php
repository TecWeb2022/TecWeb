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
         
          <div class="column ">
               <p class="titolo">Mittente: 
               <span class="testo">{{ $mess->mitt->nome }} {{ $mess->mitt->cognome }}</span>
               </p>
               <p class="titolo">Ricevuto: <span class="testo">{{ date('d-m-Y h:m', strtotime($mess->created_at)) }}</span></p> 
              <p class="titolo">Nome alloggio: <span class="testo">{{ $mess->alloggio->nome }}</span></p> 
               
              <div class="bordo_testo_messaggio"></div>
          
                <div class="crick">
                    <h3>Testo del messaggio</h3>
                    <cite class="testo_messaggio">"{{ $mess->testo }}"</cite> 
                    
                </div>
           </div> 
             </div> 
                <div class="sposta_btn">
                  <h3>Rispondi</h3>
                  <div>
                        <button onclick="location.href = '{{ route('scritturaMessLoc', [ 'id_mess' => $mess->id ]) }}';">Rispondi</button>
                  </div>
              </div>
         
          <!-- Comments End -->
         </div>
     </div>
 </section>
@endisset

@endsection