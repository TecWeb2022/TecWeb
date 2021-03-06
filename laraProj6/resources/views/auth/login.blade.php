@extends('layouts.public')

@section('title', 'Registrazione')

@section('scripts')
@parent
<script>
    $(document).ready( function() {
        currNavBar(2);
    });
</script>
@endsection

@section('content')

   <section id="works">

      <div class="row">
          
          <div class="column">
            <h2>Login</h2>
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
                       
             <div  class="wrap-input">
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username', '', ['id' => 'username', 'autofocus']) }}
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
                {{ Form::password('password', ['id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div  class="wrap-input">
                 <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
             </div> 
            
            <div class="container-form-btn">                
                {{ Form::submit('Login', ['class' => 'form-btn1']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</section>
@endsection
