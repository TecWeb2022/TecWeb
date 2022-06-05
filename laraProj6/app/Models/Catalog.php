<?php

namespace App\Models;

use App\Models\Resources\Accomodation;

class Catalog
{
    public function getAllAcc() {
        return Accomodation::where('id', '<', pow(2, 64) - 1);
    }
    
    public function getAcc($paged=5){
        $acc = Accomodation::where('id', '<', pow(2, 64) - 1);
        return $acc->paginate($paged);
    }
    
    public function getAccById($id){
        $acc = Accomodation::find($id);
        return $acc;
    }
    
    public function getCatByFilters($filtri) {
        $cat = Accomodation::where('id', '<', pow(2, 64) - 1);
        //$cat = Accomodation::all()->all();
        foreach($filtri as $key => $value) {
            if($value != '' && $value != null && $value != false) {
                $segno = '=';
                switch($key) {
                    case 'sup':
                    case 'posti_letto_tot':
                    case 'num_camere':
                    case 'num_bagni':
                    case 'prezzo_min':
                    case 'inizio_disp':
                        $segno = '>=';
                        break;
                    case 'fine_disp':
                    case 'prezzo_max':
                        $segno = '<=';
                        break;
                    default:
                        $segno = '=';
                        break;
                }
                if($key != '_token' && $key != 'prezzo_min' && $key != 'prezzo_max' && $value != 'all') {
                    $cat = $cat->where($key, $segno, $value);
                }
                
                if($key == 'prezzo_min' || $key == 'prezzo_max') {
                    $cat = $cat->where('canone', $segno, $value);
                }
            }
        }
        return $cat;
    }
}
