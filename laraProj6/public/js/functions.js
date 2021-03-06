function currNavBar(indice) {
    document.getElementsByClassName("noCurrent")[indice].className = "current";
}

function filters() {
    if(document.getElementById("tipologia").value === 'ap') {
        document.getElementById("letti_camera").disabled = true;
        document.getElementById("num_camere").disabled = false;
        document.getElementById("letti_camera").value = '';
        document.getElementById("angolo_studio").disabled = true;
        document.getElementById("angolo_studio").checked = false;
        document.getElementById("cucina").disabled = false;
        document.getElementById("locale_ricreativo").disabled = false;
        document.getElementById("garage").disabled = false;
    }
    if(document.getElementById("tipologia").value === 'cs' || document.getElementById("tipologia").value === 'cd') {
        document.getElementById("num_camere").disabled = true;
        document.getElementById("num_camere").value = '';
        document.getElementById("letti_camera").disabled = false;
        document.getElementById("angolo_studio").disabled = false;
        document.getElementById("cucina").checked = false;
        document.getElementById("cucina").disabled = true;
        document.getElementById("locale_ricreativo").checked = false;
        document.getElementById("locale_ricreativo").disabled = true;
        document.getElementById("garage").disabled = true;
        document.getElementById("garage").checked = false;
    }
    if(document.getElementById("tipologia").value === 'all') {
        document.getElementById("letti_camera").disabled = false;
        document.getElementById("angolo_studio").disabled = false;
        document.getElementById("num_camere").disabled = false;
        document.getElementById("cucina").disabled = false;
        document.getElementById("locale_ricreativo").disabled = false;
        document.getElementById("garage").disabled = false;
    }
}

function insAcc(tip) {
    switch(tip) {
        case 'ap':
            $('#angolo_studio').val([false]);
            $('#angolo_studio').hide();
            $('label[for="angolo_studio"]').hide();
            $('#letti_camera').val('');
            $('#letti_camera').val();
            $('#letti_camera').hide();
            $('label[for="letti_camera"]').hide();
            
            $('#num_camere').show();
            $('label[for="num_camere"]').show();
            $('#cucina').show();
            $('label[for="cucina"]').show();
            $('#locale_ricreativo').show();
            $('label[for="locale_ricreativo"]').show();
            $('#garage').show();
            $('label[for="garage"]').show();
            break;
        case 'cs':
        case 'cd':
            $('#num_camere').val('');
            $('#num_camere').hide();
            $('label[for="num_camere"]').hide();
            $('#cucina').val([false]);
            $('#cucina').hide();
            $('label[for="cucina"]').hide();
            $('#locale_ricreativo').val([false]);
            $('#locale_ricreativo').hide();
            $('label[for="locale_ricreativo"]').hide();
            $('#garage').val([false]);
            $('#garage').hide();
            $('label[for="garage"]').hide();
            
            $('#angolo_studio').show();
            $('label[for="angolo_studio"]').show();
            $('#letti_camera').show();
            $('label[for="letti_camera"]').show();
            break;
        default:
            break;
    }
}

function usernamePlaceholder() {
    /*old_user = $('#old_username').val();
    $('form').find('input[type=text]').last(function(){
        $(this).attr("placeholder", old_user);
    });*/
    old_user = $('#old_username').val();
    $('#username').attr("placeholder", old_user);
}

function toggleInfoAcc(id_div){
    if(document.getElementById(id_div).hidden === false){
        document.getElementById(id_div).hidden = true;
    }else{
        document.getElementById(id_div).hidden = false;
    } 
}

function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doElemValidation(id, actionUrl, formId) {

    var formElems;

    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    var err = errMsgs['errors'];
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(err[id]));
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#" + formId + " :input[name=" + id + "]");
    if (elem.attr('type') === 'file') {
    // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    formElems = new FormData();
    formElems.append(id, inputVal);
    addFormToken();
    sendAjaxReq();

}

function doFormValidation(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                var err = errMsgs['errors'];
                $.each(err, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(err[id]));
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });
}

function emailContratto() {
    body = document.getElementsByTagName("body")[0]['innerText'];
    body = body.replace('Invia email al locatario', '');
    i = 0;
    for(i = 0; i < body.length; i++) {
        if(body[i] === '\n') {
            body = body.replace(body[i], '%0A');
        }
    }
    a = document.getElementsByTagName("a")[0]['href'];
    a = a.replace('&body=', '&body=' + body);
    document.getElementsByTagName("a")[0]['href'] = a;
}

