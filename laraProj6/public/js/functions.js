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
    else { //Se la tipologia non è appartamento, è obbligatoriamente un posto letto in camera singola o doppia
        document.getElementById("num_camere").disabled = true;
        document.getElementById("num_camere").value = '';
        document.getElementById("letti_camera").disabled = false;
        document.getElementById("angolo_studio").disabled = false;
    }
}