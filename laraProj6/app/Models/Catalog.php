<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Photo;
use App\Users;

class Catalog
{
    public function getAcc($paged=2){
        $acc = Accomodation::where('id', '<', 2^64-1);
        return $acc->paginate($paged);
    }
}
