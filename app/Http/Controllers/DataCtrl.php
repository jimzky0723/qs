<?php

namespace App\Http\Controllers;

use App\ListPatients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataCtrl extends Controller
{
    public function __construct()
    {
        //$this->middleware('access');
    }

    public function getData()
    {
        $data = array();

        $data['total'] = self::countTotalWeek();
        $data['weekly'] = self::weeklyActivity();
        $data['pedia'] = self::countPerSectionInMonth('pedia');
        $data['im'] = self::countPerSectionInMonth('im');
        $data['surgery'] = self::countPerSectionInMonth('surgery');
        $data['ob'] = self::countPerSectionInMonth('ob');
        $data['dental'] = self::countPerSectionInMonth('dental');
        $data['bite'] = self::countPerSectionInMonth('bite');
        $data['weeklySection'] = self::weeklyActivityBySection();

        return $data;
    }

    static function countPerSectionInMonth($section)
    {
        $count = ListPatients::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])
            ->where('section',$section)
            ->count();
        return $count;
    }

    static function weeklyActivityBySection()
    {
        $sections = array(
            'pedia',
            'im',
            'surgery',
            'ob',
            'dental',
            'bite'
        );

        $weekly = array();
        Carbon::setWeekStartsAt(Carbon::SUNDAY);

        foreach($sections as $section){
            $startDay = Carbon::now()->startOfWeek();
            for($c=1; $c <= 7; $c++)
            {
                $start = Carbon::parse($startDay)->startOfDay();
                $end = Carbon::parse($startDay)->endOfDay();

                $count = ListPatients::whereBetween('created_at',[$start,$end])
                    ->where('section',$section)
                    ->count();

                $weekly[$section][] = array($c,$count);
                $startDay = $startDay->addDay();
            }
        }

        return $weekly;
    }

    static function weeklyActivity()
    {
        $weekly = array();
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $startDay = Carbon::now()->startOfWeek();
        for($c=1; $c <= 7; $c++)
        {
            $start = Carbon::parse($startDay)->startOfDay();
            $end = Carbon::parse($startDay)->endOfDay();

            $count = ListPatients::whereBetween('created_at',[$start,$end])
                ->count();
            $weekly[] = array($c,$count);
            $startDay = $startDay->addDay();
        }
        return $weekly;
    }

    public function sample()
    {
        $list = ListPatients::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,dob,CURDATE())'),array(17,41))->get();
        foreach($list as $row){
            echo $row->id . '<br>';
        }
    }

    static function calculatePercentage($last,$now)
    {
        if($last == 0)
            return 0;

        $n = $now - $last;
        if($n==0)
            return 0;

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
