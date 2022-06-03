<?php

namespace App\Models;

use App\Models\Resources\Message;
use App\User;

class MessageList
{

    public function messRicevuti($id_dest) {
        return Message::where('id_dest', '=', $id_dest)->orderBy('created_at', 'DESC')->paginate(5);
    }
    
    public function messRicevuti_Utenti($id_dest) {
        return Message::where('id_dest', '=', $id_dest)
                ->join('users','users.id','=','messages.id_mitt')
                ->join('accomodations', 'accomodations.id','=','messages.id_alloggio')
                ->select('messages.*','users.nome','users.cognome','accomodations.nome as nome_acc')
                ->orderBy('messages.created_at', 'DESC')
                ->paginate(5);
    }
    
    public function messInviati($id_mitt) {
        return Message::where('id_mitt', '=', $id_mitt)->orderBy('created_at', 'DESC')->paginate(5);
    }
    
    public function messInviati_Utenti($id_mitt) {
        return Message::where('id_mitt', '=', $id_mitt)
                ->join('users','users.id','=','messages.id_dest')
                ->join('accomodations', 'accomodations.id','=','messages.id_alloggio')
                ->select('messages.*','users.nome','users.cognome','accomodations.nome as nome_acc')
                ->orderBy('messages.created_at', 'DESC')
                ->paginate(5);
    }
}
