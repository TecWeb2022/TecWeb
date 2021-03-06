@extends('layouts.admin')

@section('title', 'Gestione Faqs')

@section('scripts')
@parent
<script>
    $(document).ready(function () {
        currNavBar(3);
    });
</script>
@endsection

@section('content')

<section id="journal">

    <div class="row">
        <div class="twelve columns align-center">
            <h2>Gestione FAQs</h2>
        </div>
    </div>

    <div class="blog-entries">
        @isset($faqs)
        <!-- Entry -->
        <article class="row entry">
            @foreach($faqs as $faq)
            <div class="entry-header">

                <div class="ten columns entry-title pull-right piccolo-crick">
                    <div class="bordo_normale_g1 piccolo-crick"> </div>
                    <h3>{{ $faq->domanda }}</h3>

                </div>


            </div>

            <div class="ten columns offset-2 post-content piccolo-crick">
                <p>{{ $faq->risposta }}
                </p>
                <div class="row bottone_inline">
                    <div class="column">
                        <button class="btn" onclick="location.href ='{{ route('modifyFaq', ['id' => $faq->id]) }}';">
                            Modifica
                        </button>
                    </div>

                    <div class="column">
                        {{ Form::open(array('route' => 'eliminaFaq', 'id'=>'eliminaForm', 'class' => 'register-form','onsubmit' => 'return ConfirmDelete()')) }}

                        {{ Form::hidden('id', $faq->id, ['id' => 'id']) }}

                        {{ Form::submit('Elimina', ['class' => 'btn']) }} 
                        <!--'elimina'=submit value--> 
                        {{ Form::close() }}



                    </div>
                </div>  
            </div>
            @endforeach
        </article> 
        @endisset
        <!-- Entry -->

        <article class="row entry">

            <div class="entry-header">

                <center><label class='labelAdd'>Aggiungi una nuova FAQ</label></center>

                <button class="btn2 iconbutton2 " onclick="location.href = 'gestioneFaqs/nuovaFaq'"> + </button> 
            </div>

        </article> 

    </div>
</section>

@endsection