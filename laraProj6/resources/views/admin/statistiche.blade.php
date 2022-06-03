@extends('layouts.admin')

@section('title', 'Statistiche')

@section('scripts')
@parent

<script>
    $(document).ready( function() {
        currNavBar(2);
    });
</script>

<script src="Chart.js"></script>
@endsection

@section('content')

<!-- Works Section
   ================================================== -->
   <section id="info">

      <div class="row">
          <h1 class="center2">Statistiche</h1>
          
          <div class="column">
              <h3 class="center2  bordo_risultati">Filtri</h3>
                <p>
        {{ Form::open(array('route' => 'statisticheFiltrate', 'class' => 'register-form')) }}
                    
        {{ Form::label('tipologia', 'Tipologia') }}
        {{ Form::select('tipologia', ['all' => 'Tutti', 'ap' => 'Appartamento', 'cs' => 'Camera singola', 'cd' => 'Camera doppia'],'', ['id' => 'tipologia']) }}

            
        {{ Form::label('inizio', 'Data inizio periodo') }}
        {{ Form::date('inizio', '', ['id' => 'inizio']) }}
        @if ($errors->first('inizio'))
        <ul class="errors">
        @foreach ($errors->get('inizio') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
       
        {{ Form::label('fine', 'Data fine periodo') }}
        {{ Form::date('fine', '',['id' => 'fine']) }}
        @if ($errors->first('fine'))
        <ul class="errors">
        @foreach ($errors->get('fine') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
        
        {{ Form::submit('Filtra', ['class' => 'btn']) }}

        {{ Form::close() }}
          
          </div>
          
          
          @isset($stats)
          <div class="columns_bianco colonna_risultati">
              <h2 class="align-center">Risultati per i filtri:</h2>
              <!--div class="bgrid-thirds-one s-bgrid-halves"-->
              
              @if($stats['filter_tipologia'] != 'all')
              <p class="align-center min_marg">Tipologia: @include('helpers/tipologiaAcc', ['tipologia' => $stats['filter_tipologia']])</p>
              @else
              <p class="align-center min_marg">Tipologia: qualsiasi</p>
              @endif
              
              @if($stats['filter_inizio'] != null)
              <p class="align-center min_marg">Data inizio: {{ date('d-m-Y', strtotime($stats['filter_inizio'])) }}</p>
              @else
              <p class="align-center min_marg">Data inizio: non specificata</p>
              @endif
              
              @if($stats['filter_fine'] != null)
              <p class="align-center">Data fine: {{ date('d-m-Y', strtotime($stats['filter_fine'])) }}</p>
              @else
              <p class="align-center">Data fine: non specificata</p>
              @endif
              
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
           <!--/div-->
          </div>
        </div>
        
      @endisset    
      
          
      </div>
       
      <div class="row">
         
     <canvas id="myCanvas"></canvas>
     <legend for="myCanvas"></legend>
    <script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>
          
      </div>    
      
      
    </section> <!-- Works Section End-->

@endsection