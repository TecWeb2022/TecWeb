@extends('layouts.admin')

@section('title', 'nuovaFaq')

@section('content')

<script type="text/javascript">
    currNavBar(2);
</script>

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Aggiungi una nuova FAQ</h1>

            <!--form name="domanda_faq" action="" method="post"--> 
            {{Form::open(array('route' => 'inserimentoFaq', 'class' => 'contact-form'))}}
                <p>
                    <!--input id="domanda" size="40" type="text" placeholder="Domanda" autofocus-->
                {{ Form::label('domanda', 'Nuova domanda ') }}
                {{ Form::textarea('domanda', '', ['id' => 'domanda', 'autofocus']) }}
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
                    {{ Form::label('risposta', 'Risposta (max 255 caratteri)') }}
                {{ Form::textarea('risposta', '', ['id' => 'risposta']) }}
                 @if ($errors->first('risposta'))
                <ul class="errors">
                    @foreach ($errors->get('risposta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </p>
               
                    <!--input type="submit" value="Inserisci"-->
                    {{ Form::submit('Inserisci', ['class' => 'form-btn1']) }}
               
            {{ Form::close() }}
        </div>
          

    </div>

    </section> <!-- Works Section End-->

  @endsection
