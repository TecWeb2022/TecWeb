@php
   
    $descr = '';
    switch($acc->tipologia) {
        case 'ap':
            $descr = "$acc->num_camere camere, $acc->posti_letto posti letto, $acc->sup m^2";
            break;
        case 'cs':
            $descr = "";
            break;
        case 'cd':
            $descr = "";
            break;
}

@endphp
<p>{{ $descr }}</p>