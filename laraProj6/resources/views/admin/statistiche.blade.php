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
          <div class="column">
              <h2 class="center2">Risultati per i filtri:</h2>
              <!--div class="bgrid-thirds-one s-bgrid-halves"-->
              
              @if($stats['filter_tipologia'] != 'all')
              <p>Tipologia: @include('helpers/tipologiaAcc', ['tipologia' => $stats['filter_tipologia']])</p>
              @else
              <p>Tipologia: qualsiasi</p>
              @endif
              
              @if($stats['filter_inizio'] != null)
              <p>Data inizio: {{ date('d-m-Y', strtotime($stats['filter_inizio'])) }}</p>
              @else
              <p>Data inizio: non specificata</p>
              @endif
              
              @if($stats['filter_fine'] != null)
              <p>Data fine: {{ date('d-m-Y', strtotime($stats['filter_fine'])) }}</p>
              @else
              <p>Data fine: non specificata</p>
              @endif
              
           <div class="columns_bianco">
              <h2 class="center2">Alloggi nel sito</h2>

              <p class="paragrafo center2">{{ $stats['alloggi_tot'] }}</p>
           </div>

           <div class="columns_bianco">
              <h2 class="center2">Offerte locatari</h2>

              <p class="paragrafo center2">{{ $stats['offerte'] }}</p>
           </div>

           <div class="columns_bianco s-first">
              <h2 class="center2">Alloggi locati</h2>

              <p class="paragrafo2 center2">{{ $stats['alloggi_locati'] }}</p>
           <!--/div-->
          </div>
        </div>
        @endisset
          
          
          
      </div>
    </section> <!-- Works Section End-->

@endsection