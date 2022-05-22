@php
   
    $descr = '';
    switch($value) {
        case '1':
            $descr = "Si";
            break;
        case '0':
            $descr = "No";
            break;
        case '':
            $descr = "Non specificato";
            break;
        default :
            $descr = $value;
            break;
}

@endphp
<span class="testo">{{ $descr }}</span>