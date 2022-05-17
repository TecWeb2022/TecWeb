<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Photo;
use App\Users;

class Catalog
{
    //protected $photos;
    
    public function getAcc($paged=2){
        $acc = Accomodation::where('id', '<', 2^64-1);
        foreach ($acc as $value) {
            $value->path_photo = $this->tablePhotoAcc($value->id);
        }
        return $acc->paginate($paged);
    }
    
    public function tablePhotoAcc($id_acc) {
        $photos = Photo::where('path', '!=', '');
        $photo = $photos->where('id_alloggio', $id_acc)->first();
        return $photo;
    }
    
    /*
    public function getMainPhoto($id_acc){
        $this->photos = new Photo();
        $x = $this->photos->alloggio();
        return $x->where('id_alloggio', $id_acc);
    }
    
    public function x($id_acc) {
        $ciao = Photo::whereHas('alloggio', function ($query) use ($id_acc) {
                        $query->whereIn('id', $id_acc);
        });
        return $ciao;
    }
    */
}
