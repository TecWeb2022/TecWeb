<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $primaryKey = 'path';
    public $timestamps = false;
    
    // Relazione One-To-One con Accomodation
    public function alloggio() {
        return $this->hasOne(Accomodation::class, 'id', 'id_alloggio');
    }
}
