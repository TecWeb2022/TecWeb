@extends('layouts.locatore')

@section('title', 'Nuovo Alloggio')

@section('content')
<section id="works">

      <div class="row">
          
          <div class="card-content">
            <h1>Inserisci una nuova offerta</h1>

    
           {{ Form::open(array('route' => 'insertAccPost', 'id' => 'inserimentoAcc', 'files' => true, 'class' => 'contact-form')) }}
            <div  class="wrap-input">
                {{ Form::label('nome', 'Nome Alloggio', ['class' => 'label-input']) }}
                {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('tipologia', 'Tipologia', ['class' => 'label-input']) }}
                {{ Form::select('tipologia', ['ap' => 'Appartamento', 'cs' => 'Camera singola', 'cd' => 'Camera doppia'],'', ['id' => 'tipologia', 'onclick'=>'']) }}
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('descr', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::textarea('descr', '', ['class' => 'input', 'id' => 'descr', 'rows' => 4]) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('sup', 'Superficie(m^2)', ['class' => 'label-input']) }}
                {{ Form::text('sup', '', ['class' => 'input', 'id' => 'sup']) }}
            </div>
            
            <div  class="wrap-input">
                {{ Form::label('foto', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('foto', ['class' => 'input', 'id' => 'foto']) }}
            </div>

            

            <div  class="wrap-input">
                {{ Form::label('citta', 'Città', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta']) }}
            </div>

            <div  class="wrap-input">
                {{ Form::label('prov', 'Provincia', ['class' => 'label-input']) }}
                {{ Form::text('prov', '', ['class' => 'input', 'id' => 'prov']) }}
            </div>

            <div  class="wrap-input">
                {{ Form::label('via', 'Via', ['class' => 'label-input']) }}
                {{ Form::text('via', '', ['class' => 'input', 'id' => 'via']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('num_civ', 'Numero civico', ['class' => 'label-input']) }}
                {{ Form::text('num_civ', '', ['class' => 'input','id' => 'num_civ']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('inizio_disp', 'Inizio disponibilità offerta', ['class' => 'label-input']) }}
                {{ Form::date('inizio_disp', '', ['class' => 'input', 'id' => 'inizio_disp']) }}
            </div>
           
           <div  class="wrap-input">
                {{ Form::label('fine_disp', 'Fine disponibilità offerta', ['class' => 'label-input']) }}
                {{ Form::date('fine_disp', '', ['class' => 'input', 'id' => 'fine_disp']) }}
            </div>
           
           
            <div  class="wrap-input">
                {{ Form::label('eta_min', 'Età minima', ['class' => 'label-input']) }}
                {{ Form::text('eta_min', '', ['class' => 'input', 'id' => 'eta_min']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('eta_max', 'Età massima', ['class' => 'label-input']) }}
                {{ Form::text('eta_max', '', ['class' => 'input', 'id' => 'eta_max']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('sesso', 'Sesso(M/F)', ['class' => 'label-input']) }}
                {{ Form::select('sesso', ['M' => 'Uomo', 'F' => 'Donna', '' => 'Non specificato'],'', ['id' => 'sesso'] ) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('canone', 'Canone(in €,per mese)', ['class' => 'label-input']) }}
                {{ Form::text('canone', '', ['class' => 'input', 'id' => 'canone']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('posti_letto_tot', 'Posti letto totali', ['class' => 'label-input']) }}
                {{ Form::text('posti_letto_tot', '', ['class' => 'input', 'id' => 'posti_letto_tot']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('letti_camera', 'Posti letto camera', ['class' => 'label-input']) }}
                {{ Form::text('letti_camera', '', ['class' => 'input', 'id' => 'letti_camera']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('num_bagni', 'Numero di bagni', ['class' => 'label-input']) }}
                {{ Form::text('num_bagni', '', ['class' => 'input', 'id' => 'num_bagni']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('num_camere', 'Numero di camere', ['class' => 'label-input']) }}
                {{ Form::text('num_camere', '', ['class' => 'input', 'id' => 'num_camere']) }}
            </div>
           
           
           <div  class="wrap-input">
            <div class="column">
            {{ Form::label('angolo_studio', 'Angolo studio', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('angolo_studio', true, false, ['id' => 'angolo_studio']) }}

            {{ Form::label('locale_ricreativo', 'Locale ricreativo', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('locale_ricreativo', true, false, ['id' => 'locale_ricreativo']) }}
            
            {{ Form::label('garage', 'Garage', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('garage', true, false, ['id' => 'garage']) }}
            </div>
            
            <div class="column">
            {{ Form::label('wifi', 'Wi-Fi', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('wifi', true, false, ['id' => 'wifi']) }}

            {{ Form::label('climatizzatore', 'Climatizzatore', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('climatizzatore', true, false, ['id' => 'climatizzatore']) }}
            
            {{ Form::label('cucina', 'Cucina', ['title' => 'Valore facoltativo']) }}
            {{ Form::checkbox('cucina', true, false, ['id' => 'cucina']) }}
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
 

