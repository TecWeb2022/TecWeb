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

    protected $_faqModel;
    protected $_catalogModel;
    protected $filters;

    public function __construct() {
        $this->middleware('can:isLoc');
        $this->_faqModel = new Faq;
        $this->_catalogModel = new Catalog;
        $this->filters = array();
    }

    public function index() {
        $faqs = $this->_faqModel->get();
        return view('home')
            ->with('faqs', $faqs);
    }
    
    public function getCatPag($paged = 5){
         $cat = $this->_catalogModel->getCatByFilters(
                 session()->get('filters',''))->paginate(5);
        
        return view('catalogo')
            ->with('cat', $cat)
            ->with('oldFilters',session()->get('filters'));
    }
    
    public function filters(Request $request)
    {
        if($request->prezzo_min == null) {
           $request['prezzo_min'] = 0;
        }
        $validatedRequest = $request->validate([
            'tipologia' => 'required',
            'prov' => 'nullable|max:2',
            'inizio_disp' => 'nullable',
            'fine_disp' => 'after:inizio_disp|nullable',
            'prezzo_min' => 'nullable|numeric|min:0',
            'prezzo_max' => 'nullable|numeric|min:0|gte:prezzo_min',
            'num_camere' => 'integer|min:0|nullable',
            'posti_letto_tot' => 'nullable|integer|min:0',
            'sup' =>'nullable|numeric|min:0|',
            'letti_camera' =>'integer|min:0|nullable',
            'wifi' => 'nullable|boolean',
            'angolo_studio' => 'nullable|boolean',
            'climatizzatore' => 'nullable|boolean',
            'cucina' => 'nullable|boolean',
            'locale_ricreativo' => 'nullable|boolean',
            'garage' => 'nullable|boolean'
        ]);
        info('Validazione dei filtri');
        info($validatedRequest);
        session(['filters' => $validatedRequest]);
       
        info('I FILTRI GLOBALI: ');
        info(session()->get('filters'));
        /*
        return view('catalogo')
            ->with('oldFilters',$validatedRequest)
            ->with('cat', $cat);
         */
         return redirect()->route('catalogoLoc');
    }
    
    public function opzioneForm($id_acc){
         $acc = $this->_catalogModel->getAccById($id_acc);
         
         return view('locatario.opzioneAcc')
                ->with('acc', $acc);
    }

    public function invioOpzForm(Request $request,$id)
    {
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
