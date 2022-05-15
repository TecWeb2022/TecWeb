<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    protected $table = 'accomodations';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    // Relazione One-To-One con User (proprietario)
    public function mitt() {
        return $this->hasOne(User::class, 'id', 'proprietario');
    }
}
