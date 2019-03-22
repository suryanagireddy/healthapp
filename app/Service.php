<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function techniques(){
        return $this->hasMany('App\Technique');
    }

}
