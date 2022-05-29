<?php

namespace App\Models;

use App\Models\Resources\Option;
use App\Models\Resources\Accomodation;
use App\User;
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
            $acc_opts = Accomodation::join('options','options.id_alloggio','=','accomodations.id')->get();
            return $acc_opts;
        }
        else{
            $accs = Accomodation::where('proprietario','=',$id_propr)
                                ->select('id AS id_acc','nome AS nome_acc','tipologia AS tipologia_acc','canone', 'path_foto','proprietario','created_at AS created_as_acc');
            
            $opts = Option::select('id AS id_opt','data_stipula','id_alloggio','id_locatario','created_at AS created_at_opt');
            
            $locs = User::select('id AS id_loc','nome AS nome_loc','cognome AS cognome_loc');
            
            $accs_opts = DB::table(DB::raw("({$accs->toSql()}) as accs"))
                                    ->mergeBindings($accs->getQuery())
                                    ->joinSub($opts,'opts',function($join){
                                         $join->on('accs.id_acc','=','opts.id_alloggio');
                                    });
                                    
            $accs_opts_locs = DB::table(DB::raw("({$locs->toSql()}) as locs"))
                                    ->mergeBindings($locs->getQuery())
                                    ->joinSub($accs_opts,'accs_opts',function($join){
                                         $join->on('locs.id_loc','=','accs_opts.id_locatario');
                                    })
                                      ->orderByDesc('created_at_opt')
                                      ->paginate(10);
                                    
            /*
            $accs_opts = Accomodation::join('options','options.id_alloggio','=','accomodations.id')
                                ->join('users','users.id','=','accomodations.proprietario')
                                
                                ->select('accomodations.id AS id_acc','accomodations.nome AS nome_acc','accomodations.tipologia AS tipologia_acc', 
                                     'accomodations.canone', 'accomodations.path_foto','accomodations.proprietario AS proprietario','accomodations.created_at AS created_as_acc','options.id AS id_opt',
                                     'options.data_stipula AS data_stipula','options.id_alloggio','options.id_locatario', 
                                     'options.created_at AS created_at_opt','users.id AS id_loc','users.nome AS nome_loc','users.cognome AS cognome_loc')
                                
                                ->where('proprietario','=',$id_propr)
                                ->paginate(2);
                                 *  * 
                                
            
            /*
            $opt_renamed = Option::select('id AS id_opt','data_stipula','id_alloggio','id_locatario','created_at AS created_at_opt');
            
            $acc_opts = $acc_renamed->joinSub($opt_renamed,'opt_renamed',function($join){
                                            $join->on('id_acc','=','opt_renamed.id_alloggio');
                    
                                            });
             * 
             */
            return $accs_opts_locs;
        }
    }
}