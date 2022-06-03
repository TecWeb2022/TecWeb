<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\MessageList;
use App\Http\Requests\ModifyProfileRequest;

//use App\Http\Requests\NewProductRequest;

use Illuminate\Http\Request;

class LocHostController extends Controller {

    protected $user;

    public function __construct() {
        $this->middleware('can:isLocHost');
        $this->user = new User;
    }

    public function modificaProfilo(ModifyProfileRequest $request) {
        $dati = $request->validated();
        $id = auth()->user()->id;
        $this->user->modificaDati($id, $dati);
        return redirect()->route('profilo');
    }

    /*
    public function getMessaggiRicevuti() {
        $ml = new MessageList;
        $mess = $ml->messRicevuti(auth()->user()->id);
        //$messRic = $messRic->paginate(5);
        return view('messaggistica')
            ->with('mess', $mess);
    }
    
        public function getMessaggiInviati() {
        $ml = new MessageList;
        $mess = $ml->messInviati(auth()->user()->id);
        return view('messaggiInviati')
            ->with('mess', $mess);
    }
     * 
     */
    
    
    public function getMessaggio($id) {
        $mess = Message::find($id);
        $mess->visualizzato = true;
        $mess->save();
        return view('visualizzaMessaggio')
            ->with('mess', $mess);
    }
    

    
    public function getMessaggiRicevutiAjax() {
        $ml = new MessageList;
        $mess = $ml->messRicevuti_Utenti(auth()->user()->id);
        //$messRic = $messRic->paginate(5);
        return response()->json(['data'=>$mess]);
    }
    
    public function getMessaggiInviatiAjax() {
        $ml = new MessageList;
        $mess = $ml->messInviati_Utenti(auth()->user()->id);
        
        return response()->json(['data'=>$mess]); 
        //json_encode(array('data'=>$mess));
    }

    
    public function scriviMess(Request $request) {
        $mess = Message::find($request->id_mess);
        return view('scritturaMessaggio')
            ->with('mess', $mess);
    }
    
    public function inviaMess(Request $request) {
        
        $validatedData = $request->validate([
            'testo' => 'required',
            'id_dest' => 'required',
            'id_alloggio' =>'required',
            'created_at' => 'reqiured'
        ]);
        $mess = new Message;
        $mess->testo = $validatedData["testo"];
        $mess->id_mitt = auth()->user()->id;
        $mess->id_dest = $validatedData["id_dest"];
        $mess->id_alloggio = $validatedData["id_alloggio"];
        $mess->save();
        return redirect()->route('messaggisticaAjax');
    }
}
