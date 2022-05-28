<?php

namespace App\Models;

use App\Models\Resources\Option;
use App\Models\Resources\Accomodation;
use Illuminate\Support\Facades\DB;
class OptionList
{
    
    public function getAllOptions(){
         return Option::where('id', '<', pow(2, 64) - 1);
    }
    
    
    public function getOptionById($id) {
        $opt = Option::find($id);
        return $opt;
    }
    
    public function getOptionByAccId($id){
        $opts = Option::where('id_alloggio','=', $id);
        return $opts;
    }
    
    public function getOptionsByLocId($id){
        $opts = Option::where('id_locatario','=', $id);
        return $opts;
    }
    
    public function getAccsAndOpts($id_propr = null){
        if(is_null($id_propr)){
            $acc_opts = Accomodation::join('Resources/Option','Option.id_alloggio','=','Accomodation.id')->get();
            return $acc_opts;
        }
        else{
            
            $acc_opts = Accomodation::join('options','options.id_alloggio','=','accomodations.id')
                            ->join('users','users.id','=','options.id_locatario')
                            ->where('proprietario','=',$id_propr)->paginate(2);
            return $acc_opts;
        }
    }
}