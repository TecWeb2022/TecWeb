<!-- comment
auth('admin')
    // The user is authenticated...
endauth
 
guest('admin')
    // The user is not authenticated...
endguest
-->
@extends('layouts.public')

@section('title', 'Home')

@section('scripts')
@parent
<!-- comment
integrity: consente al browser di controllare l'origine del file per assicurarsi che il codice
    non venga mai caricato se l'origine è stata manipolata.

crossorigin: verifica l'integrità del file; anonymous serve per non inviare nessuna credenziale
    (nessun cookie, nessun certificato, nessuna autorizzazione HTTP, ecc)
-->
<script
    src="https://code.jquery.com/jquery-3.1.1.js"
    integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
    crossorigin="anonymous">
</script>



<script type="text/javascript">
    $(document).ready(function () {
        currNavBar(0);
        sliderHome();
    });
</script>
@endsection

@section('content')

<section id="intro">

    <!-- Flexslider Start-->
    <div id="intro-slider" >

        <div class="row">
            <div class="twelve columns">
                @guest
                <div class="slider-text">
                    <h1><span id="traccia-font-tit">Alloggi per tutte le esigenze.</span></h1>
                    <h2 id="traccia-font-p">Le esigenze di ogni studente sono alla base del nostro progetto, a partire
                        dal quale è nata la piattaforma web per la ricerca e la prenotazione di alloggi 
                        per il mondo studentesco, HouStudent.
                    </h2>
                    <div class="pressa" >
                        <div class="flex-box-slider">

                            <a class="prev">&#10094;</a>

                            <div class="container slide">

                                <figure class="imageslide"><img src="{{asset('/images/casa1.jpg')}}"></figure>
                                <figure class="imageslide"><img src="{{asset('/images/casa2.jpg') }}"></figure>
                                <figure class="imageslide"><img src="{{asset('/images/casa3.jpg') }}"></figure>
                                <figure class="imageslide"><img src="{{asset('/images/casa4.jpg') }}"></figure>
                                <figure class="imageslide"><img src="{{asset('/images/casa5.jpeg') }}"></figure>

                            </div>
                            <a class="next">&#10095;</a>
                        </div>

                        <div class="pulsanti" style="text-align: center">
                            <span class="dot pressa" data-num='1'></span>
                            <span class="dot pressa" data-num='2'></span>
                            <span class="dot pressa" data-num='3'></span>
                            <span class="dot pressa" data-num='4'></span>
                            <span class="dot pressa" data-num='5'></span>
                        </div>

                    </div>


                </div>

                @endguest
                @can('isLoc')
                <div class="slider-text">
                    <h1><span id="traccia-font-tit">Area Locatario</span></h1>
                    <p>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}
                    </p>
                </div>
                @endcan
                @can('isAdmin')
                <div class="slider-text">
                    <h1><span id="traccia-font-tit">Area Admin</span></h1>
                    <h2 class='benvenuto_admin'>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}
                    </h2>
                </div>
                @endcan
                @can('isHost')
                <div class="slider-text">
                    <h1><span id="traccia-font-tit">Area Locatore</span></h1>
                    <p>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}
                    </p>
                </div>
                @endcan

            </div>
        </div>

    </div> 

</section> 


<section class="mission">

    <div class="row">
        
        <div class="twelve columns align-center">
            <h3><a href="{{asset('/Gruppo 08.pdf')}}" download><u>DOCUMENTAZIONE DEL PROGETTO IN FORMATO PDF</u></a></h3><br><br>
            <h2>OBIETTIVO</h2>
        </div>
    </div>

    <div class="row">
        <div class="twelve columns align-center">
           
            <p>
                La nostra azienda 'HouStudent', nasce con lo scopo di agevolare la vita degli studenti, 
                in particolare l'obiettivo principale corrisponde a rendere fruibile un'ampia gamma di offerte
                per trovare una sistemazione nella città scelta da ogni ragazzo per il proprio percorso di studi.
                Questo viene reso possibile dalla rete informatica che si viene ad instaurare grazie alla piattaforma HouStudent, 
                la quale riesce ad intersecare la necessità di alcuni locatori che intendono comunicare la disponibilità
                di affitto delle loro proprietà a prezzi contenuti e la necessità degli studenti di trovare un alloggio
                economico situato in posizioni strategiche per lo spostamento verso la sede degli studi.
            </p>
        </div>
    </div>

</section>

