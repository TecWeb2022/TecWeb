@extends('layouts.public')

@section('title', 'Messaggistica')

@section('scripts')
@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
 $(document).ready(function() {
       
        $.ajax({
            url: "{{route('messAjax')}}",
            type: "GET",
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var mess = resultData.data;
                var bodyData = '';
                $.each(mess,function(index,row){

                    bodyData+="<li>";
                    bodyData+="<div class='bordo_normale piccolo-crick flex-box-mess'>";
                    bodyData+="<h3 class='stoppino'>"+row.testo+"</h3>";
                    
                });
                $(".commentlist2").empty();
                $(".commentlist2").append(bodyData);
            }
        });
    });
</script>

<script>
$(document).ready(function(){
    $("#mess-inviati").click(function(){
                $.ajax({
            url: "{{route('messAjaxx')}}",
            type: "GET",
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var mess = resultData.data;
                var bodyData = '';
                $.each(mess,function(index,row){

                    bodyData+="<li>";
                    bodyData+="<div class='bordo_normale piccolo-crick flex-box-mess'>";
                    bodyData+="<h3 class='stoppino'>"+row.testo+"</h3>";
                    
                });
                $(".commentlist2").empty();
                $(".commentlist2").append(bodyData);
            }
        });
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
                    <center><div><a href="{{ route('messaggisticaLoc') }}">Messaggi ricevuti</a> | <a id="mess-inviati">Messaggi inviati</a></div></center>
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