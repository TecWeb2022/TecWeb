@php
   
    $path = DB::table('photos')
                ->where('id_alloggio', '=', $id_acc)
                ->select('path')
                ->get();

@endphp
<img width="10" height="10" class="imgn_casa" src="{{ asset ($path) }}" palt="">