function sliderHome () {
    
   $(document).ready(function(){
	$('.imageslide:first').show();
	var current_img=0;
	$('.pulsanti>span:first').addClass('grigio');
	
	$('.dot').click(function(){
		$('.dot').eq(current_img).removeClass('grigio'); //Il .eq serve per prendere solo l'elemento di indice current_img dal set in esame
		$(this).addClass("grigio");
		$('figure').eq(current_img).hide();
		current_img=+$(this).data('num')-1; //current_img diventa il numero del dot premuto
		$('figure').eq(current_img).fadeIn();
	});
	
	$('.next').click(function(){
		$('.imageslide').eq(current_img).hide();
		$('.dot').eq(current_img).removeClass('grigio');
		if(current_img<4)
			current_img++;
		else
			current_img=0;
		$('.imageslide').eq(current_img).fadeIn();
		$('.dot').eq(current_img).addClass('grigio');
	});
	
	$('.prev').click(function(){
		$('.imageslide').eq(current_img).hide();
		$('.dot').eq(current_img).removeClass('grigio');
		if(current_img>0)
			current_img--;
		else 
			current_img=4;
		$('.imageslide').eq(current_img).fadeIn();
		$('.dot').eq(current_img).addClass('grigio');
	});

});
  
}

 function ConfirmDelete()
  {
    return confirm("Sei sicuro di volerlo eliminare?");
  }

//flagRic ?? un bool -> true per i mess ricevuti, false per quelli inviati
function sendMessaggiAjax(actionUrl, leggiUrl,flagRic){
    
     $.ajax({
            url: actionUrl,
            type: "GET",
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var mess = resultData.data;
                var bodyData = '';
                
                $.each(mess,function(index,row){
                    var date = '';
                    bodyData+="<li>";
                    bodyData+="<div class='bordo_normale piccolo-crick flex-box-mess'>";
                    bodyData+="<h3 class='stoppino'>"+row.nome + " " + row.cognome+"</h3>";
                    bodyData+="<div class='comment-meta'>";
                    bodyData+="<p class='ricevuto_messagistica'>";
                    if(flagRic){
                        bodyData+="Ricevuto: ";
                    }
                    else{
                        bodyData+="Inviato: ";
                    }
                    date = dateFormat(row.created_at);
                    bodyData+= date;
                    bodyData+="</p></div>";
                    
                    bodyData+="<div class='dettagli_cat'>";
                    bodyData+="<cite class='nome_alloggio'>" + "Nome alloggio: " + row.nome_acc +"</cite>";
                    bodyData+="</div></div>";
                    
                    if(!flagRic){
                        bodyData+= "<button class='btn_mess_nvis' title='' onclick=\"location.href =";
                    }
                    else{
                        if(row.visualizzato) {
                            bodyData+= "<button class='btn_mess_vis' title='Gi?? letto' onclick=\"location.href =";
                        } else {
                            bodyData+= "<button class='btn_mess_nvis' title='Non letto' onclick=\"location.href =";
                        }
                    }
                    bodyData+= "\'"  + leggiUrl + "/" + row.id + "\';\"";
                    bodyData+= ">Leggi</button>";
                  
                });
                $(".commentlist2").empty();
                $(".commentlist2").append(bodyData);
               
            }
        });
}

function dateFormat(data){
    
    date = data.split(" ");
    giorno = date[0];
    ora = date[1];
    
    arrGiorno = giorno.split("-");
    arrOra = ora.split(":");
    
    data = arrGiorno[2] + "/" + arrGiorno[1] + "/" + arrGiorno[0] + " " + arrOra[0] + ":" + arrOra[1];
    return data;
}

