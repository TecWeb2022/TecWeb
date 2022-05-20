<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Catalog;
use App\Models\Resources\Message;
use App\Models\Resources\Option;

class Locatario {
    
    protected $_catModel;
    
    public function __construct() {
        $this->_catModel = new Catalog;
    }
    
    public function getCatFiltered($filtri) {
        return $this->_catModel->getCatByFilters($filtri);
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
