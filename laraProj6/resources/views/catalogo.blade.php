@extends('layouts.public')

@section('title', 'Catalogo')

@section('content')

<script type="text/javascript">
    document.getElementsByClassName("noCurrent")[1].className = "current";
</script>
<br>
<center><h1>Filtri per il catalogo</h1></center>
<center><h4>Ricerca l'alloggio in base alle tue esigenze!</h4></center>

    {{ Form::open(array('url' => '/catalogoFiltrato', 'class' => 'filters-form')) }}
    
    <div  class="wrap-input">
        {{ Form::label('tipologia', 'Tipologia', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('tipologia', '', ['id' => 'tipologia', 'placeholder' => 'Tipologia']) }}
        @if ($errors->first('nome'))
        <ul class="errors">
        @foreach ($errors->get('nome') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
    </div>
    
    <div  class="wrap-input">
        {{ Form::label('prezzo_min', 'Prezzo minimo', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('prezzo_min', '', ['id' => 'prezzo_min', 'placeholder' => 'Prezzo minimo']) }}
        @if ($errors->first('nome'))
        <ul class="errors">
        @foreach ($errors->get('nome') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
    </div>
    
    <div  class="wrap-input">
        {{ Form::label('prezzo_max', 'Prezzo massimo', ['title' => 'Valore facoltativo']) }}
        
        {{ Form::text('prezzo_max', '', ['id' => 'prezzo_max', 'placeholder' => 'Prezzo massimo']) }}
        @if ($errors->first('nome'))
        <ul class="errors">
        @foreach ($errors->get('nome') as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        @endif
    </div>
    
    <div class="container-form-btn">                
        {{ Form::submit('Filtra', ['class' => 'form-btn1']) }}
    </div>
    
    {{ Form::close() }}



@isset($cat)
<!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content2" class="row">

         <div id="primary" class="ten columns">

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h3>Catalogo alloggi</h3></center>
               <!-- commentlist -->
               <ol class="commentlist">
                  @foreach($cat as $acc)
                  <!--li class="depth-1"-->
                  <li>

                     <div class="imgn_casa">
                        <img width="10" height="10" class="imgn_casa" src="{{ $acc->path_foto }}" palt="">
                     </div>

                     <div class="comment-info">
                         <cite>{{ $acc->nome }}</cite>

                        <div class="comment-meta">
                           <p>Disponibilità: {{ $acc->inizio_disp }} / {{ $acc->fine_disp }}</p>
                        </div>
                     </div>

                     <div class="dettagli_cat">
                         <img width="10" height="10" class="icona_posizione" src="images/position-icon.png" alt="">
                         <a href="http://maps.google.com/?q={{ $acc->via }}, {{ $acc->num_civ }}, {{ $acc->prov }}" target="_blank">{{ $acc->via }} {{ $acc->num_civ }}, {{ $acc->citta }}, {{ $acc->prov }}</a>
                         <p>{{ $acc->tipologia }}</p>
                         @include('helpers/descrAcc', ['acc' => $acc])
                     
                            <div class="center">
                                <button onclick="location.href = '{{ route('register') }}';"> {{ $acc->canone }} €/notte</button> </div>
                         <!-- onclick va messo in un file js -->
                         <!-- Seconda casa in affitto -->
                     </div>
                    @endforeach
                     
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $cat])</center>

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         </div> <!-- Comments End -->

@endisset()

@endsection