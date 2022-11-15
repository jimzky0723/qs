<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\ListPatients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NumberCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('access');
    }

    public function index()
    {
        $lastnumber = '--';
        $last = ListPatients::orderBy('id','desc')
                    ->first();
        if($last){
            $letter = self::initialSection($last->section);
            $lastnumber = $letter.$last->num;
        }

        $sectionNumber = array(
            'pedia' => self::initialSection('pedia').self::getLastNumber('pedia'),
            'surgery' => self::initialSection('surgery').self::getLastNumber('surgery'),
            'im' => self::initialSection('im').self::getLastNumber('im'),
            'ob' => self::initialSection('ob').self::getLastNumber('ob'),
            'bite' => self::initialSection('bite').self::getLastNumber('bite'),
            'dental' => self::initialSection('dental').self::getLastNumber('dental'),
            'cashier' => self::initialSection('cashier').self::getLastNumber('cashier'),
            'msw' => self::initialSection('msw').self::getLastNumber('msw'),
        );
        return view('page.number',[
            'lastNumber' => $lastnumber,
            'sectionNumber' => $sectionNumber
        ]);
    }

    public function get(Request $req)
    {
        $section = $req->section;
        $priority = $req->priority;
        $num = self::getLastNumber();

        $tbl = new ListPatients();
        $tbl->num = 0;
        $tbl->section = $section;
        $tbl->priority = $priority;
        $tbl->step = 0;
        $tbl->status = 'ready';
        $tbl->save();



        ListPatients::where('id',$tbl->id)
            ->update([
                'num' => $num
            ]);
        $data = array(
            'id' => $tbl->id,
            'num' => $num
        );
        return $data;
    }

    public function next()
    {
        return view('next');
    }

    static function getLastNumber($section=null)
    {
//        $dateNow = date('mdY');
//        $last = ListPatients::where('section',$section)
//                    ->orderBy('id','desc')->first();
//        if(!$last)
//        {
//            return 1;
//        }
//        $dateF = date('mdY',strtotime($last->created_at));
//        if($dateNow===$dateF)
//        {
//            return $last->num + 1;
//        }else{
//            return 1;
//        }
        $start = Carbon::today()->startOfDay();
        $end = Carbon::today()->endOfDay();

        if($section=='cashier'){
            $last = ListPatients::whereBetween('created_at',[$start,$end])
                ->where('section','cashier')
                ->orderBy('id','desc')->first();
        }else if($section=='msw'){
            $last = ListPatients::whereBetween('created_at',[$start,$end])
                ->where('section','msw')
                ->orderBy('id','desc')->first();
        }else{
            $last = ListPatients::whereBetween('created_at',[$start,$end])
                ->where('section','<>','cashier')
                ->where('section','<>','msw')
                ->orderBy('id','desc')->first();
        }
        if(!$last){
            return 1;
        }else{
            return $last->num + 1;
        }
    }

    public function saveNumber(Request $req)
    {
        $step = 0;
        if($req->section=='bite')
        {
            $step = 3;
        }
        $tbl = new ListPatients();
        $tbl->fname = $req->fname;
        $tbl->lname = $req->lname;
        $tbl->dob = $req->dob;
        $tbl->hospitalNum = (isset($req->hospitalNum)) ? $req->hospitalNum : '';
        $tbl->num = self::getLastNumber($req->section);
        $tbl->section = $req->section;
        $tbl->priority = $req->priority;
        $tbl->step = $step;
        $tbl->status = 'ready';
        $tbl->save();

        if($req->section=='bite')
        {
            $c = new Consultation();
            $c->patientId = $tbl->id;
            $c->section = 'bite';
            $c->status = 0;
            $c->save();
        }else if($req->section=='cashier' || $req->section=='msw'){
            $c = new Consultation();
            $c->patientId = $tbl->id;
            $c->section = $req->section;
            $c->status = 0;
            $c->save();

            return redirect()->back()->with('status','addToSpecial')->with('section',self::fullNameSection($req->section));
        }

        return redirect()->back()->with('status','added');
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
            case 'cashier':
                return 'C';
            case 'msw':
                return 'M';
            default:
                return false;
        }
    }

    static function fullNameSection($section)
    {
        switch ($section){
            case 'pedia':
                return 'Pedia';
            case 'im':
                return 'Internal Medicine';
            case 'surgery':
                return 'Surgery';
            case 'ob':
                return 'OB';
            case 'dental':
                return 'Dental';
            case 'bite':
                return 'Animal Bite';
            case 'cashier':
                return 'Cashier';
            case 'msw':
                return 'MSW';
            default:
                return false;
        }
    }
}
