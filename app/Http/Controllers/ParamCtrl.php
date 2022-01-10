<?php

namespace App\Http\Controllers;

use App\Parameters;
use Illuminate\Http\Request;

class ParamCtrl extends Controller
{
    static function getValue($desc){
        $param = Parameters::where('description',$desc)->first()->value;
        return $param;
    }
}
