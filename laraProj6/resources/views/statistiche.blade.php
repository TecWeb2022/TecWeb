@extends('layouts.admin')

@section('title', 'Statistiche')

@section('content')
 
<script type="text/javascript">
    currNavBar(1);
</script>


<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h2 class="center2">Statistiche</h2>
            <p>Da qui si può, compilando i campi come si vuole, vedere la statistiche e i numeri riguradanti:
                offerte di alloggio presenti nel sito,   offerte di locazione fatte dai potenziali locatari,  alloggi locati. </p>
             
                <p>
            {{ Form::label('tipologia', 'Tipologia') }}
            {{ Form::select('tipologia', ['all' => 'Tutti', 'ap' => 'Appartamento', 'cs' => 'Camera singola', 'cd' => 'Camera doppia'],'', ['id' => 'tipologia']) }}

            
        {{ Form::label('inizio_fine_disp', 'Data inizio e fine periodo') }}
        {{ Form::date('inizio_per', '', ['id' => 'inizio_per']) }}
        @if ($errors->first('inizio_per'))
        <ul class="errors">
        @foreach ($errors->get('inizio_per') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif   
       
          
        {{ Form::date('fine_per', '',['id' => 'fine_per']) }}
        @if ($errors->first('fine_per'))
        <ul class="errors">
        @foreach ($errors->get('fine_per') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif    
          
          </div> 
    </section> <!-- Works Section End-->
    
     <!-- Info Section
   ================================================== -->
   <section id="info">

       <div class="row">

         <div class="bgrid-thirds-one s-bgrid-halves">

           <div class="columns_bianco">
              <h2 class="center2">Alloggi nel sito</h2>

              <p class="paragrafo center2">0</p>
           </div>

           <div class="columns_bianco">
              <h2 class="center2">Offerte locatari</h2>

              <p class="paragrafo center2">0</p>
           </div>

           <div class="columns_bianco s-first">
              <h2 class="center2">Alloggi locati</h2>

              <p class="paragrafo2 center2">0</p>
           </div>

         
           </div>

      </div>

   </section> <!-- Info Section End-->
@endsection