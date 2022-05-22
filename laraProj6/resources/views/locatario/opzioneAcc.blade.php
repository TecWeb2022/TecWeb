@extends('layouts.locatario')

@section('title', 'Opzionamento')

@section('content')

<script type="text/javascript">
     currNavBar(1);
</script>

@isset($acc)
<!-- Content
   ================================================== -->
 <section id="works">

      <div class="row row-bianco">
          <h2 class="text-center add-bottom">{{ $acc->nome}}  </h2>
         
      <div class="flex-box flex-inline add-bottom">
          <div class="column">
                <div class="div_imgn_visual_casa">
                        <img  class="imgn_visual_casa" src="{{ $acc->path_foto }}" palt="">
                </div>
          </div>
          <div class="column">
               @php
               $
               @endphp
               {{ Form::open(array('route' => 'opzioneAccPost', 'class' => 'register-form')) }}
            
            <div  class="wrap-input">
                {{ Form::label('data_inizio', 'Data inizio soggiorno') }}
                {{ Form::date('data_inizio', '', ['id' => 'data_inizio']) }}
                @if ($errors->first('data_inizio'))
                <ul class="errors">
                    @foreach ($errors->get('data_inizio') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
               
            <div  class="wrap-input">
                {{ Form::label('data_fine', 'Data fine soggiorno') }}
                {{ Form::date('data_fine', '', ['id' => 'data_fine']) }}
                @if ($errors->first('data_fine'))
                <ul class="errors">
                    @foreach ($errors->get('data_fine') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('nota', 'Nota') }}
                {{ Form::textarea('nota', '', ['id' => 'nota', 'placeholder' => 'Nota']) }}
                @if ($errors->first('nota'))
                <ul class="errors">
                    @foreach ($errors->get('nota') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
          
            <div class="container-form-btn">                
                {{ Form::submit('Registra', ['class' => 'form-btn1']) }}
            </div>
            
            {{ Form::close() }}
            
          </div>
      </div>
          <!-- da fare -->
              <div class="column">
                  <h3>Chatta col proprietario</h3>
                  <div class="flex-box">
                        <button onclick="location.href = '{{ route('OpzioneAcc') }}';"> Affitta per {{ $acc->canone}}€ al mese</button> 
                  </div>
              </div>
         
         </div> <!-- Comments End -->
 </section>
@endisset()

@endsection