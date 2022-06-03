@extends('layouts.public')

@section('title', 'Modifica profilo utente')

@section('scripts')
@parent
<script>
$(document).ready(function(){
    currNavBar(2);
    usernamePlaceholder();
});
</script>
@endsection

@section('content')

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Modifica profilo utente</h1>
            
            <div class="row flex-box">
            {{ Form::open(array('route' => 'modificaProfiloPost', 'class' => 'filters-form')) }}
            
                <div>
                {{ Form::label('nome', 'Nome', ['title' => 'Nome utente']) }}
                {{ Form::text('nome', Auth::user()->nome, ['id' => 'nome']) }}
                @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
            
                <div>
                {{ Form::label('cognome', 'Cognome', ['title' => 'Cognome utente']) }}
                {{ Form::text('cognome', Auth::user()->cognome, ['id' => 'cognome']) }}
                @if ($errors->first('cognome'))
                <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
            
                <div>
                    {{ Form::label('sesso', 'Sesso', ['title' => 'Valore obbligatorio']) }}
                    {{ Form::select('sesso', ['M' => 'Uomo', 'F' => 'Donna'], Auth::user()->sesso, ['id' => 'sesso']) }}
                </div>
            
                <div>
                {{ Form::label('data_nasc', 'Data di nascita', ['title' => 'Data di nascita utente']) }}
                {{ Form::date('data_nasc', Auth::user()->data_nasc, ['id' => 'data_nasc']) }}
                @if ($errors->first('data_nasc'))
                <ul class="errors">
                @foreach ($errors->get('data_nasc') as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
                @endif
                </div>
            
                {{ Form::hidden('old_username', Auth::user()->username, ['id' => 'old_username']) }}
            
                <div>
                {{ Form::label('username', 'Username', ['title' => 'Username utente']) }}
                {{ Form::text('username', '', ['id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
            
                <div>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['id' => 'password','placeholder' => 'Nuova password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
            
            <div class="container-form-btn">                
            {{ Form::submit('Salva i dati', ['class' => 'form-btn1']) }}
            </div>
            {{ Form::close() }}
            </div>

    </div>

    </section> <!-- Works Section End-->
    
@endsection