<section id="info">
    <div class="row">
        <div class="twelve columns align-center">
            <h2>SERVIZI OFFERTI</h2>
        </div>
    </div>
    <div class="row" style="max-width: 1300px; ">

        <div class="bgrid-quarters s-bgrid-halves flex-box">

            <div class="columns_bianco">
                <h2>Vedi nel dettaglio ogni alloggio</h2>

                <p>Se intendi registrarti come locatario, oltre alla possibilità condivisa con gli altri utenti di aprire il catalogo,
                    hai la funzione di filtraggio degli alloggi secondo i tuoi parametri di ricerca preferiti e la possibilità
                    di visualizzare i dettagli di ogni singolo alloggio. 
                </p>
            </div>

            <div class="columns_bianco">
                <h2>Invia richieste di prenotazione</h2>

                <p>Una volta che hai scelto l'alloggio più compatibile con le tue esigenze è possibile inviare una
                    richiesta di prenotazione per il periodo disponibile, in attesa della conferma della prenotazione
                    da parte del suo locatore.
                </p>
            </div>

            <div class="columns_bianco">
                <h2>Inserisci e monitora i tuoi alloggi</h2>

                <p>Se intendi registrarti come locatore, hai la possibilità di inserire, visualizzare e
                    modificare annunci per i tuoi alloggi, oltre a valutare le richieste ricevute per essi.
                </p>
            </div>

            <div class="columns_bianco">
                <h2>Scambia messaggi con gli utenti</h2>

                <p>Il sito web offre la possibilità di utilizzare la chat interna una volta effettuato il login,
                    attraverso la quale puoi contattare gli utenti con cui ti interessa chiarire dettagli su annunci
                    o richieste di prenotazione.
                </p>
            </div>

        </div>

    </div>

</section> 

<section class="mission">

    <div class="row">
        <div class="twelve columns align-center">
            <h2>ACCESSO AI SERVIZI</h2>
        </div>
    </div>

    <div class="row">
        <div class="twelve columns align-center">
            <p>
                Per riuscire a sfruttare al massimo i servizi garantiti dalla piattaforma, è necessario
                effettuare la registrazione al sito e successivamente il login con l'account personale
                tramite l'apposita Form. Una volta eseguiti questi passaggi, verranno resi disponibili
                i servizi assegnati ad ogni tipologia di utente mediante i bottoni presenti nella Homepage 
                personalizzata ad hoc.
            </p>
        </div>
    </div>

</section>

<section class="regolamento">

    <div class="row">
        <div class="twelve columns align-center">
            <h2>REGOLAMENTO GENERALE D'USO</h2>
        </div>
    </div>

    <div class="row">
        <div class="twelve columns align-center">
            <p>
                1. Un utente non registrato, può solamente visualizzare la HomePage del sito e le relative FAQs <br>
                2. E' possibile accedere al catalogo degli annunci e navigare fra di essi anche senza effettuare l'accesso <br>
                3. All'interno della pagina di Registrazione, vi è la necessità di decidere la tipologia dell'account 
                da creare in base alle esigenze dell'utente. <br>
                4. Se si accede come locatori, sarà possibile gestire le proprie offerte personali, accettare eventuali richieste 
			 e visualizzare il catalogo. <br>
                5. Se si accede come locatari, sarà possibile filtrare il catalogo delle offerte secondo le proprie esigenze, 
                presentando eventuali richieste di prenotazione. <br>
                6. Quando un locatario opziona un'offerta, è tenuto ad inviare un messaggio al proprietario dell'alloggio, 
			 così da iniziare una nuova conversazione all'interno del sistema di messaggistica tra i due utenti. <br>
                7. Attraverso il sistema di messaggistica, gli utenti registrati potranno visualizzare l'elenco degli eventuali 
			 messaggi ricevuti e di quelli inviati. Potranno, inoltre, rispondere ai vari mittenti. <br>
                8. Un utente registrato, potrà visualizzare il proprio profilo utente e modificarlo. Potrà, inoltre, effettuare, 
			 in qualsiasi momento, il logout.
            </p>
        </div>
    </div>

</section>
<section id="journal">

    <div class="row">
        <div class="twelve columns align-center">
            <h2>FAQs</h2>
        </div>
    </div>

    <div class="blog-entries">
        @isset($faqs)

        <article class="row entry">
            @foreach($faqs as $faq)
            <div class="entry-header">

                <div class="ten columns entry-title pull-right">
                    <h3>{{ $faq->domanda }}</h3>
                </div>

            </div>

            <div class="ten columns offset-2 post-content">
                <p>{{ $faq->risposta }}
                </p>
            </div>
            @endforeach

        </article>
    </div>
</section>
@endisset()

@endsection