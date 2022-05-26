<?php

namespace App\Models;

use App\Models\Resources\Message;

class MessageList
{

    public function messRicevuti($id_dest) {
        //return Message::all()->where('id_dest', '=', $id_dest);
        return Message::where('id_dest', '=', $id_dest)->paginate(5);
    }
    
    public function messInviati($id_mitt) {
        return Message::all()->where('id_mitt', '=', $id_mitt);
    }
}
