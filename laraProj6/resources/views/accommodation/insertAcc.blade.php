@extends('layouts.locatore')

@section('title', 'Nuovo Alloggio')

@section('scripts')
@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('insertAccPost') }}";
    var formId = 'inserimentoAcc';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#inserimentoAcc").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>

@endsection


@section('content')
<script type="text/javascript">
    currNavBar(2);
</script>

<section id="works">

      <div class="row">
          <h2 class="text-center add-bottom">Inserisci una nuova offerta</h2>
          
          <div class="flex-box flex-inline add-bottom">

           {{ Form::open(array('route' => 'insertAccPost', 'id' => 'inserimentoAcc', 'files' => true, 'class' => '')) }}
           
            <div class="column">
                 
                <div  class="wrap-input">
                    {{ Form::label('nome', 'Nome Alloggio', ['class' => 'titolo']) }}
                    {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('tipologia', 'Tipologia', ['class' => 'titolo']) }}
                    {{ Form::select('tipologia', ['ap' => 'Appartamento', 'cs' => 'Camera singola', 'cd' => 'Camera doppia'],'', ['id' => 'tipologia', 'onclick'=>'']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('descr', 'Descrizione', ['class' => 'titolo']) }}
                    {{ Form::textarea('descr', '', ['class' => 'input', 'id' => 'descr', 'rows' => 2]) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('sup', 'Superficie(m²)', ['class' => 'titolo']) }}
                    {{ Form::number('sup', '', ['min' => '0','class' => 'input', 'id' => 'sup']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('path_foto', 'Immagine', ['class' => 'titolo']) }}
                    {{ Form::file('path_foto', ['class' => 'input', 'id' => 'path_foto']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('citta', 'Città', ['class' => 'titolo']) }}
                    {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('prov', 'Provincia', ['class' => 'titolo']) }}
                    {{ Form::text('prov', '', ['class' => 'input', 'id' => 'prov']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('via', 'Via', ['class' => 'titolo']) }}
                    {{ Form::text('via', '', ['class' => 'input', 'id' => 'via']) }}
                </div>

                <div  class="wrap-input">
                    {{ Form::label('num_civ', 'Numero civico', ['class' => 'titolo']) }}
                    {{ Form::text('num_civ', '', ['class' => 'input','id' => 'num_civ']) }}
                </div>
                 
             </div>
           <div class="column">
           
            <div  class="wrap-input">
                {{ Form::label('inizio_disp', 'Inizio disponibilità offerta', ['class' => 'titolo']) }}
                {{ Form::date('inizio_disp', '', ['class' => 'input', 'id' => 'inizio_disp']) }}
            </div>
           
           <div  class="wrap-input">
                {{ Form::label('fine_disp', 'Fine disponibilità offerta', ['class' => 'titolo']) }}
                {{ Form::date('fine_disp', '', ['class' => 'input', 'id' => 'fine_disp']) }}
            </div>
           
           
            <div  class="wrap-input">
                {{ Form::label('eta_min', 'Età minima', ['class' => 'titolo']) }}
                {{ Form::number('eta_min', '', ['min' => '0',',max' => '100','class' => 'input', 'id' => 'eta_min']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('eta_max', 'Età massima', ['class' => 'titolo']) }}
                {{ Form::number('eta_max', '', ['min' => '0','max' => '100','class' => 'input', 'id' => 'eta_max']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('sesso', 'Sesso(M/F)', ['class' => 'titolo']) }}
                {{ Form::select('sesso', ['' => 'Non specificato','M' => 'Uomo', 'F' => 'Donna'],'', ['id' => 'sesso'] ) }}
                 
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('canone', 'Canone(in €,per mese)', ['class' => 'titolo']) }}
                {{ Form::number('canone', '', ['min' => '0','class' => 'input', 'id' => 'canone']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('posti_letto_tot', 'Posti letto totali', ['class' => 'titolo']) }}
                {{ Form::number('posti_letto_tot', '', ['min' => '0','class' => 'input', 'id' => 'posti_letto_tot']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('letti_camera', 'Posti letto camera', ['class' => 'titolo']) }}
                {{ Form::number('letti_camera', '', ['min' => '0','class' => 'input', 'id' => 'letti_camera']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('num_bagni', 'Numero di bagni', ['class' => 'titolo']) }}
                {{ Form::number('num_bagni', '', ['min' => '0','class' => 'input', 'id' => 'num_bagni']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('num_camere', 'Numero di camere', ['class' => 'titolo']) }}
                {{ Form::number('num_camere', '', ['min' => '0','class' => 'input', 'id' => 'num_camere']) }}
            </div>
           </div>
           </div>
          
           <div class="flex-box flex-inline add-bottom">
           
            <div class="column">
                <div class="div-checkbox">
            {{ Form::label('angolo_studio', 'Angolo studio', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
            <span>{{ Form::checkbox('angolo_studio', true, false, ['id' => 'angolo_studio']) }}</span>
                </div>
                <div class="div-checkbox">
            {{ Form::label('locale_ricreativo', 'Locale ricreativo', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
            <span>{{ Form::checkbox('locale_ricreativo', true, false, ['id' => 'locale_ricreativo']) }}</span>
                </div>
                <div class="div-checkbox">
            {{ Form::label('garage', 'Garage', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
            <span>{{ Form::checkbox('garage', true, false, ['id' => 'garage']) }}</span>
            </div>
            </div>
            
            <div class="column">
                 <div class="div-checkbox">
                {{ Form::label('wifi', 'Wi-Fi', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
                <span>{{ Form::checkbox('wifi', true, false, ['id' => 'wifi']) }}</span>
                 </div>
                <div class="div-checkbox">
            {{ Form::label('climatizzatore', 'Climatizzatore', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
            <span>{{ Form::checkbox('climatizzatore', true, false, ['id' => 'climatizzatore']) }}</span>
                </div>
                <div class="div-checkbox">
            {{ Form::label('cucina', 'Cucina', ['title' => 'Valore facoltativo','class' => 'titolo']) }}
            <span>{{ Form::checkbox('cucina', true, false, ['id' => 'cucina']) }}</span>
                </div>
            </div>
        
        </div>
        </div>
            
           
                <div class="row">
                    <div style="text-align:center" class="container-form-btn">
                    {{ Form::submit('Aggiungi offerta', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                    </div>
                    {{ Form::close() }}
                </div>
    </div> 


@endsection
 

