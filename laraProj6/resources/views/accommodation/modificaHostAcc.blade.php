
@extends('layouts.locatore')

@section('title', 'Modifica Alloggio')

@section('scripts')
@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#tipologia").change(function(){
        insAcc($('#tipologia').val());
    });
});
</script>

@endsection

@section('content')

@isset($acc)
<section id="works">

      <div class="row maxw-acc">
          <h2 class="text-center add-bottom">Modifica la tua offerta</h2>
          <h3 class="text-center add-bottom">{{$acc->nome}}</h3>
          
           {{ Form::open(array('route' => array('modificaHostAccPost','id' => $acc->id), 'id' => 'modificaHostAcc', 'files' => true, 'class' => '')) }}
           
          <div class="flex-box add-bottom">
           
            <div class="column width-descr">
                 
                <div  class="wrap-input">
                    {{ Form::label('nome', 'Nome Alloggio', ['class' => 'titolo']) }}
                    {{ Form::text('nome', $acc->nome, ['class' => 'input', 'id' => 'nome']) }}
                    @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>

                <div  class="wrap-input">
                    {{ Form::label('tipologia', 'Tipologia', ['class' => 'titolo']) }}
                    {{ Form::select('tipologia', ['ap' => 'Appartamento', 'cs' => 'Camera singola', 'cd' => 'Camera doppia'], ['placeholder'=>$acc->tipologia, 'id' => 'tipologia']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('descr', 'Descrizione', ['class' => 'titolo']) }}
                    {{ Form::textarea('descr', $acc->descr, ['class' => 'input', 'id' => 'descr', 'rows' => 2]) }}
                    @if ($errors->first('descr'))
                <ul class="errors">
                    @foreach ($errors->get('descr') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>

                <div  class="wrap-input">
                    {{ Form::label('sup', 'Superficie(m²)', ['class' => 'titolo']) }}
                    {{ Form::number('sup', $acc->sup, ['min' => '0','class' => 'input', 'id' => 'sup']) }}
                    @if ($errors->first('sup'))
                <ul class="errors">
                    @foreach ($errors->get('sup') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>

                <div  class="wrap-input">
                    {{ Form::label('path_foto', 'Carica una nuova foto', ['class' => 'titolo']) }}
                    {{ Form::file('path_foto', ['class' => 'input', 'id' => 'path_foto']) }}
                    @if ($errors->first('path_foto'))
                <ul class="errors">
                    @foreach ($errors->get('path_foto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
                
                <div  class="wrap-input">
                {{ Form::label('canone', 'Canone(in €,per mese)', ['class' => 'titolo']) }}
                {{ Form::number('canone', $acc->canone, ['min' => '0','class' => 'input', 'id' => 'canone']) }}
                @if ($errors->first('canone'))
                <ul class="errors">
                    @foreach ($errors->get('canone') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>

            </div>
            <div class="column">
                
                <div  class="wrap-input">
                    {{ Form::label('inizio_disp', 'Inizio disponibilità offerta', ['class' => 'titolo']) }}
                    {{ Form::date('inizio_disp', $acc->inizio_disp, ['class' => 'input', 'id' => 'inizio_disp']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('fine_disp', 'Fine disponibilità offerta', ['class' => 'titolo']) }}
                    {{ Form::date('fine_disp', $acc->fine_disp, ['class' => 'input', 'id' => 'fine_disp']) }}
                </div>
                
                <div  class="wrap-input">
                    {{ Form::label('citta', 'Città', ['class' => 'titolo']) }}
                    {{ Form::text('citta', $acc->citta, ['class' => 'input', 'id' => 'citta']) }}
                    @if ($errors->first('citta'))
                <ul class="errors">
                    @foreach ($errors->get('citta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
               
                <div  class="wrap-input">
                    {{ Form::label('prov', 'Provincia', ['class' => 'titolo']) }}
                    {{ Form::text('prov', $acc->prov, ['class' => 'input', 'id' => 'prov']) }}
                    @if ($errors->first('prov'))
                <ul class="errors">
                    @foreach ($errors->get('prov') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
                

                <div  class="wrap-input">
                    {{ Form::label('via', 'Via', ['class' => 'titolo']) }}
                    {{ Form::text('via', $acc->via, ['class' => 'input', 'id' => 'via']) }}
                    @if ($errors->first('via'))
                <ul class="errors">
                    @foreach ($errors->get('via') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>

                <div  class="wrap-input">
                    {{ Form::label('num_civ', 'Numero civico', ['class' => 'titolo']) }}
                    {{ Form::text('num_civ', $acc->num_civ, ['class' => 'input','id' => 'num_civ']) }}
                    @if ($errors->first('num_civ'))
                <ul class="errors">
                    @foreach ($errors->get('num_civ') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
                
                 <center><h3>Servizi</h3></center>
                 
                 <div class="div-checkbox">
                    {{ Form::label('angolo_studio', 'Angolo studio', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
                    <span>{{ Form::checkbox('angolo_studio', true, $acc->angolo_studio, ['id' => 'angolo_studio']) }}</span>
                </div>
                <div class="div-checkbox">
                    {{ Form::label('locale_ricreativo', 'Locale ricreativo', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
                    <span>{{ Form::checkbox('locale_ricreativo', true, $acc->locale_ricreativo, ['id' => 'locale_ricreativo']) }}</span>
                </div>
                <div class="div-checkbox">
                    {{ Form::label('garage', 'Garage', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
                    <span>{{ Form::checkbox('garage', true, $acc->garage, ['id' => 'garage']) }}</span>
                </div>
                
                 <div class="div-checkbox">
                    {{ Form::label('wifi', 'Wi-Fi', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
                    <span>{{ Form::checkbox('wifi', true, $acc->wifi, ['id' => 'wifi']) }}</span>
                 </div>
                <div class="div-checkbox">
                    {{ Form::label('climatizzatore', 'Climatizzatore', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
                    <span>{{ Form::checkbox('climatizzatore', true, $acc->climatizzatore, ['id' => 'climatizzatore']) }}</span>
                </div>
                <div class="div-checkbox">
                    {{ Form::label('cucina', 'Cucina', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
                    <span>{{ Form::checkbox('cucina', true, $acc->cucina, ['id' => 'cucina']) }}</span>
                </div>
                 
             </div>
           <div class="column">
           
            <div  class="wrap-input">
                {{ Form::label('posti_letto_tot', 'Posti letto totali', ['class' => 'titolo']) }}
                {{ Form::number('posti_letto_tot', $acc->posti_letto_tot, ['min' => '0','class' => 'input', 'id' => 'posti_letto_tot']) }}
                @if ($errors->first('posti_letto_tot'))
                <ul class="errors">
                    @foreach ($errors->get('posti_letto_tot') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('num_bagni', 'Numero di bagni', ['class' => 'titolo']) }}
                {{ Form::number('num_bagni', $acc->num_bagni, ['min' => '0','class' => 'input', 'id' => 'num_bagni']) }}
                @if ($errors->first('num_bagni'))
                <ul class="errors">
                    @foreach ($errors->get('num_bagni') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
               
            <div  class="wrap-input">
                {{ Form::label('letti_camera', 'Posti letto camera', ['class' => 'titolo']) }}
                {{ Form::number('letti_camera', $acc->letti_camera, ['min' => '0','class' => 'input', 'id' => 'letti_camera']) }}
                @if ($errors->first('letti_camera'))
                <ul class="errors">
                    @foreach ($errors->get('letti_camera') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('num_camere', 'Numero di camere', ['class' => 'titolo']) }}
                {{ Form::number('num_camere', $acc->num_camere, ['min' => '0','class' => 'input', 'id' => 'num_camere']) }}
                @if ($errors->first('num_camere'))
                <ul class="errors">
                    @foreach ($errors->get('num_camere') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <h3>Requisiti che il locatario <br>deve soddisfare</h3>
               
            <div  class="wrap-input">
                {{ Form::label('eta_min', 'Età minima', ['class' => 'titolo']) }}
                {{ Form::number('eta_min', $acc->eta_min, ['min' => '0',',max' => '100','class' => 'input', 'id' => 'eta_min']) }}
                @if ($errors->first('eta_min'))
                <ul class="errors">
                    @foreach ($errors->get('eta_min') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('eta_max', 'Età massima', ['class' => 'titolo']) }}
                {{ Form::number('eta_max', $acc->eta_max, ['min' => '0','max' => '100','class' => 'input', 'id' => 'eta_max']) }}
                @if ($errors->first('eta_max'))
                <ul class="errors">
                    @foreach ($errors->get('eta_max') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('sesso', 'Sesso(M/F)', ['class' => 'titolo']) }}
                {{ Form::select('sesso',  ['' => 'Non specificato','M' => 'Uomo', 'F' => 'Donna'], ['placeholder'=>$acc->sesso,'id' => 'sesso'] ) }}
            </div>
           </div>
           </div>
           
           
            <div class="row">
                <div style="text-align:center" class="container-form-btn">
                {{ Form::submit('Salva le modifiche', ['class' => 'form-btn1', 'id' => 'sub-btn', 'onclick'=>'mostraMessaggio("La modifica è stata effettuata con successo")']) }}
                </div>
                {{ Form::close() }}
            </div>
    </div> 
</section>
@endisset
@endsection
 