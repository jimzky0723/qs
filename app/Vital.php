<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    protected $table = 'vital';
    protected $fillable = ['station'];
}
