@extends('layouts.admin')

@section('title', 'modificaFaq')

@section('scripts')
@parent
<script>
    $(document).ready( function() {
        currNavBar(3);
    });
</script>
@endsection

@section('content')

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          <div class="column">
              
            <h2>Modifica FAQ</h2>
            
            @isset($faq)
            <!--form name="domanda_faq" action="" method="post"--> 
            {{Form::open(array('route' => array('faqModificata', 'id' => $faq->id), 'class' => 'contact-form'))}}
                <p>
                    <!--input id="domanda" size="40" type="text" placeholder="Domanda" autofocus-->
                {{ Form::label('domanda', 'Modifica domanda ') }}
                {{ Form::textarea('domanda', $faq->domanda, ['id' => 'domanda', 'autofocus']) }}
                @if ($errors->first('domanda'))
                <ul class="errors">
                    @foreach ($errors->get('domanda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                    
                </p>
                <p>
                    <!--textarea class="" id="risposta" name="Risposta" rows="5" cols="51" placeholder="Risposta(max 255 caratteri)"></textarea-->
                    {{ Form::label('risposta', 'Modifica risposta') }}
                {{ Form::textarea('risposta', $faq->risposta, ['id' => 'risposta']) }}
                 @if ($errors->first('risposta'))
                <ul class="errors">
                    @foreach ($errors->get('risposta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </p>
                
                <!--input type="submit" value="Inserisci"-->
                {{ Form::submit('Salva', ['class' => 'form-btn1']) }}
               
            {{ Form::close() }}
            @endisset
        </div>
          

    </div>

    </section> <!-- Works Section End-->

  @endsection