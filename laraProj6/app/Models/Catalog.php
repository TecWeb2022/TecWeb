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
        info('entrato nei filtri: ');
        info($filtri);
        if($filtri != null){
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
               
                    if($key != '_token' && $key != 'prezzo_min' && $key != 'prezzo_max' && $value != 'all' && $key != 'inizio_disp' && $key != 'fine_disp') {
                        $cat = $cat->where($key, $segno, $value);
                    }

                    if($key == 'prezzo_min' || $key == 'prezzo_max') {
                        $cat = $cat->where('canone', $segno, $value);
                    }
                
                    if($key == 'inizio_disp'){
                       $cat = $cat->where('fine_disp', $segno, $value);
                    }
                    
                    if($key == 'fine_disp'){
                       $cat = $cat->where('inizio_disp', $segno, $value);
                    }
                    
                
            }
        }
        }
        return $cat;
    }
    
    public function getCatByFilters2($filtri) {
        $cat = Accomodation::where('id', '<', pow(2, 64) - 1);
        $result = array();
        //$cat = Accomodation::all()->all();
        info('entrato nei filtri: ');
        info($filtri);
        if($filtri != null){
            
            $n_filtri = count($filtri);
            for($i = $n_filtri; $i > 0; $i--) {
                foreach($cat as $acc) {
                    $counter_filters = 0;
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

                            if($key != '_token' && $key != 'prezzo_min' && $key != 'prezzo_max' && $value != 'all' && $key != 'inizio_disp' && $key != 'fine_disp') {
                                switch($segno) {
                                    case '=':
                                        if($acc->$key == $value) {
                                            $counter_filters++;
                                        }
                                        break;
                                    case '>=':
                                        if($acc->$key >= $value) {
                                            $counter_filters++;
                                        }
                                        break;
                                    case '<=':
                                        if($acc->$key <= $value) {
                                            $counter_filters++;
                                        }
                                        break;
                                }
                            }

                            if($key == 'prezzo_min' || $key == 'prezzo_max') {
                                switch($segno) {
                                    case '>=':
                                        if($acc->canone >= $value) {
                                            $counter_filters++;
                                        }
                                        break;
                                    case '<=':
                                        if($acc->canone <= $value) {
                                            $counter_filters++;
                                        }
                                        break;
                                }
                            }

                            if($key == 'inizio_disp'){
                                if($acc->fine_disp >= $value) {
                                    $counter_filters++;
                                }
                            }

                            if($key == 'fine_disp'){
                                if($acc->inizio_disp <= $value) {
                                    $counter_filters++;
                                }
                            }

                        }
                    }

                    if($counter_filters == $i) {
                        $result->append($acc);
                    }

                }
            }
            
        }
        else {
            $result = $cat;
        }
        return $result;
    }
}
