@php
   
    $descr = '';
    switch($acc->tipologia) {
        case 'ap':
            $descr = "$acc->num_camere camere, $acc->posti_letto_tot posti letto totali, dimensione $acc->sup m²";
            break;
        case 'cs':
        case 'cd':
            $descr = "$acc->letti_camera letti nella camera, dimensione $acc->sup m²";
            break;
    }

@endphp
{{ $descr }}