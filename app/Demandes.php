<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_demandeur', 'id_receveur',
    ];


    public function users(){
        return $this->belongsToMany('App\User');
    }
}
