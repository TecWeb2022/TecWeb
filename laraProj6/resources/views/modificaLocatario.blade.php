@extends('layouts.public')

@section('title', 'Modifica profilo utente')

@section('content')

<!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Modifica profilo utente</h1>
            
            <div class="row flex-box">
            {{ Form::open(array('route' => 'modificaLoc', 'class' => 'filters-form')) }}
            
                <div>
                {{ Form::label('nome', 'Nome', ['title' => 'Nome utente']) }}
                {{ Form::text('nome', '', ['id' => 'nome', 'placeholder' => '']) }}
                </div>
            
                <div>
                {{ Form::label('cognome', 'Cognome', ['title' => 'Cognome utente']) }}
                {{ Form::text('cognome', '', ['id' => 'cognome', 'placeholder' => '']) }}
                </div>
            
                <div>
                {{ Form::label('datanasc', 'Data di nascita', ['title' => 'Data di nascita utente']) }}
                {{ Form::text('datanasc', '', ['id' => 'datanasc', 'placeholder' => '']) }}
                </div>
            
            <div class="container-form-btn">                
            {{ Form::submit('Salva i dati', ['class' => 'form-btn1']) }}
            </div>
            {{ Form::close() }}
            </div>

    </div>

    </section> <!-- Works Section End-->