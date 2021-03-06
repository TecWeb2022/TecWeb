<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    // Relazione One-To-One con User (mittente)
    public function mitt() {
        return $this->hasOne(User::class, 'id', 'id_mitt');
    }
    
    // Relazione One-To-One con User (destinatario)
    public function dest() {
        return $this->hasOne(User::class, 'id', 'id_dest');
    }
    
    // Relazione One-To-One con Accomodation
    public function alloggio() {
        return $this->hasOne(Accomodation::class, 'id', 'id_alloggio');
    }
}
