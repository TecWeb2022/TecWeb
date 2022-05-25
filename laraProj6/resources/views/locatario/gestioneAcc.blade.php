@extends('layouts.locatario')

@section('title', 'Gestione alloggi')

@section('content')

<script type="text/javascript">
     currNavBar(1);
</script>

@isset($catHost)
 <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h3>Gestione degli alloggi</h3></center>
               <!-- commentlist -->
               <ol class="commentlist">
                  @foreach($catHost as $acc)
                  <!--li class="depth-1"-->
                  <li>

                     <div class="imgn_casa">
                        <img width="10" height="10" class="imgn_casa" src="{{ $acc->path_foto }}" palt="">
                     </div>

                     <div class="comment-info">
                         <cite>{{ $acc->nome }}</cite>

                        <div class="comment-meta">
                           <p>Disponibilità: {{ date('d-m-Y', strtotime($acc->inizio_disp)) }} / {{ date('d-m-Y', strtotime($acc->fine_disp)) }}</p>
                        </div>
                     </div>

                     <div class="dettagli_cat">
                         <img width="10" height="10" class="icona_posizione" src="/images/position-icon.png" alt="">
                         <a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a>
                         <p>@include('helpers/tipologiaAcc', ['acc' => $acc])</p>
                         @include('helpers/descrAcc', ['acc' => $acc])
                     
                       
                       @if($acc->assegnato == false)
                         <div class="center">
                             <button onclick="location.href = '{{ route('visualizzaAcc', [ 'id' => $acc->id ]) }}';"> {{ $acc->canone }} €/notte</button>
                         </div>
                         @else
                         <div class="center">
                             <button disabled>Assegnato</button>
                         </div>
                         @endif
                         <!-- onclick va messo in un file js -->
                         <!-- Seconda casa in affitto -->
                     </div>
                    @endforeach
                     
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $catHost])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->



@endisset()

@endsection