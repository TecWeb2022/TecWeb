@extends('layouts.public')

@section('title', 'Messaggistica')

@section('scripts')
@parent

<script>
    $(document).ready(function () {
        currNavBar(3);
    });
</script>

<script>
    $(document).ready(function () {
        sendMessaggiAjax("{{route('messRicAjax')}}", "{{route('infoMessaggio', ['id' => ''])}}", true);
        $("#mess-ricevuti").toggleClass("titolo");
    });
</script>

<script>
    $(document).ready(function () {
        $("#mess-inviati").click(function () {
            sendMessaggiAjax("{{route('messInvAjax')}}", "{{route('infoMessaggio', ['id' => ''])}}", false);
            $(this).addClass("titolo");
            $("#mess-ricevuti").removeClass("titolo");
        });

        $("#mess-ricevuti").click(function () {
            sendMessaggiAjax("{{route('messRicAjax')}}", "{{route('infoMessaggio', ['id' => ''])}}", true);
            $(this).addClass("titolo");
            $("#mess-inviati").removeClass("titolo");
        });
    });
</script>

@endsection

@section('content')

<div class="content-outer">
    <div class="row">


        <div id="primary" class="twelve columns">


            <div id="comments" >
                <center>
                    <center><div><a class="pointable" id="mess-ricevuti">Messaggi ricevuti</a> | <a class="pointable" id="mess-inviati">Messaggi inviati</a></div></center>


                    <ol class="commentlist2">


                    </ol> 

                    <div id="provaReturn"> </div>
                </center> 


            </div> 

        </div>  


    </div>
</div> 


@endsection