<?php

namespace App\Http\Controllers;

use App\Models\Locatario;
use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\MessageList;
use App\Models\Resources\Option;
use App\Models\Resources\Faq;
use App\Models\Catalog;
use App\Http\Requests\ModifyProfileRequest;
use Carbon\Carbon;
use App\Http\Requests\FilterRequest;

//use App\Http\Requests\NewProductRequest;

use Illuminate\Http\Request;

class LocController extends Controller {

    protected $_locModel;
    protected $_faqModel;
    protected $_catalogModel;

    public function __construct() {
        $this->middleware('can:isLoc');
        $this->_locModel = new Locatario;
        $this->_faqModel = new Faq;
        $this->_catalogModel = new Catalog;
    }

    public function index() {
        $faqs = $this->_faqModel->get();
        return view('home')
            ->with('faqs', $faqs);
    }
    
    public function profilo() {
        return view('profiloLocatario');
    }

    public function modificaLoc(ModifyProfileRequest $request) {
        $dati = $request->all();
        $id = auth()->user()->id;
        $this->_locModel->modificaDati($id, $dati);
        return view('locatario')
            ->with('profilo', true);
    }
    
    public function getCatPag($filtri = array(), $paged = 5) {
        $cat = $this->_locModel->getCatFiltered($filtri);
        $cat = $cat->paginate($paged);
        return view('catalogo')
            ->with('cat', $cat);
    }
    
    public function filters(FilterRequest $request)
    {
        $filt = $request->validated();
        
        return $this->getCatPag($filt, 5);
    }
    
    public function opzioneForm($id_acc){
         $acc = $this->_catalogModel->getAccById($id_acc);
         
         return view('locatario.opzioneAcc')
                ->with('acc', $acc);
    }

    public function invioOpzForm(Request $request,$id)
    {
        //manca il validator
        $opzione = new Option;
        $opzione->id_alloggio = $id; 
        $opzione->id_locatario = auth()->user()->id;
        
        $mess = new Message;
        $mess->testo = $request->testo;
        $mess->id_mitt = auth()->user()->id;
        $acc = new Accomodation;
        $mess->id_dest = $acc->find($id)->propr->id;
        $mess->id_alloggio = $id;
        
        $mess->save();
        $opzione->save();
        return redirect()->route('catalogoLoc');
    }
    

    public function getMessaggiRicevuti() {
        $ml = new MessageList;
        $mess = $ml->messRicevuti(auth()->user()->id);
        //$messRic = $messRic->paginate(5);
        return view('messaggistica')
            ->with('mess', $mess);
    }
    
    public function getMessaggioRicevuto($id_mess) {
        //$mess = Message::where('id', '=', $id_mess);
        $mess = Message::find($id_mess);
        $mess->visualizzato = true;
        $mess->save();
        return view('visualizzaMessaggio')
            ->with('mess', $mess);
    }
    
    public function getMessaggiInviati() {
        $ml = new MessageList;
        $mess = $ml->messInviati(auth()->user()->id);
        return view('messaggiInviati')
            ->with('mess', $mess);
    }
    
    public function getMessaggioInviato($id_mess) {
        //$mess = Message::where('id', '=', $id_mess);
        $mess = Message::find($id_mess);
        return view('visualizzaMessaggioInviato')
            ->with('mess', $mess);
    }
    
    public function scriviMess($id_mess) {
        $mess = Message::find($id_mess);
        return view('scritturaMessaggio')
            ->with('mess', $mess);
    }
    
    public function riscriviMess($id_mess) {
        $mess = Message::find($id_mess);
        return view('riscritturaMessaggio')
            ->with('mess', $mess);
    }
    
    public function inviaMess(Request $request) {
        $mess = new Message;
        $mess->testo = $request->testo;
        $mess->id_mitt = auth()->user()->id;
        $mess->id_dest = $request->id_dest;
        $mess->id_alloggio = $request->id_alloggio;
        $mess->save();
        return redirect()->route('messaggisticaLoc');
    }
}