//valori rappresentati dal grafico vengono inizializzati
function istogrammaStats(alloggi_tot = 0, offerte = 0, alloggi_locati = 0) {
    // produce un riferimento all'elemento canvas e imposta la larghezza e l'altezza a 300px
    var myCanvas = document.getElementById("myCanvas");
    myCanvas.width = 300;
    myCanvas.height = 300;
    //contesto in due dimensioni
    var ctx = myCanvas.getContext("2d");
//funzione che imposta coordinate di inizio e fine, pi?? il colore della linea disegnata per la griglia; ctx=contesto di riferimento
    function drawLine(ctx, startX, startY, endX, endY,color){
        ctx.save();
        ctx.strokeStyle = color;
        ctx.beginPath();
        ctx.moveTo(startX,startY);
        ctx.lineTo(endX,endY);
        ctx.stroke();
        ctx.restore();
    }
//funzione che imposta i paramettri di disegno delle barre del grafico; ctx=contesto di riferimento
    function drawBar(ctx, upperLeftCornerX, upperLeftCornerY, width, height,color){
        ctx.save();
        ctx.fillStyle=color;
        ctx.fillRect(upperLeftCornerX,upperLeftCornerY,width,height);
        ctx.restore();
    }
//assegnazione dei valori da rappresentare, tramite parametri della funzione principale
    var Stats = {
        "Alloggi totali": alloggi_tot,
        "Offerte locatari": offerte,
        "Alloggi locati": alloggi_locati

    };
//fase di memorizzazione delle opzioni passate alla classe
    var Barchart = function(options){
        this.options = options;
        this.canvas = options.canvas;
        this.ctx = this.canvas.getContext("2d");
        this.colors = options.colors;

        //funzione draw: disegner?? il grafico partendo dalle linee della griglia, 
        //successivamente i marcatori della griglia e infine le barre usando i parametri passati attraverso l'oggetto options
        this.draw = function(){
            //calcoliamo il valore massimo per il nostro modello dei dati poich?? avremo bisogno di ridimensionare
            // tutte le barre in base a questo valore e in base alle dimensioni del canvas, per evitare che le barre escono dall'area di visualiz.
            var maxValue = 0;
            for (var categ in this.options.data){
                maxValue = Math.max(maxValue,this.options.data[categ]);
            } 
            //la variabile padding indica il numero dei pixel tra il bordo del canvas e l'interno del grafico
            var canvasActualHeight = this.canvas.height - this.options.padding * 2;
            var canvasActualWidth = this.canvas.width - this.options.padding * 2;

            
            //disegno della griglia
            var gridValue = 0;
            while (gridValue <= maxValue){
                //le coordinate del canvas corrispondono a 0;0 nell'angolo in alto a sinistra e aumentano andando verso destra e verso il basso
                //le coordinate della griglia hanno l'andamento opposto cio?? dal basso verso l'alto, quindi calcoliamo gridY con questa formula
                var gridY = canvasActualHeight * (1 - gridValue/maxValue) + this.options.padding;
                //funzione di aiuto drawline
                drawLine(
                    this.ctx,
                    0,
                    gridY,
                    this.canvas.width,
                    gridY,
                    this.options.gridColor
                );

                //scrittura dei marcatori della griglia, cio?? i valori corrispondenti a ciascuna linea della griglia
                this.ctx.save();
                this.ctx.fillStyle = this.options.gridColor;
                this.ctx.textBaseline="bottom"; 
                this.ctx.font = "bold 10px Arial";
                this.ctx.fillText(gridValue, 10,gridY - 2);
                this.ctx.restore();

                gridValue+=this.options.gridScale;
            }      

            //disegno delle barre tramite la funzione drawBar
            var barIndex = 0;
            var numberOfBars = Object.keys(this.options.data).length;
            var barSize = (canvasActualWidth)/numberOfBars;

            for (categ in this.options.data){
                var val = this.options.data[categ];
                var barHeight = Math.round( canvasActualHeight * val/maxValue) ;
                //per calcolare l'altezza e la larghezza di ogni barra si tiene conto del padding,
                //del valore e del colore per ogni categoria nel modello di dati del grafico.
                drawBar(
                    this.ctx,
                    this.options.padding + barIndex * barSize,
                    this.canvas.height - barHeight - this.options.padding,
                    barSize,
                    barHeight,
                    this.colors[barIndex%this.colors.length]
                );

                barIndex++;
            }

            //impostazione per aggiungere il nome della serie di dati sotto il grafico, cio?? "Statistiche"
            this.ctx.save();
            this.ctx.textBaseline="bottom";
            this.ctx.textAlign="center";
            this.ctx.fillStyle = "#000000";
            this.ctx.font = "bold 14px Arial";
            this.ctx.fillText(this.options.seriesName, this.canvas.width/2,this.canvas.height);
            this.ctx.restore();  

            //legenda: il codice identifica il tag legenda agganciandolo al grafico, 
            //essa verr?? aggiunta sotto al grafico, riportando i nomi dei valori insieme al colore corrispondente.
            barIndex = 0;
            var legend = document.querySelector("legend[for='myCanvas']");
            var ul = document.createElement("ul");
            legend.append(ul);
            for (categ in this.options.data){
                var li = document.createElement("li");
                li.style.listStyle = "none";
                li.style.borderLeft = "20px solid "+this.colors[barIndex%this.colors.length];
                li.style.padding = "5px";
                li.textContent = categ;
                ul.append(li);
                barIndex++;
            }
        }
    }

    //classe barchart viene istanziata, impostando dei parametri fondamentali e richiama la funzione "draw()"
    var myBarchart = new Barchart(
        {
            canvas:myCanvas, //nome canvas
            seriesName:"Statistiche", //nome grafico
            padding:25, //numero dei pixel tra il bordo del canvas e l'interno del grafico
            gridScale:5, //scala della griglia
            gridColor:"#0a0909", //colore griglia
            data:Stats, //dove prendere i dati per le barre
            colors:["#a55ca5","#67b6c7", "#bccd7a"] //colori delle barre
        }
    );
    myBarchart.draw();
}
