@extends('layouts.public')

@section('title', 'Home')

@section('content')
<!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" >

		  <div class="row">
			 <div class="twelve columns">
				 <div class="slider-text">
					  <h1>Free amazing site template<span>.</span></h1>
                                             <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
                                                enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. lacus sit amet luctus lobortis, dolores et quas molestias excepturi
                                                enim tellus ultrices elit.
                                             </p>
				 </div>
                                 <div style="height: 200px; text-align: center;">
                                     
                                     <a href="#" class="button" style="margin-top: 5%" >Inizia a cercare!!!</a>
                                     
                                 </div>
			  </div>
		 </div>
		
	   </div> <!-- Flexslider End-->

   </section> <!-- Intro Section End-->

   <!-- Journal Section
   ================================================== -->
   <section id="journal">

      <div class="row">
         <div class="twelve columns align-center">
            <h2>FAQs</h2>
         </div>
      </div>

      <div class="blog-entries">
         @isset($faq1)
         
         <!-- Entry -->
         <article class="row entry">
            @foreach($faq1 as $faq)
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

@endsection
