<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Photo;
use App\Users;

class Catalog
{
    
    public function getAcc(){
        $acc = Accomodation::where();
        
        return $acc->paginate(1);
    }
}
