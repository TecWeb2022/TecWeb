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
               <p class="titolo">Mittente: 
               <span class="testo">{{ $mess->mitt->nome }} {{ $mess->mitt->cognome }}</span>
               </p>
               <p class="titolo">Ricevuto: <span class="testo">{{ date('d-m-Y', strtotime($mess->created_at)) }}</span></p> 
              <p class="titolo">Nome alloggio: <span class="testo">{{ $mess->alloggio->nome }}</span></p> 
               
          </div>
      </div>
          <div class="flex-box flex-space">
                <div class="column">
                    <h3>Testo del messaggio</h3>
                    <p class="titolo">{{ $mess->testo }}</p> 
                    
                </div>
              
              <div class="column">
                  <h3>Rispondi</h3>
                  <div class="flex-box">
                        <button onclick="location.href = '{{ route('scritturaMessLoc', [ 'id_mess' => $mess->id ]) }}';">Rispondi</button>
                  </div>
              </div>
         
         </div> <!-- Comments End -->
 </section>
@endisset

@endsection