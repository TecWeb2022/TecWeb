@php

    $dataN = strtotime($data_nasc);
    $oggi = date('d-m-Y');
    $eta = ($oggi->diff($dataN))->y;
}

@endphp
$eta