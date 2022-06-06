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
     $("#mess-ricevuti").toggleClass("titolo");
    });
</script>

<script>
$(document).ready(function(){
    $("#mess-inviati").click(function(){
            sendMessaggiAjax("{{route('messInvAjax')}}","{{route('infoMessaggio', ['id' => ''])}}",false);
            $(this).toggleClass("titolo");
            $("#mess-ricevuti").toggleClass("titolo");
    });
    
    $("#mess-ricevuti").click(function(){
            sendMessaggiAjax("{{route('messRicAjax')}}","{{route('infoMessaggio', ['id' => ''])}}",true);
            $(this).toggleClass("titolo");
            $("#mess-inviati").toggleClass("titolo");
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
                    <center><div><a class="pointable" id="mess-ricevuti">Messaggi ricevuti</a> | <a class="pointable" id="mess-inviati">Messaggi inviati</a></div></center>


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