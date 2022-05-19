<?php

namespace App\Http\Controllers;

use App\Models\Locatario;
use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
//use App\Http\Requests\NewProductRequest;

class LocController extends Controller {

    protected $_locModel;

    public function __construct() {
        $this->middleware('can:isLoc');
        $this->_locModel = new Locatario;
    }

    public function index() {
        return view('locatario');
    }

    public function getCatPag($filtri, $paged = 5) {
        $cat = $this->_locModel->getCatByFilters($filtri);
        $cat = $cat->paginate($paged);
        return view('catalogo')
            ->with('cat', $cat);
    }
    
    public function filters(Request $request)
    {
        $filt = $request->all();
        return view('catalogo')
            ->with('cat', $cat);
    }

}
