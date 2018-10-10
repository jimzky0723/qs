<?php

namespace App\Http\Controllers;

use App\ListPatients;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataCtrl extends Controller
{
    public function __construct()
    {
        //$this->middleware('access');
    }

    public function getData()
    {
        $data = array();
        $weekly[] = array(1,1);
        $weekly[] = array(2,2);
        $weekly[] = array(3,1);
        $weekly[] = array(4,3);
        $weekly[] = array(5,2);
        $weekly[] = array(6,1);
        $weekly[] = array(7,2);

        $data['total'] = self::countTotalMonth();
        $data['weekly'] = $weekly;
        $data['child'] = 4;
        $data['adolescence'] = 2;
        $data['young'] = 3;
        $data['middle'] = 6;
        $data['old'] = 9;

        return $data;
    }

    static function calculatePercentage($last,$now)
    {
        if($last == 0)
        {
            return 0;
        }

        $n = $now - $last;
        $p = ($n/$last) * 100;
        return number_format($p,1);
    }

    static function countTotalToday()
    {
        $count = ListPatients::whereBetween('created_at',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()])
                    ->count();
        return $count;
    }

    static function countTotalTodayConsulted()
    {
        $count = ListPatients::where('step',4)
                    ->whereBetween('created_at',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()])
                    ->count();
        return $count;
    }

    static function countTotalWeek()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $count = ListPatients::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
            ->count();
        return $count;
    }

    static function countTotalMonth()
    {
        $count = ListPatients::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])
            ->count();
        return $count;
    }

    static function countLastWeek()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $count = ListPatients::whereBetween('created_at',[Carbon::now()->subWeek(1)->startOfWeek(),Carbon::now()->subWeek(1)->endOfWeek()])
            ->count();
        return $count;
    }
}
