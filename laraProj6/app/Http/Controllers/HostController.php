<?php

namespace App\Http\Controllers;


use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\Models\Resources\Faq;
use App\Models\Catalog;
use App\Http\Requests\NewAccommodationRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;


class HostController extends Controller {
    
    protected $_hostModel;
    protected $_faqModel;
    protected $_catalogModel;

    public function _construct() {
        $this->middleware('can:isHost');
        $this->_faqModel= new Faq;
        $this->_hostModel = new Host;
        $this->_catalogModel = new Catalog;
    }
    
    public function index() {
        //$faqs = $this->_faqModel->get();
        $faqs = new Faq;
        return view('home')
            ->with('faqs', $faqs->get());
    }
    
    public function insertAcc(NewAccommodationRequest $request) {

       $acc = new Accomodation;
       $validatedrequest = $request->validated();
       
       $path = $request->file('path_foto')->store('alloggi');
       
        foreach($validatedrequest as $key => $value ) {
            if($validatedrequest[$key] === 'path_foto') {}
                else {
                $acc[$key] = $validatedrequest[$key];
                }
        }
       
        $acc->path_foto = $path;
        $acc->proprietario = auth()->user()->id;
        $acc->save();
      
        return redirect()->route('gestioneAnn');  
    }
    
    
    public function infoAcc($id){
        $cat = new Catalog;
        $acc = $cat->getAccById($id);
        
        return view('accommodation.descrHostAcc')
                ->with('acc',$acc);
    }
    
    public function getAccsHost(){
        $cat = new Catalog;
        $catHost = $cat->getAllAcc()->where('proprietario', '=', auth()->user()->id);
        $catHost = $catHost->paginate(5);
        return view('accommodation.gestioneAcc')
                ->with('catHost', $catHost);
    }
    

    public function getAccModifica($id){
        $cat = new Catalog;
        $acc = $cat->getAccById($id);
        
        return view('accommodation.modificaHostAcc')
            ->with('acc',$acc);
    }
    
    public function modificaAcc(NewAccommodationRequest $request, $id){
        
        $validatedrequest = $request->validated();
       
        $path = $request->file('path_foto')->store('alloggi');
        $acc = Accomodation::find($id);
        
        foreach($validatedrequest as $key => $value) {
              $acc->$key = $value;       
        }
        $acc->path_foto = $path;
        $acc->save();
        return redirect()->route('infoAccHost')
                ->with('id',$id);
    }
}

