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

    public function getCatPag($filtri = array(), $paged = 5) {
        $cat = $this->_locModel->getCatFiltered($filtri);
        $cat = $cat->paginate($paged);
        return view('catalogoLoc')
            ->with('cat', $cat);
    }
    
    public function filters(Request $request)
    {
        $filt = $request->all();
        return $this->getCatPag($filt, 5);
    }

}
