@extends('layouts.locatore')

@section('title', 'Richieste di opzione')

@section('content')

<!-- Content
   ================================================== -->
   <div id="works">

      <div class="row row-bianco">



            <!-- Comments
            ================================================== -->
            <div id="comments">

                <center><h2>Richieste di opzione ricevute</h2></center>
               <!-- commentlist -->
               @isset($dati)
               <ol class="optionlist ">
                  @foreach($dati as $d)
                  
                  <li class="flex-box flex-row">
                     
                      <div class="div_imgn_casa_catalog">
                            <div class="flex-box flex-vertical-center">
                                    <img src="{{asset('/storage/' . $d->path_foto) }}" palt="">
                            </div>
                      </div>
                      
                     <div class="column seven">
                     <div class="comment-info">
                        
                         <h3 class="nome_mitt">{{ $d->nome_acc }}</h3>
                                 <p class="titolo">Richiesto da: 
                                 <span class="testo">{{ $d->nome_loc }} {{ $d->cognome_loc }}
                             </span></p>
                             <p class="titolo">Sesso: 
                                 <span class="testo">{{$d->sesso}}
                             </span></p>
                             <p class="titolo">Data di nascita: 
                                 <span class="testo">{{ date('d-m-Y', strtotime($d->data_nasc)) }}
                             </span></p>

                        <div class="comment-meta">
                           <p class="ricevuto_messagistica">
                               <p class="titolo">Inviato il: 
                                 <span class="testo"> {{ date('d-m-Y H:i', strtotime($d->created_at_opt)) }}
                             </span></p>
                          </p>
                        </div>
                     </div>
                     </div>
                      
                      <div class="column width-opt-button">
                      @if($d->data_stipula == null)
                      {{ Form::open(array('route' => 'accettaOfferta', 'class' => 'flex-box')) }}
                      {{ Form::hidden('id_opt', $d->id_opt, ['id' => 'id_opt']) }}
                      {{ Form::hidden('from_bool', true, ['id' => 'from_bool']) }}
                      {{ Form::submit('Accetta', ['class' => 'submit_button', 'title' => 'Assegnamento alloggio al locatario richiedente']) }}
                      {{ Form::close() }}
                      @else
                      {{ Form::open(array('route' => 'contratto', 'class' => 'flex-box')) }}
                      {{ Form::hidden('id_opt', $d->id_opt, ['id' => 'id_opt']) }}
                      {{ Form::submit('Contratto', ['class' => 'submit_button', 'title' => 'Visualizza il contratto stipulato con il locatario']) }}
                      {{ Form::close() }}
                      @endif
                       </div>
                  </li>
                     @endforeach
                        
               </ol> <!-- Commentlist End -->
               <!-- Pagination -->
               <center>@include('pagination.paginator', ['paginator' => $dati])</center>
               @endisset
               </div><!-- Respond End -->

            </div>  <!-- Comments End -->

         </div> <!-- Comments End -->

@endsection
