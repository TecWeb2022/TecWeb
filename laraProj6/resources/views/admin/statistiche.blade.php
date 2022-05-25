@extends('layouts.admin')

@section('title', 'Statistiche')

@section('content')
 
<script type="text/javascript">
    currNavBar(2);
</script>


<!-- Works Section
   ================================================== -->
   <section id="info">

      <div class="row">
          <h1 class="center2">Statistiche</h1>
          <p>Da qui si possono effettuare statistiche riguardo:
                offerte di alloggio presenti nel sito, offerte di locazione fatte dai potenziali locatari, alloggi locati. </p>
          <div class="column">
              <h2 class="center2">Filtri</h2>
                <p>
        {{ Form::open(array('route' => 'statisticheFiltrate', 'class' => 'register-form')) }}
                    
        {{ Form::label('tipologia', 'Tipologia') }}
        {{ Form::select('tipologia', ['all' => 'Tutti', 'ap' => 'Appartamento', 'cs' => 'Camera singola', 'cd' => 'Camera doppia'],'', ['id' => 'tipologia']) }}

            
        {{ Form::label('inizio', 'Data inizio periodo') }}
        {{ Form::date('inizio', '', ['id' => 'inizio']) }}
       
        {{ Form::label('fine', 'Data fine periodo') }}
        {{ Form::date('fine', '',['id' => 'fine']) }}
        
        {{ Form::submit('Filtra', ['class' => 'btn']) }}

        {{ Form::close() }}
          
          </div>
          
          
          @isset($stats)
          <div class=" columns_bianco colonna_risultati">
              <h2 class="align-center">Risultati</h2>
              <!--div class="bgrid-thirds-one s-bgrid-halves"-->

           <div>
              <h2 class="align-center bordo_risultati">Alloggi nel sito</h2>

              <p class="paragrafo align-center ">{{ $stats['alloggi_tot'] }}</p>
           </div>

           <div>
              <h2 class="align-center bordo_risultati">Offerte locatari</h2>

              <p class="paragrafo align-center">{{ $stats['offerte'] }}</p>
           </div>
              
           <div>
              <h2 class="align-center bordo_risultati">Alloggi locati</h2>

              <p class="paragrafo align-center">{{ $stats['alloggi_locati'] }}</p>
           </div>
          </div>
        </div>
        @endisset
          
          
          
      </div>
    </section> <!-- Works Section End-->

@endsection