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
        return $acc->paginate($paged);
    }
    
    public function getAccById($id){
        $acc = Accomodation::find($id);
        return $acc;
    }
    /*
    public function getPhoto() {
        $photos = array();
        $i = 0;
        $acc = Accomodation::where('id', '<', 2^64-1);
        foreach ($acc as $value) {
            $photos[$i] = $this->tablePhotoAcc($value->id)->path;
            $i = $i + 1;
        }
        return $photos;
    }
    */
    /*
    public function tablePhotoAcc($id_acc) {
        $photo = Photo::where('id_alloggio', $id_acc)->first();
        //$photo = $photos->where('id_alloggio', $id_acc)->first();
        return $photo;
    }
    */
    
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
