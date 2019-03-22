<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_no',
        'abn_no',
        'filename',
        'service_id',
        'qualification_id',
        'technique_id',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function qualifications(){
        return $this->hasMany('App\Qualification');
    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }

    public function techniques(){
        return $this->hasMany('App\Technique');
    }
}
