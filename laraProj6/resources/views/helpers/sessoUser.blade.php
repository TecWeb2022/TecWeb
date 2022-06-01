@php
   
    $descr = '';
    switch($sesso) {
        case 'M':
            $descr = "Uomo";
            break;
        case 'F':
            $descr = "Donna";
            break;
        default:
            $descr = "Non specificato";
            break;
}

@endphp
{{ $descr }}