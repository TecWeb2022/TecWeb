@extends('layouts.public')

@section('title', 'Registrazione')

@section('content')

<script type="text/javascript">
    currNavBar(3);
</script>
    
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h2>Registrazione</h2>
            {{ Form::open(array('route' => 'register', 'class' => 'register-form')) }}
            
            <div  class="wrap-input">
                {{ Form::label('locatario', 'Affitta subito!') }}
                {{ Form::radio('tipologia', 'loc',true,['id' => 'locatario']) }}
            </div>
            
           <div  class="wrap-input">
                {{ Form::label('locatore', 'Diventa un host!') }}
                {{ Form::radio('tipologia', 'host' ,false,['id' => 'locatore']) }}
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('nome', 'Nome', ['title' => 'Valore obbligatorio']) }}
                {{ Form::text('nome', '', ['id' => 'nome', 'placeholder' => 'Nome']) }}
                @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('cognome', 'Cognome', ['title' => 'Valore obbligatorio']) }}
                {{ Form::text('cognome', '', ['id' => 'cognome', 'placeholder' => 'Cognome']) }}
                @if ($errors->first('cognome'))
                <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('sesso', 'Sesso', ['title' => 'Valore obbligatorio']) }}
                {{ Form::select('sesso', ['M' => 'Uomo', 'F' => 'Donna'], '', ['id' => 'sesso']) }}
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('data_nasc', 'Data di nascita') }}
                {{ Form::date('data_nasc', '', ['id' => 'data_nasc']) }}
                @if ($errors->first('data_nasc'))
                <ul class="errors">
                    @foreach ($errors->get('data_nasc') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username', '', ['id' => 'username', 'placeholder' => 'Username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['id' => 'password','placeholder' => 'Password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('password-confirm', 'Conferma password') }}
                {{ Form::password('password_confirmation', ['id' => 'password-confirm','placeholder' => 'Conferma password']) }}
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Registra', ['class' => 'form-btn1']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</section>
@endsection
