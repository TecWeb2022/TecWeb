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
    }
    if(document.getElementById("tipologia").value === 'cs' || document.getElementById("tipologia").value === 'cd') {
        document.getElementById("num_camere").disabled = true;
        document.getElementById("num_camere").value = '';
        document.getElementById("letti_camera").disabled = false;
        document.getElementById("angolo_studio").disabled = false;
    }
    if(document.getElementById("tipologia").value === 'all') {
        document.getElementById("letti_camera").disabled = false;
        document.getElementById("angolo_studio").disabled = false;
        document.getElementById("num_camere").disabled = false;
    }
}

function refreshWindow()
{
    window.location.reload(true);
}

//Inutilizzata, da vedere se serve
function forms(id, placeholders, n) {
    for(i=0; i<n; i++){
        document.getElementById(id[i]).placeholder = placeholders[0];
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
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
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
                $.each(errMsgs, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
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