<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;

class Locatario {
    
    public function getCatByFilters($filtri) {
        $cat = Accomodation::where('id', '<', 2^64-1);
        foreach($filtri as $key => $value) {
            if($value != '' && $value != null) {
                $segno = '=';
                switch($key) {
                    /*
                    case 'tipologia':
                    case 'prov':
                    case 'cucina':
                    case 'locale_ricreativo':
                    case 'angolo_studio':
                    case 'posti_letto':
                        $segno = '=';
                        break;
                    */
                    case 'sup':
                    case 'posti_letto':
                    case 'num_camere':
                    case 'num_bagni':
                    case 'prezzo_max':
                    case 'fine_disp':
                        $segno = '>=';
                        break;
                    case 'inizio_disp':
                    case 'prezzo_min':
                        $segno = '<=';
                        break;
                    default:
                        $segno = '=';
                        break;
                }
                $cat = $cat::where($key, $segno, $value);
            }
        }
        return $cat;
    }

    /*
    public function getAccByFilters($tipoAcc = '', $prov = '', $dataInizio = '', $dataFine = '3000-01-01', $prezzoMin = 0.0, $prezzoMax = PHP_FLOAT_MAX,
            $dimAcc = null, $numCam = null, $numPSTot = null, $cucina = null, $locRicr = null,
            $angStud = null, $postiStanza = null, $dimCam = null) {
        
        if($dataInizio == '') {
            $dataInizio = date('Y-m-d');
        }
        
        $cat = null;
        
        switch($tipoAcc) {
            case 'ap':
                $cat = Accomodation::where('tipologia', '=', 'ap');
                break;
            case 'cs':
                break;
            case 'cd':
                break;
            default:
                break;
        }
        //return Category::where('parId', '!=', 0)->get();
    }
    */

}
