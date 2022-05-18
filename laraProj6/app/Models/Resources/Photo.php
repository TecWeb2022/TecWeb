<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    // Relazione One-To-One con Accomodation
    public function alloggio() {
        return $this->hasOne(Accomodation::class, 'id', 'id_alloggio');
    }
}