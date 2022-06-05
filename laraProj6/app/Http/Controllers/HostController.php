<?php

namespace App\Http\Controllers;


use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\Models\Catalog;
use App\Models\OptionList;
use App\Http\Requests\NewAccommodationRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File; 
use App\User;

use Illuminate\Http\Request;


class HostController extends Controller {
    
    protected $_catalogModel;

    public function _construct() {
        $this->middleware('can:isHost');
        $this->_catalogModel = new Catalog;
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
    
    public function insertAcc(Request $request) {

       if($request->eta_min == null) {
           $request['eta_min'] = 0;
       }
       if($request->eta_max == null) {
           $request['eta_max'] = 150;
       }
       $validatedrequest = $request->validate([
            'nome' => 'required|string|max:100',            
            'descr' => 'required|string|max:500',
            'path_foto' => 'required|file|mimes:jpeg,png,jpg|max:1024',
            'tipologia' => 'required|max:2',
            'citta' => 'required|max:50',
            'prov' => 'required|max:2',
            'via' => 'required|max:50',
            'num_civ' =>'required',
            'sup' =>'required|numeric|min:0|max:1000|',
            'inizio_disp' =>'required|after:now',
            'fine_disp' =>'required|after:inizio_disp',
            'eta_min' =>'integer|min:0|max:150|nullable',
            'eta_max' =>'integer|min:0|max:150|nullable|gte:eta_min',
            'sesso' =>'max:1|nullable',
            'canone' => 'required|numeric|min:0',
            'posti_letto_tot' =>'required|integer|min:0|max:1000',
            'letti_camera' =>'integer|min:0|max:100|nullable',
            'num_bagni' =>'integer|min:0|max:100|nullable',
            'num_camere' =>'integer|min:0|max:500|nullable',
            'wifi' => 'boolean',
            'angolo_studio' => 'boolean',
            'climatizzatore' => 'boolean',
            'cucina' => 'boolean',
            'locale_ricreativo' => 'boolean',
            'garage' => 'boolean'
        ]);
       
        $acc = new Accomodation;
       
        foreach($validatedrequest as $key => $value ) {
            if($key == 'eta_min' && $value == 0) {
                $acc->$key = null;
            } elseif($key == 'eta_max' && $value == 150) {
                $acc->$key = null;
            } else{
                $acc->$key = $value;
            }
        }
        
        if($request->hasFile('path_foto')){
            $path = $request->file('path_foto')->store('public/alloggi');
            $acc->path_foto = substr($path, 7);
        }
       
        $acc->proprietario = auth()->user()->id;
        $acc->save();
      
        //return redirect()->route('gestioneAcc');
        return response()->json(['redirect' => route('gestioneAcc')]);
    }
    
    public function modificaAcc(Request $request){
        
       if($request->eta_min == null) {
           $request['eta_min'] = 0;
       }
       if($request->eta_max == null) {
           $request['eta_max'] = 150;
       }
       $validatedrequest = $request->validate([
            'nome' => 'required|string|max:100',            
            'descr' => 'required|string|max:500',
            'path_foto' => 'file|mimes:jpeg,png,jpg|max:1024',
            'tipologia' => 'required|max:2',
            'citta' => 'required|max:50',
            'prov' => 'required|max:2',
            'via' => 'required|max:50',
            'num_civ' =>'required',
            'sup' =>'required|numeric|min:0|max:1000',
            'inizio_disp' =>'required',
            'fine_disp' =>'required|after:inizio_disp',
            'eta_min' =>'integer|min:0|max:150|nullable',
            'eta_max' =>'integer|min:0|max:150|nullable|gte:eta_min',
            'sesso' =>'max:1|nullable',
            'canone' => 'required|numeric|min:0',
            'posti_letto_tot' =>'required|integer|min:0|max:1000',
            'letti_camera' =>'integer|min:0|max:100|nullable',
            'num_bagni' =>'integer|min:0|max:100|nullable',
            'num_camere' =>'integer|min:0|max:500|nullable',
            'wifi' => 'boolean',
            'angolo_studio' => 'boolean',
            'climatizzatore' => 'boolean',
            'cucina' => 'boolean',
            'locale_ricreativo' => 'boolean',
            'garage' => 'boolean',
            'id_acc' => 'integer'
        ]);
        
       $acc = Accomodation::find($validatedrequest['id_acc']);
        //eliminare la foto su acc
        foreach($validatedrequest as $key => $value) {
            if($key != 'path_foto' && $key != 'id_acc'){
                if($key == 'eta_min' && $value == 0) {
                    $acc->$key = null;
                } elseif($key == 'eta_max' && $value == 150) {
                    $acc->$key = null;
                } else{
                    $acc->$key = $value;
                }
            }
        }
              
       if($request->hasFile('path_foto')){
           File::delete('/storage/',$acc->path_foto);
            $path = $request->file('path_foto')->store('public/alloggi');
            $acc->path_foto = substr($path, 7);
        }
      
        $acc->save();
        
        return redirect()->route('gestioneAcc');
                
    }
    
    public function eliminaAcc(Request $request) {
        $acc = Accomodation::find($request->id_acc);
        $acc->delete();
        
        $opts = Option::where('id_alloggio', '=', $request->id_acc);
        foreach($opts as $opt) {
            $opt->delete();
        }
        
        return redirect()->route('gestioneAcc');
    }
    
    public function getAllOptions(){
        $id_user = auth()->user()->id;
        $optionListModel = new OptionList;
        $optionList = $optionListModel->getAccsAndOpts($id_user);

        
        return view('accommodation.richiesteHostAcc')
                ->with('dati',$optionList);
        
    }
    
    public function getOptionsAcc(Request $request){
        $id_user = auth()->user()->id;
        $optionListModel = new OptionList;
        $optionList = $optionListModel->getAccsAndOptsByAcc($id_user,$request->id_acc);
        $nome_acc = Accomodation::find($request->id_acc)->nome;
        return view('accommodation.richiestePerAcc')
                ->with('dati',$optionList)
                ->with('nome_acc',$nome_acc);
        
    }
    
    public function accettaOfferta(Request $request) {
        $opt = Option::find($request->id_opt);
        $opt->data_stipula = now();
        $acc = Accomodation::find($opt->id_alloggio);
        $opts = Option::where('id_alloggio', '=', $opt->id_alloggio)->get(); //Trovo tutte le opzioni relative a quell'alloggio
        $opt->save();
        
        $acc->assegnato = true;
        $acc->save();
        
        //Elimino dal db tutti gli opzionamenti che non sono stati accettati
        foreach($opts as $op) {
            if($op['id'] != $opt->id) {
                $o = Option::find($op->id);
                $o->delete();
            }
        }
        
        if($request->from_bool){
            return redirect()->route('visualizzaTutteOpzioni');
        }else{
            return redirect()->route('gestioneAcc');
        }
    }
    

    
    public function contratto(Request $request) {
        $opt = Option::find($request->id_opt);
        $loc = User::find($opt->id_locatario);
        $acc = Accomodation::find($opt->id_alloggio);
        return view('contratto')
            ->with('acc', $acc)
            ->with('loc', $loc)
            ->with('option', $opt);
    }
}

