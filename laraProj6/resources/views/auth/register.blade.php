@extends('layouts.public')

@section('title', 'Registrazione')

@section('content')

<script type="text/javascript">
    document.getElementsByClassName("noCurrent")[3].className = "current";
</script>

   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Registrazione</h1>
            {{ Form::open(array('route' => 'register', 'class' => 'register-form')) }}
            
            <div  class="wrap-input">
                {{ Form::label('tipologia', 'Affitta subito!', ['class' => 'label-input']) }}
                {{ Form::radio('tipologia', 'locatario',['class' => 'input', 'id' => 'locatario']) }}
                @if ($errors->first('tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('tipologia') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
           <div  class="wrap-input">
                {{ Form::label('tipologia', 'Diventa un host!', ['class' => 'label-input']) }}
                {{ Form::radio('tipologia', 'host',true ,['class' => 'input', 'id' => 'locatore']) }}
                @if ($errors->first('tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('tipologia') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('nome', 'Nome', ['class' => 'label-input','title' => 'Valore obbligatorio']) }}
                {{ Form::text('nome', '', ['class' => 'input', 'id' => 'surname', 'placeholder' => 'Nome']) }}
                @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('cognome', 'Cognome', ['class' => 'label-input','title' => 'Valore obbligatorio']) }}
                {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'surname', 'placeholder' => 'Cognome']) }}
                @if ($errors->first('cognome'))
                <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('data_nasc', 'Data di nascita', ['class' => 'label-input']) }}
                {{ Form::date('data_nasc', '', ['class' => 'input','id' => 'data_nasc']) }}
                @if ($errors->first('data_nasc'))
                <ul class="errors">
                    @foreach ($errors->get('data_nasc') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username', 'placeholder' => 'Username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password','placeholder' => 'Password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm','placeholder' => 'Conferma password']) }}
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Registra', ['class' => 'form-btn1']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection
