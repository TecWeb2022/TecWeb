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

    public function getMessaggiRicevuti() {
        $ml = new MessageList;
        $mess = $ml->messRicevuti(auth()->user()->id);
        //$messRic = $messRic->paginate(5);
        return view('messaggistica')
            ->with('mess', $mess);
    }
    
    public function getMessaggioRicevuto(Request $request) {
        //$mess = Message::where('id', '=', $id_mess);
        $mess = Message::find($request->id_mess);
        $mess->visualizzato = true;
        $mess->save();
        return view('visualizzaMessaggio')
            ->with('mess', $mess);
    }
    
    public function getMessaggiInviati() {
        $ml = new MessageList;
        $mess = $ml->messInviati(auth()->user()->id);
        return view('messaggiInviati')
            ->with('mess', $mess);
    }
    
    public function getMessaggiInviatiAjax() {
        $ml = new MessageList;
        $mess = $ml->messInviati(auth()->user()->id);
        
        return json_encode(array('data'=>$mess));
    }
    public function getMessaggioInviato($id_mess) {
        //$mess = Message::where('id', '=', $id_mess);
        $mess = Message::find($id_mess);
        return view('visualizzaMessaggioInviato')
            ->with('mess', $mess);
    }
    
    public function scriviMess(Request $request) {
        $mess = Message::find($request->id_mess);
        return view('scritturaMessaggio')
            ->with('mess', $mess);
    }
    
    public function riscriviMess($id_mess) {
        $mess = Message::find($id_mess);
        return view('riscritturaMessaggio')
            ->with('mess', $mess);
    }
    
    public function inviaMess(Request $request) {
        $mess = new Message;
        $mess->testo = $request->testo;
        $mess->id_mitt = auth()->user()->id;
        $mess->id_dest = $request->id_dest;
        $mess->id_alloggio = $request->id_alloggio;
        $mess->save();
        return redirect()->route('messaggisticaLoc');
    }
}
