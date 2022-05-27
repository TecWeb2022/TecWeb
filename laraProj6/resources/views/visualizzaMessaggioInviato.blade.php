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
          <div class="column">
               <p class="titolo">Destinatario: 
               <span class="testo">{{ $mess->dest->nome }} {{ $mess->dest->cognome }}</span>
               </p>
               <p class="titolo">Inviato: <span class="testo">{{ date('d-m-Y h:m', strtotime($mess->created_at)) }}</span></p> 
              <p class="titolo">Nome alloggio: <span class="testo">{{ $mess->alloggio->nome }}</span></p> 
               
          </div>
      </div>
          <div class="flex-box flex-space">
                <div class="column">
                    <h3>Testo del messaggio</h3>
                    <p class="titolo">{{ $mess->testo }}</p> 
                    
                </div>
              
              <div class="column">
                  <h3>Riscrivi</h3>
                  <div class="flex-box">
                        <button onclick="location.href = '{{ route('riscritturaMessLoc', [ 'id_mess' => $mess->id ]) }}';">Riscrivi</button>
                  </div>
              </div>
         
         </div> <!-- Comments End -->
 </section>
@endisset

@endsection