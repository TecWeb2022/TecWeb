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





