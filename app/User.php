<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'age', 'dispo', 'candidature_mentor','candidature_mentorer', 'email', 'password',
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
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function competences(){
        return $this->belongsToMany('App\Competences');
    }

    public function demandes(){
        return $this->belongsToMany('App\Demandes');
    }

    // Permet de récupérer le nom du rôle (utiliser dans le Provider)
    public function isAdmin(){
        return $this->roles()->where('nom','admin')->first();
    }

    public function hasAnyRole(array $roles){
        return $this->roles()->whereIn('nom', $roles)->first();
    }
}
