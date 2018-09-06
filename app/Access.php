<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';
    protected $fillable = [
        'id',
        'userId',
        'registration',
        'card',
        'vital',
        'pedia',
        'im',
        'surgery',
        'ob',
        'dental',
        'bite'
    ];
}
