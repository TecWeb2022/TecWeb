

@section('content')
<section id="works">

      <div class="row">
          
          <div class="column">
            <h1>Inserisci un'offerta</h1>

    
           {{ Form::open(array('route' => 'newproduct.store', 'id' => 'addproduct', 'files' => true, 'class' => 'contact-form')) }}
            <div  class="wrap-input">
                {{ Form::label('nome', 'Nome Alloggio', ['class' => 'label-input']) }}
                {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
            </div>

            <div  class="wrap-input">
                {{ Form::label('descr', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::textarea('descr', '', ['class' => 'input', 'id' => 'descr', 'rows' => 2]) }}
            </div>
           
            

            <div  class="wrap-input">
                {{ Form::label('path_foto', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('path_foto', ['class' => 'input', 'id' => 'path_foto']) }}
            </div>

            <div  class="wrap-input">
                {{ Form::label('tipologia', 'Tipologia', ['class' => 'label-input']) }}
                {{ Form::text('tipologia', '', ['class' => 'input', 'id' => 'tipologia']) }}
            </div>

            <div  class="wrap-input">
                {{ Form::label('citta', 'Città', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta']) }}
            </div>

            <div  class="wrap-input">
                {{ Form::label('prov', 'Provincia(per esteso)', ['class' => 'label-input']) }}
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
                {{ Form::date('inizio_disp', $data =>fine_disp =>format('Y-m-d')) }}
            </div>
           
           <div  class="wrap-input">
                {{ Form::label('fine_disp', 'Inizio disponibilità offerta', ['class' => 'label-input']) }}
                {{ Form::date('fine_disp', $data =>fine_disp =>format('Y-m-d')) }}
            </div>
           
           
            <div  class="wrap-input">
                {{ Form::label('eta_min', 'Età minima', ['class' => 'label-input']) }}
                {{ Form::text('eta_min', '', ['class' => 'input', 'id' => 'eta_min']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('eta_max', 'Sesso(M/F)', ['class' => 'label-input']) }}
                {{ Form::text('eta_max', '', ['class' => 'input', 'id' => 'eta_max']) }}
            </div>
           
            <div  class="wrap-input">
                {{ Form::label('sesso', 'Età massima', ['class' => 'label-input']) }}
                {{ Form::text('sesso', '', ['class' => 'input', 'id' => 'sesso']) }}
            </div>

           
            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('discounted', 'In Sconto', ['class' => 'label-input']) }}
                {{ Form::select('discounted', ['1' => 'Si', '0' => 'No'], 1, ['class' => 'input','id' => 'discounted']) }}
            </div>

           

            <div class="container-form-btn">
                {{ Form::submit('Aggiungi offerta', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>


@endsection
 

