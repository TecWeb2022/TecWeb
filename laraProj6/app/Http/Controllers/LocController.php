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
use App\Http\Requests\CatalogFiltersRequest;
use Carbon\Carbon;

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
        $dati = $request->validated();
        $id = auth()->user()->id;
        $this->_locModel->modificaDati($id, $dati);
        return redirect()->route('profiloLoc');
    }
    
    public function getCatPag($filtri = array(), $paged = 5) {
        $cat = $this->_locModel->getCatFiltered($filtri);
        $cat = $cat->paginate($paged);
        return view('catalogo')
            ->with('cat', $cat);
    }
    
    public function filters(CatalogFiltersRequest $request)
    {
        $request->validated();
        return $this->getCatPag($request->all(), 5);
    }
    
    public function opzioneForm($id_acc){
         $acc = $this->_catalogModel->getAccById($id_acc);
         
         return view('locatario.opzioneAcc')
                ->with('acc', $acc);
    }

    public function invioOpzForm(Request $request,$id)
    {
        //manca il validator
        $validatedData = $request->validate([
            'testo' => 'required|max:1000',
        ]);
        $opzione = new Option;
        $opzione->id_alloggio = $id; 
        $opzione->id_locatario = auth()->user()->id;
        
        
        $mess = new Message;
        $mess->testo = $validatedData["testo"];
        $mess->id_mitt = auth()->user()->id;
        $acc = new Accomodation;
        $mess->id_dest = $acc->find($id)->propr->id;
        $mess->id_alloggio = $id;
        
        $mess->save();
        $opzione->save();
        return redirect()->route('catalogoLoc');
    }
    
}
