<?php

namespace App\Http\Controllers;

use App\ListPatients;
use App\News;
use App\Http\Controllers\DataCtrl as Data;
use Illuminate\Http\Request;

class HomeCtrl extends Controller
{
    public function __construct()
    {
//        $this->middleware('access');
    }

    public function index()
    {
        $countPatient = array(
            'today' => Data::countTotalToday(),
            'consulted' => Data::countTotalTodayConsulted(),
            'week' => Data::countTotalWeek(),
            'month' => Data::countTotalMonth(),
            'lastWeek' => Data::countLastWeek(),
            'percentage' => Data::calculatePercentage(Data::countLastWeek(),Data::countTotalWeek())
        );
        $countPatient = (object)$countPatient;
        return view('page.dashboard',[
            'countPatient' => $countPatient
        ]);
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

    function getStartAndEndDate($week, $year)
    {

        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7*$week)+1-$day)*24*3600;
        $return[0] = date('Y-n-j', $time);
        $time += 6*24*3600;
        $return[1] = date('Y-n-j', $time);
        return $return;
    }
}
