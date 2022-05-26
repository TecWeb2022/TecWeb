@extends('layouts.public')

@section('title', 'Messaggistica')

@section('content')

<script type="text/javascript">
currNavBar(3);
</script>

<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><div><a href="{{ route('messaggisticaLoc') }}">Ricevuti</a> | <a href="{{ route('messaggiInvLoc') }}">Inviati</a></div></center>
               <!-- commentlist -->
               @isset($messRic)
               <ol class="commentlist">
                  @foreach($messRic as $m)
                  <!--li class="depth-1"-->
                  <li>

                     <div class="comment-info">
                         <cite>{{ $m->mitt->nome }} {{ $m->mitt->cognome }}</cite>

                        <div class="comment-meta">
                           <p>Ricevuto: {{ date('d-m-Y', strtotime($m->created_at)) }}</p>
                        </div>
                     </div>

                     <div class="dettagli_cat">
                         <p>Nome alloggio: {{ $m->alloggio->nome }}</p>
                     </div>
                      @if($m->visualizzato)
                      <button onclick="location.href = '{{ route('messaggioLoc', [ 'id_mess' => $m->id ]) }}';">Leggi</button>
                      @else
                      <button onclick="location.href = '{{ route('messaggioLoc', [ 'id_mess' => $m->id ]) }}';">Leggi</button>
                      @endif
                      
                      @endforeach
                     
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $messRic])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->

@endisset

@endsection