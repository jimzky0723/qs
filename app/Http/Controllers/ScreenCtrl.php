<?php

namespace App\Http\Controllers;

use App\ListPatients;
use App\News;
use App\Number;
use Illuminate\Http\Request;

class ScreenCtrl extends Controller
{
    public function __construct()
    {

    }

    public function getPendingInCard()
    {
        $data = ListPatients::select('num','id')
            ->where('status','pending')
            ->limit(12)
            ->get();
        return $data;
    }

    public function showScreen($screen)
    {
        $news = News::orderBy('created_at','desc')->get();
        return view('screen/' . $screen,[
            'pending' => self::getPendingInCard(),
            'news' => $news
        ]);
    }

    static function getNumber($section)
    {
        $data = Number::where('section',$section)
            ->first();

        if($data->num <= 0){
            $data->num = '&nbsp';
            $data->priority = 0;
        }
        return $data;
    }
}
