@extends('layouts.public')

@section('title', 'Messaggistica')

@section('scripts')
@parent

<script>
    $(document).ready( function() {
        currNavBar(3);
    });
</script>

<script>
 $(document).ready(function() {
     sendMessaggiAjax("{{route('messRicAjax')}}","{{route('infoMessaggio', ['id' => ''])}}",true);
    });
</script>

<script>
$(document).ready(function(){
    $("#mess-inviati").click(function(){
            sendMessaggiAjax("{{route('messInvAjax')}}","{{route('infoMessaggio', ['id' => ''])}}",false);
            
    });
    
    $("#mess-ricevuti").click(function(){
            sendMessaggiAjax("{{route('messRicAjax')}}","{{route('infoMessaggio', ['id' => ''])}}",true);
    });
});
</script>

@endsection

@section('content')

<!-- Content
   ================================================== -->
   <div class="content-outer">
      <div class="row">
      

         <div id="primary" class="twelve columns">

            <!-- Comments
            ================================================== -->
            
            <div id="comments" >
                <center>
                    <center><div><a id="mess-ricevuti">Messaggi ricevuti</a> | <a id="mess-inviati">Messaggi inviati</a></div></center>
                           
              
               <ol class="commentlist2">
                   
                        
               </ol> 
                    
                    <div id="provaReturn"> </div>
               </center> 
               <!-- Commentlist End -->
               <!-- Pagination -->
               <center></center>
               
               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

      
        </div>
         </div> <!-- Comments End -->


@endsection