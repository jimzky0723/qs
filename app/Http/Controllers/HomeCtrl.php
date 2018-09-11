<?php

namespace App\Http\Controllers;

use App\ListPatients;
use App\News;
use Illuminate\Http\Request;

class HomeCtrl extends Controller
{
    public function __construct()
    {
//        $this->middleware('access');
    }

    public function index()
    {
        return view('page.dashboard');
    }

    public function screen()
    {
        $news = News::orderBy('created_at','desc')->get();
        return view('screen',[
            'pending' => self::getPendingInCard(),
            'news' => $news
        ]);
    }

    public function getPendingInCard()
    {
        $data = ListPatients::select('num','id')
            ->where('status','pending')
            ->limit(12)
            ->get();
        return $data;
    }
}
