@extends('layouts.public')

@section('title', 'Messaggistica')

@section('scripts')
@parent


<script>
 $(document).ready(function() {
     sendMessaggiAjax("{{route('messAjaxx')}}","{{route('messaggioLoc')}}",true);
    });
</script>

<script>
$(document).ready(function(){
    $("#mess-inviati").click(function(){
            sendMessaggiAjax("{{route('messAjax')}}","{{route('messaggioLoc')}}",false);
            
    });
    
    $("#mess-ricevuti").click(function(){
            sendMessaggiAjax("{{route('messAjaxx')}}","{{route('messaggioLoc')}}",true);
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
                    <!--<center><div><a href="{{ route('messaggisticaLoc') }}">Messaggi ricevuti</a> | <a href="{{ route('messaggiInvLoc') }}">Messaggi inviati</a></div></center> -->               <!-- commentlist -->
              
               <ol class="commentlist2">
                  
                  <!--li class="depth-1"-->
                  
                    
                        
               </ol> 
               </center> 
               <!-- Commentlist End -->
               <!-- Pagination -->
               <center></center>
               
               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

      
        </div>
         </div> <!-- Comments End -->


<script type="text/javascript">
currNavBar(3);
</script>
@endsection