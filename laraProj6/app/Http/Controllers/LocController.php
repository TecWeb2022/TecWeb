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
        $opzione['nota'] = $request->input('nota');
        $opzione['data_inizio'] = $request->input('data_inizio');
        $opzione['data_fine'] = $request->input('data_fine');
        $opzione['data_invio'] = Carbon::now();
        $opzione['id_alloggio'] = $id; 
        $opzione['id_locatario'] = auth()->user()->id;
        
        $opzione->save();
        return view('catalogoLoc');
    }
    

    public function getMessaggiRicevuti() {
        $ml = new MessageList;
        $messRic = $ml->messRicevuti(auth()->user()->id);
        //$messRic = $messRic->paginate(5);
        return view('messaggistica')
            ->with('messRic', $messRic);
    }
    
    public function getMessaggio($id_mess) {
        //$mess = Message::where('id', '=', $id_mess);
        $mess = Message::find($id_mess);
        return view('visualizzaMessaggio')
            ->with('mess', $mess);
    }
    
    public function getMessaggiInviati() {
        $ml = new MessageList;
        $messInv = $ml->messInviati(auth()->user()->id);
        return view('messaggistica')
            ->with('messInv', $messInv);
    }
}
