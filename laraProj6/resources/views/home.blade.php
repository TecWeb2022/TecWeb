@extends('layouts.public')

@section('title', 'Home')

@section('content')

<script type="text/javascript">
    document.getElementsByClassName("noCurrent")[0].className = "current";
</script>


<!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" >

		  <div class="row">
			 <div class="twelve columns">
				 <div class="slider-text">
					  <h1><span>Alloggi per tutte le esigenze.</span></h1>
                                             <p>Le esigenze di ogni studente sono alla base del nostro progetto, a partire
                                                dal quale è nata la piattaforma web per la ricerca e la prenotazione di alloggi 
                                                per il mondo studentesco, StudentB&B.
                                             </p>
				 </div>
                                 <div style="height: 200px; text-align: center;">
                                     
                                     <a href="#" class="button" style="margin-top: 5%" >Vai al Login</a>
                                     
                                 </div>
			  </div>
		 </div>
		
	   </div> <!-- Flexslider End-->

   </section> <!-- Intro Section End-->
   
   <!-- ci va la missione -->
   <section id="mission">
       
       <div class="row">
         <div class="twelve columns align-center">
            <h2>OBIETTIVO</h2>
         </div>
      </div>
       
       <div class="row">
         <div class="twelve columns align-center">
            <p>
           La nostra azienda 'Airdrop', nasce con lo scopo di agevolare la vita degli studenti, 
           in particolare l'obiettivo principale corrisponde a rendere fruibile un'ampia gamma di offerte
           per trovare una sistemazione nella città scelta da ogni ragazzo per il proprio percorso di studi.
           Questo viene reso possibile dalla rete informatica che si viene ad instaurare grazie alla piattaforma StudentB&B, 
           la quale riesce ad intersecare la necessità di alcuni locatori che intendono comunicare la disponibilità
           di affitto delle loro proprietà a prezzi contenuti e la necessità degli studenti di trovare un alloggio
           economico situato in posizioni strategiche per lo spostamento verso la sede degli studi.
       </p>
         </div>
      </div>
       
   </section>

   <!-- Info Section
   ================================================== -->
   <section id="info">

       <div class="row" style="max-width: 1300px; display: flex; justify-content:center;">

         <div class="bgrid-quarters s-bgrid-halves">

           <div class="columns_bianco">
              <h2>Vedi nel dettaglio ogni alloggio</h2>

              <p>Una volta che hai scelto l'alloggio più compatibile con le tue esigenze è possibile inviare una
                  richiesta di prenotazione per il periodo disponibile, in attesa della conferma della prenotazione
                  da parte del suo locatore.
              </p>
           </div>

           <div class="columns_bianco">
              <h2>Invia richieste di prenotazione</h2>

              <p>Una volta che hai scelto l'alloggio più compatibile con le tue esigenze è possibile inviare una
                  richiesta di prenotazione per il periodo disponibile, in attesa della conferma della prenotazione
                  da parte del suo locatore.
              </p>
           </div>

           <div class="columns_bianco s-first">
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

   </section> <!-- Info Section End-->

   <!-- Journal Section
   ================================================== -->
   <section id="journal">

      <div class="row">
         <div class="twelve columns align-center">
            <h2>FAQs</h2>
         </div>
      </div>

      <div class="blog-entries">
         @isset($faqs)
         
         <!-- Entry -->
         <article class="row entry">
            @foreach($faqs as $faq)
            <div class="entry-header">
               
               <div class="ten columns entry-title pull-right">
                  <h3>DOMANDA {{ $faq->id }}: {{ $faq->domanda }}</h3>
               </div>

               <div class="two columns post-meta end">
                  
                  <h3>#{{ $faq->id }}</h3>
                  
               </div>

            </div>

            <div class="ten columns offset-2 post-content">
                <p>RISPOSTA NUMERO {{ $faq->id }}: {{ $faq->risposta }}
               </p>
            </div>
         @endforeach
         
         </article>
      </div>
         </section>
   @endisset()

   <!-- Tweets Section
   ================================================== -->
   <section id="tweets">

      <div class="row">

         <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
         </div>

         <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">2 Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
         </ul>

         <p class="align-center"><a href="#" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweet Section End-->

@endsection
