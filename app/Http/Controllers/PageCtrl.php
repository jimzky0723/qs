<?php

namespace App\Http\Controllers;

use App\ListPatients;
use Illuminate\Http\Request;

class PageCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('access');
        $this->middleware('admin');
    }

    public function index(){
        return view('settings.page');
    }

    public function screen2(){
        return view('screen.screen2');
    }

    public function getNumber(){
        $lastnumber = '--';
        $last = ListPatients::orderBy('id','desc')
            ->first();
        if($last){
            $letter = NumberCtrl::initialSection($last->section);
            $lastnumber = $letter.$last->num;
        }

        $sectionNumber = array(
            'pedia' => NumberCtrl::initialSection('pedia').NumberCtrl::getLastNumber('pedia'),
            'surgery' => NumberCtrl::initialSection('surgery').NumberCtrl::getLastNumber('surgery'),
            'im' => NumberCtrl::initialSection('im').NumberCtrl::getLastNumber('im'),
            'ob' => NumberCtrl::initialSection('ob').NumberCtrl::getLastNumber('ob'),
            'bite' => NumberCtrl::initialSection('bite').NumberCtrl::getLastNumber('bite'),
            'dental' => NumberCtrl::initialSection('dental').NumberCtrl::getLastNumber('dental')
        );

        return view('screen.number',compact('lastnumber','sectionNumber'));
    }
}
