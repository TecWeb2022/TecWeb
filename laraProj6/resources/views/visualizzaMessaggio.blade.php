@extends('layouts.public')

@section('title', 'Visualizza messaggio')

@section('scripts')
@parent
<script>
    $(document).ready(function() {
    currNavBar(3);
    });</script>
@endsection

@section('content')

@isset($mess)

<section id="info">
    <div class="row">
        <div id="primary" class="twelve column">

            <div class="column ">
                @if($mess->dest->id == Auth::user()->id)
                <p class="titolo">Mittente: 
                    <span class="testo">{{ $mess->mitt->nome }} {{ $mess->mitt->cognome }}</span>
                </p>
                <p class="titolo">Ricevuto: <span class="testo">{{ date('d-m-Y H:i', strtotime($mess->created_at)) }}</span></p>
                @else
                <p class="titolo">Destinatario: 
                    <span class="testo">{{ $mess->dest->nome }} {{ $mess->dest->cognome }}</span>
                </p>
                <p class="titolo">Inviato: <span class="testo">{{ date('d-m-Y H:i', strtotime($mess->created_at)) }}</span></p>
                @endif


                <p class="titolo">Alloggio: <span class="testo">{{ $mess->alloggio->nome }}</span></p> 

                <div class="bordo_testo_messaggio"></div>

                <div class="crick">
                    <h3>Testo del messaggio</h3>
                    <cite class="testo_messaggio">"{{ $mess->testo }}"</cite> 

                    @if($mess->dest->id == Auth::user()->id)
                    <h3 class="zeppa">Rispondi</h3>
                    <div>
                        <button onclick="location.href = '{{ route('scritturaMess', [ 'id' => $mess->id ]) }}';">Rispondi</button>
                    </div>
                    @else
                    <h3 class="zeppa">Riscrivi</h3>
                    <div>
                        <button onclick="location.href = '{{ route('scritturaMess', [ 'id' => $mess->id ]) }}';">Riscrivi</button>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
@endisset

@endsection