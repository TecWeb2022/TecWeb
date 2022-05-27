<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Accomodation extends Model
{
    protected $table = 'accomodations';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    // Relazione One-To-One con User (proprietario)
    public function propr() {
        return $this->hasOne(User::class, 'id', 'proprietario');
    }
}
