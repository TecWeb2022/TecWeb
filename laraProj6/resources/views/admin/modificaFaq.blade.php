@extends('layouts.admin')

@section('title', 'modificaFaq')

@section('content')

<script type="text/javascript">
    currNavBar(2);
</script>

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Modifica FAQ</h1>
            @isset($faq)
            <!--form name="domanda_faq" action="" method="post"--> 
            {{Form::open(array('route' => 'faqModificata', 'class' => 'contact-form'))}}
                <p>
                    <!--input id="domanda" size="40" type="text" placeholder="Domanda" autofocus-->
                {{ Form::label('domanda', 'Modifica domanda ') }}
                {{ Form::text('domanda', $faq->domanda, ['id' => 'domanda', 'autofocus']) }}
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
               
                {{ Form::hidden('id', $faq->id, ['id' => 'id']) }}
                
                <!--input type="submit" value="Inserisci"-->
                {{ Form::submit('Salva', ['class' => 'form-btn1']) }}
               
            {{ Form::close() }}
            @endisset
        </div>
          

    </div>

    </section> <!-- Works Section End-->

  @endsection