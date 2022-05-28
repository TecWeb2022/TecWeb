<?php

namespace App\Http\Controllers;


use App\Models\Resources\Accomodation;
use App\Models\Locatario;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\Models\Resources\Faq;
use App\Models\Catalog;
use App\Models\OptionList;
use App\Http\Requests\NewAccommodationRequest;
use App\Http\Requests\ModifyAccommodationRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File; 

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
        
        //Va controllato che l'id del proprietario corrisponda a quello dell'user
        return view('accommodation.modificaHostAcc')
            ->with('acc',$acc);
    }
    
    public function insertAcc(NewAccommodationRequest $request) {

       $acc = new Accomodation;
       $validatedrequest = $request->validated();
       
        foreach($validatedrequest as $key => $value ) {
            $acc[$key] = $validatedrequest[$key]; 
        }
        
        if($request->hasFile('path_foto')){
            $path = $request->file('path_foto')->store('public/alloggi');
            $acc->path_foto = substr($path, 7);
        }
       
        $acc->proprietario = auth()->user()->id;
        $acc->save();
      
        //return redirect()->route('gestioneAnn');
        return response()->json(['redirect' => route('gestioneAnn')]);
    }
    
    public function modificaAcc(ModifyAccommodationRequest $request, $id){
        
       $validatedrequest = $request->validated();
        
       $acc = Accomodation::find($id);
        //eliminare la foto su acc
        foreach($validatedrequest as $key => $value) {
            if($key != 'path_foto'){
              $acc->$key = $value;  
            }
        }
              
       if($request->hasFile('path_foto')){
           File::delete('/storage/',$acc->path_foto);
            $path = $request->file('path_foto')->store('public/alloggi');
            $acc->path_foto = substr($path, 7);
        }
      
        $acc->save();
        
        return redirect()->route('infoAccHost',$id);
                
    }
    
    public function getAllOptions(){
        $id_user = auth()->user()->id;
        $optionListModel = new OptionList;
        $optionList = $optionListModel->getAccsAndOpts($id_user);

        
        return view('accommodation.richiesteHostAcc')
                ->with('dati',$optionList);
        
    }
    
    
}

