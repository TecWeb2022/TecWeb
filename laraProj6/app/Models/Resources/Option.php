<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Option extends Model
{
    protected $table = 'options';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    // Relazione One-To-One con User (locatario)
    public function locatario() {
        return $this->hasOne(User::class, 'id', 'id_locatario');
    }
    
    // Relazione One-To-One con Accomodation
    public function alloggio() {
        return $this->hasOne(Accomodation::class, 'id', 'id_alloggio');
    }
}
