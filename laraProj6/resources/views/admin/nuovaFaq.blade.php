@extends('layouts.admin')

@section('title', 'nuovaFaq')

@section('scripts')
@parent
<script>
    $(document).ready(function () {
        currNavBar(3);
    });
</script>
@endsection

@section('content')

<section id="works">

    <div class="row">

        <div class="column">
            <h2>Aggiungi una nuova FAQ</h2>


            {{Form::open(array('route' => 'inserimentoFaq', 'class' => 'contact-form'))}}
            <p>

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

                {{ Form::label('risposta', 'Risposta') }}
                {{ Form::textarea('risposta', '', ['id' => 'risposta']) }}
                @if ($errors->first('risposta'))
            <ul class="errors">
                @foreach ($errors->get('risposta') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            </p>


            {{ Form::submit('Inserisci', ['class' => 'form-btn1']) }}

            {{ Form::close() }}
        </div>


    </div>

</section>

@endsection

