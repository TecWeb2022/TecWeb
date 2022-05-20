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
                    case 'prezzo_min':
                    case 'fine_disp':
                        $segno = '>=';
                        break;
                    case 'inizio_disp':
                    case 'prezzo_max':
                        $segno = '<=';
                        break;
                    default:
                        $segno = '=';
                        break;
                }
                if($key != '_token' && $key != 'prezzo_min' && $key != 'prezzo_max') {
                    $cat = $cat->where($key, $segno, $value);
                }
                //DA FARE IF PER PREZZOMIN E MAX -> RICORDARSI CHE LA $KEY DEVE ESSERE CANONE E NON PREZZOMIN O MAX
                if($key == 'prezzo_min' || $key == 'prezzo_max') {
                    $cat = $cat->where('canone', $segno, $value);
                }
            }
        }
        return $cat;
    public function getAccById($id){
        $acc = Accomodation::where('id','=',$id);
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
