@php
   
    $descr = '';
    switch($tipologia) {
        case 'ap':
            $descr = "Appartamento";
            break;
        case 'cs':
            $descr = "Posto letto in camera singola";
            break;
        case 'cd':
            $descr = "Posto letto in camera doppia";
            break;
}

@endphp
{{ $descr }}