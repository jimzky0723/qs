<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\ListPatients;
use Illuminate\Http\Request;

class NumberCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('access');
    }

    public function index()
    {
        return view('page.number',[
            'lastNumber' => self::getLastNumber()
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

    public function getLastNumber()
    {
        $dateNow = date('mdY');
        $last = ListPatients::orderBy('id','desc')->first();
        if(!$last)
        {
            return 1;
        }
        $dateF = date('mdY',strtotime($last->created_at));
        if($dateNow===$dateF)
        {
            return $last->num + 1;
        }else{
            return 1;
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
        $tbl->num = $req->number;
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
        }

        return redirect()->back()->with('status','added');
    }
}
