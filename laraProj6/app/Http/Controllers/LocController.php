<?php

namespace App\Http\Controllers;

use App\Models\Locatario;
use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\Models\Resources\Faq;

//use App\Http\Requests\NewProductRequest;

use Illuminate\Http\Request;

class LocController extends Controller {

    protected $_locModel;
    protected $_faqModel;

    public function __construct() {
        //$this->middleware('can:isLoc');
        $this->_locModel = new Locatario;
        $this->_faqModel = new Faq;
    }

    public function index() {
        $faqs = $this->_faqModel->get();
        return view('locatario')
            ->with('faqs', $faqs);
    }
    
    public function profilo() {
        return view('profiloLocatario');
    }

    public function modificaLoc($id, $request) {
        $dati = $request->all();
        $this->_locModel->modificaDati($id, $dati);
        return view('profiloLocatario');
    }
    
    public function getCatPag($filtri = array(), $paged = 5) {
        $cat = $this->_locModel->getCatFiltered($filtri);
        $cat = $cat->paginate($paged);
        return view('catalogoLoc')
            ->with('cat', $cat);
    }
    
    public function filters(Request $request)
    {
        $rules =[
            'prov' => 'string|max:20|nullable',
            'posti_letto_tot' => 'integer|min:0|nullable',
            'prezzo_min' => 'numeric|min:0|nullable',
            'prezzo_max' => 'numeric|min:0|nullable',
            'sup' => 'numeric|min:0|nullable',
            'letti_camera' => 'numeric|min:0|nullable',
            'num_camere' => 'numeric|min:0|nullable',
        ];
        $this->validate($request, $rules);
        
        $filt = $request->all();
        return $this->getCatPag($filt, 5);
    }

}
