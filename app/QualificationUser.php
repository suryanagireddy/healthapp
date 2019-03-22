<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationUser extends Model
{
    //
    protected $fillable = [
        'qualification_id',
        'user_id',
    ];

}
