<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListPatients extends Model
{
    protected $table = 'list';
    protected $fillable = ['step'];
}
