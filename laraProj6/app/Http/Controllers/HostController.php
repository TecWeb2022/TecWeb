<?php

namespace App\Http\Controllers;


use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\Models\Resources\Faq;

use Illuminate\Http\Request;


class HostController extends Controller {
    
    protected $_hostModel;
    protected $_faqModel;

    public function _construct() {
        $this->_faqModel= new Faq;
        //$this->middleware('can:isHost');
        $this->_hostModel = new Host;
    }
    
    public function index() {
        //$faqs = $this->_faqModel->get();
        $faqs = new Faq;
        return view('accommodation.host')
            ->with('faqs', $faqs->get());
    }
    
    public function insertAcc(Request $request) {
        $acc = $request->all();
        //DA COMPLETARE
    }
    
    public function prova1 (){
        return view('accommodation/insertAcc');
    }
    
    
    
    

    
    
    }

