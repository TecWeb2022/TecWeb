<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cognome', 'data_nasc','sesso', 'tipologia', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
    
    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->tipologia, $role);
    }
    
    public function getEta(){
        $eta = (now()->diff($this->data_nasc))->y;
        return $eta;
    }
    
    public function modificaDati($id, $dati = array()) {
        $user = User::find($id);
        foreach($dati as $key => $value) {
            if($value != '' && $value != null) {
                if($key != 'password') {
                    $user->$key = $value;
                } else {
                    $user->$key = Hash::make($value);
                }
            }
        }
        $user->save();
    }
}
