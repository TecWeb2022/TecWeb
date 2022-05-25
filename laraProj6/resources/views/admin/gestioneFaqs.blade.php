@extends('layouts.admin')

@section('title', 'Gestione Faqs')

@section('content')

<script type="text/javascript">
    currNavBar(3);
</script>


<!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" >

		  <div class="row">
			 <div class="twelve columns">
				 <div class="slider-text">
					  <h1>Gestione FAQs<span>.</span></h1>
                                             <p>Da qui puoi gestire tutte le FAQs presenti nel sito. Puoi anche crearne di nuove 
                                                 o modificarne di già esistenti.
                                             </p>
				 </div>
                                
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
                  <h3>{{ $faq->domanda }}</h3>
               </div>

                <!--div class="two columns post-meta end">

                       <h3>#{{ $faq->id }}</h3>

                    </div-->
            </div>

            <div class="ten columns offset-2 post-content">
                <p>{{ $faq->risposta }}
               </p>
               
               {{ Form::open(array('route' => array('modifyFaq', $faq->id), 'class' => 'register-form')) }}
               
               {{ Form::hidden('id', $faq->id, ['id' => 'id']) }}
               
               {{ Form::submit('Modifica', ['class' => 'btn']) }}

               {{ Form::close() }}
            
            
            
               {{ Form::open(array('route' => 'eliminaFaq', 'class' => 'register-form')) }}
               
               {{ Form::hidden('id', $faq->id, ['id' => 'id']) }}
               
               {{ Form::submit('Elimina', ['class' => 'btn']) }}

               {{ Form::close() }}
               
               <!--button class='btn' type="button" >Modifica</button> <button class='btn' type="button" >Elimina</i></button--> 
            </div>
             @endforeach
         </article> <!-- Entry End -->
         @endisset
          <!-- Entry -->
         
         <article class="row entry">

            <div class="entry-header">
                
                 <label class='labelAdd'>Aggiungi una nuova FAQ</label>
                
                 <button class="btn2 iconbutton2 " onclick="location.href='nuovaFaq'">
                     +
                    <!--i class="fa fa-plus"></i--> 
                 </button> 
            </div>

              
        </article> <!-- Entry End -->
         
      </div>
         </section>
@endsection