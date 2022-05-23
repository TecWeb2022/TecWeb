<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Catalog;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\User;

class Host {
    
    protected $_accomodation;
    
    public function __construct() {
        $this->_accomodation = new Accomodation;
    }

    //DA FARE
    
}
