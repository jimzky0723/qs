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

    public function defaultScreen($section='pedia'){
        $news = News::orderBy('created_at','desc')->get();
        return view('screen/default',[
            'pending' => self::getPendingInCard(),
            'news' => $news,
            'section' => $section
        ]);
    }

    static function getNumber($section)
    {
        $data = optional(Number::where('section',$section)
            ->first());

        if($data->num <= 0){
            $data->num = '&nbsp';
            $data->priority = 0;
        }
        return $data;
    }

    static function initialSection($section)
    {
        switch ($section){
            case 'pedia':
                return 'P';
            case 'im':
                return 'IM';
            case 'surgery':
                return 'S';
            case 'ob':
                return 'OB';
            case 'dental':
                return 'D';
            case 'bite':
                return 'A';
            default:
                return false;
        }
    }
}
