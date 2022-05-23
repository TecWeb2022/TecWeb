<?php

namespace app\Http\Controllers;


use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;

use Illuminate\Http\Request;


class HostController extends Controller {
    
    protected $_hostModel;

    public function _construct() {
        //$this->middleware('can:isHost');
        $this->_hostModel = new Host;
    }
    
    public function insertAcc(Request $request) {
        $acc = $request->all();
        //DA COMPLETARE
    }
    
    public function prova1 (){
        return view('accommodation/insertAcc');
    }
    
    /*
    public function index() {
        return view('host');
    }
     */
    

    
    
    }

