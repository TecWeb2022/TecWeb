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
    
    //effettua il join tra accommodation, users e options e restituisce tutte le opzioni relative a tutti gli alloggi di un locatore
    public function getAccsAndOpts($id_propr){
        
        //siccome alcune colonne delle tabelle hanno lo stesso nome, come prima cosa vengono rinominate
        $accs = Accomodation::where('proprietario','=',$id_propr)
                                ->select('id AS id_acc','nome AS nome_acc','tipologia AS tipologia_acc','canone', 'path_foto','proprietario','created_at AS created_as_acc','assegnato','inizio_disp','fine_disp');
            
        $opts = Option::select('id AS id_opt','data_stipula','id_alloggio','id_locatario','created_at AS created_at_opt');
            
        $locs = User::select('id AS id_loc','nome AS nome_loc','cognome AS cognome_loc','sesso','data_nasc');
        
        //Per effettuare il join è necessario interpretare $accs come una tabella. Utilizziamo DB::raw che permette di eseguire una qualsiasi query.
        //Il mergebinding permette di collegare le variabili (in questo caso $id_propr) richiamate dalle query precedenti, altrimenti andrebbero perse.
        //Viene usato joinSub poichè permette di fare il join direttamente con una query e non obbligatoriamente una tabella.
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
                                  ->orderBy('created_at_opt','DESC')
                                  ->paginate(5);
             
        return $accs_opts_locs;
    }
        
    //effettua il join tra accommodation, users e options e restituisce le opzioni relative ad un alloggio di un locatore
    public function getAccsAndOptsByAcc($id_propr,$id_acc){
            
        $accs = Accomodation::where('proprietario','=',$id_propr)
                                ->where('id','=',$id_acc)
                                ->select('id AS id_acc','nome AS nome_acc','tipologia AS tipologia_acc','canone', 'path_foto','proprietario','created_at AS created_as_acc','assegnato','inizio_disp','fine_disp');
            
        $opts = Option::select('id AS id_opt','data_stipula','id_alloggio','id_locatario','created_at AS created_at_opt');
            
        $locs = User::select('id AS id_loc','nome AS nome_loc','cognome AS cognome_loc','sesso','data_nasc');
            
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
                                  ->paginate(5);
          
             
        return $accs_opts_locs;
    }
}
