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

/* Inutilizzate, da vedere se servono
function refreshWindow()
{
    window.location.reload(true);
}

function forms(id, placeholders, n) {
    for(i=0; i<n; i++){
        document.getElementById(id[i]).placeholder = placeholders[0];
    }
}
*/

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

function slider2Home () {
    
   $(document).ready(function(){
	$('.imageslide:first').show();
	var current_img=0;
	$('.pulsanti>span:first').addClass('grigio');
	
	$('.dot').click(function(){
		$('.dot').eq(current_img).removeClass('grigio');
		$(this).addClass("grigio");
		$('figure').eq(current_img).hide();
		current_img=+$(this).data('num')-1;
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


function mostraMessaggio(string) {
window.alert(string);
}

function myConfirm(dialogTitle, dialogText, myform, mysubmitname, mysubmitvalue) {
$('<div class="ui-dialog" title="'+ dialogTitle +'">' + dialogText + '</div>').dialog({
draggable: false,
modal: true,
resizable: false,
height: 200,
width: 400,
buttons: {
OK: function () {
$('<input type="hidden" name="'+mysubmitname+'" value="'+mysubmitvalue+'"></input>').appendTo($('#'+myform));
document.forms[myform].submit();
},
Annulla: function () {
$(this).dialog('destroy');
}
}
});
}

function confirmation() {
    $('#eliminaForm').submit(function(e) {
    e.preventDefault();

    var elimina_form = $(this);   
    
    confirm("Sei sicuro di voler eliminare questo elemento?", function(result) {
        if (result===true) {
            elimina_form.submit();
        }
        else {
            $(this).dialog('destroy');
        }
        });
    });
}

 function ConfirmDelete()
  {
    return confirm("Sei sicuro di volerlo eliminare?");
  }

//flagRic è un bool -> true per i mess ricevuti, false per quelli inviati
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
                    
                    if(row.visualizzato) {
                        bodyData+= "<button class='btn_mess_vis' title='Già letto' onclick=\"location.href =";
                    } else {
                        bodyData+= "<button class='btn_mess_nvis' title='Non letto' onclick=\"location.href =";
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


function istogrammaStats(alloggi_tot = 0, offerte = 0, alloggi_locati = 0) {
    var myCanvas = document.getElementById("myCanvas");
    myCanvas.width = 300;
    myCanvas.height = 300;

    var ctx = myCanvas.getContext("2d");

    function drawLine(ctx, startX, startY, endX, endY,color){
        ctx.save();
        ctx.strokeStyle = color;
        ctx.beginPath();
        ctx.moveTo(startX,startY);
        ctx.lineTo(endX,endY);
        ctx.stroke();
        ctx.restore();
    }

    function drawBar(ctx, upperLeftCornerX, upperLeftCornerY, width, height,color){
        ctx.save();
        ctx.fillStyle=color;
        ctx.fillRect(upperLeftCornerX,upperLeftCornerY,width,height);
        ctx.restore();
    }

    var Stats = {
        "Alloggi totali": alloggi_tot,
        "Offerte locatari": offerte,
        "Alloggi locati": alloggi_locati

    };

    var Barchart = function(options){
        this.options = options;
        this.canvas = options.canvas;
        this.ctx = this.canvas.getContext("2d");
        this.colors = options.colors;

        this.draw = function(){
            var maxValue = 0;
            for (var categ in this.options.data){
                maxValue = Math.max(maxValue,this.options.data[categ]);
            }
            var canvasActualHeight = this.canvas.height - this.options.padding * 2;
            var canvasActualWidth = this.canvas.width - this.options.padding * 2;

            //drawing the grid lines
            var gridValue = 0;
            while (gridValue <= maxValue){
                var gridY = canvasActualHeight * (1 - gridValue/maxValue) + this.options.padding;
                drawLine(
                    this.ctx,
                    0,
                    gridY,
                    this.canvas.width,
                    gridY,
                    this.options.gridColor
                );

                //writing grid markers
                this.ctx.save();
                this.ctx.fillStyle = this.options.gridColor;
                this.ctx.textBaseline="bottom"; 
                this.ctx.font = "bold 10px Arial";
                this.ctx.fillText(gridValue, 10,gridY - 2);
                this.ctx.restore();

                gridValue+=this.options.gridScale;
            }      

            //drawing the bars
            var barIndex = 0;
            var numberOfBars = Object.keys(this.options.data).length;
            var barSize = (canvasActualWidth)/numberOfBars;

            for (categ in this.options.data){
                var val = this.options.data[categ];
                var barHeight = Math.round( canvasActualHeight * val/maxValue) ;
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

            //drawing series name
            this.ctx.save();
            this.ctx.textBaseline="bottom";
            this.ctx.textAlign="center";
            this.ctx.fillStyle = "#000000";
            this.ctx.font = "bold 14px Arial";
            this.ctx.fillText(this.options.seriesName, this.canvas.width/2,this.canvas.height);
            this.ctx.restore();  

            //draw legend
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


    var myBarchart = new Barchart(
        {
            canvas:myCanvas,
            seriesName:"Statistiche",
            padding:25,
            gridScale:5,
            gridColor:"#0a0909",
            data:Stats,
            colors:["#a55ca5","#67b6c7", "#bccd7a"]
        }
    );
    myBarchart.draw();
}
