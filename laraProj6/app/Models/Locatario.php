<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Catalog;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\User;

class Locatario {
    
    protected $_catModel;
    
    public function __construct() {
        $this->_catModel = new Catalog;
    }
    
    public function getCatFiltered($filtri) {
        return $this->_catModel->getCatByFilters($filtri);
    }

    public function modificaDati($id, $dati = array()) {
        $loc = User::find($id);
        foreach($dati as $key => $value) {
            if($key != '_token') {
                $loc->$key = $value;
            }
        }
        $loc->save();
    }
}
