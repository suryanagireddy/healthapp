<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    //
    protected $fillable = [
        'name',
        'service_id',
    ];

    public function services(){
        return $this->belongsToMany('App\Service');
    }
}
