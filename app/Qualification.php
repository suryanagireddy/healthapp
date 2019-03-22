<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
