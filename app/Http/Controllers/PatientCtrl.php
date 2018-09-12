<?php

namespace App\Http\Controllers;

use App\Card;
use App\Consultation;
use App\ListPatients;
use App\Number;
use App\Pending;
use App\Vital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('access');
    }

    public function card()
    {
        $list = ListPatients::where('step',0)
            ->where('fname','!=','')
            ->orderBy('priority','desc')
            ->limit(10)
            ->get();

        $current = Card::select('list.*')
            ->join('list','list.id','=','card.patientId')
            ->orderBy('card.id','desc')
            ->first();

        return view('page.card',[
            'data' => $list,
            'current' => $current
        ]);
    }

    public function cardProcess($action,$id)
    {
        if($action=='submit')
        {
            $checkCard = Card::first();
            if($checkCard)
            {
                return redirect()->back()->with('status','notAvailable');
            }

            ListPatients::where('id',$id)
                ->update([
                    'step' => 1,
                    'status' => 'ready'
                ]);

            Card::where('id','>',0)->delete();

            $c = new Card();
            $c->patientId = $id;
            $c->save();

            $patient = ListPatients::find($id);
            Number::where('section','card')
                    ->update([
                        'num'=> $patient->num,
                        'priority' => $patient->priority,
                        'patientId' => $id
                    ]);

            return redirect()->back()->with('status','added');
        }else if($action=='pending'){
            ListPatients::where('id',$id)
                ->update([
                    'status' => 'pending'
                ]);
            return redirect()->back()->with('status','pending');
        }else if($action=='done'){
            ListPatients::where('id',$id)
                ->update([
                    'step' => 2
                ]);
            Card::where('id','>',0)->delete();
            $v = new Vital();
            $v->patientId = $id;
            $v->station = 0;
            $v->save();

            Number::where('section','card')
                ->update([
                    'num'=> '',
                    'priority' => '',
                    'patientId' => ''
                ]);

            return redirect()->back()->with('status','ready');
        }else if($action=='cancel'){
            $patient = ListPatients::find($id);
            Card::where('id','>',0)->delete();
            $p = new Pending();
            $p->patientId = $id;
            $p->num = $patient->num;
            $p->step = $patient->step;
            $p->save();

            ListPatients::where('id',$id)
                ->update([
                    'step' => 99
                ]);
            Number::where('section','card')
                ->update([
                    'num'=> '',
                    'priority' => '',
                    'patientId' => ''
                ]);
            return redirect()->back()->with('status','ready');
        }

        return redirect()->back()->with('status','error');
    }

    public function vital()
    {
        return view('page.vital');
    }

    static function getVitalData($station)
    {
        $data = Vital::select('list.*')
            ->join('list','list.id','=','vital.patientId')
            ->where('vital.station',$station)
            ->orderBy('list.priority','desc')
            ->first();
        if($data)
        {
            return $data;
        }
        return false;
    }
    public function vitalProcess($action,$station,$id=0)
    {
        if($action=='next')
        {
            $next = Vital::select('vital.id','vital.patientId')
                ->join('list','list.id','=','vital.patientId')
                ->where('station',0);

            if($station==3){
                $next = $next->where('section','ob');
            }else{
                $next = $next->where('section','!=','ob');
            }

            $next = $next->orderBy('list.priority','desc')
                ->first();

            if($next)
            {
                Vital::find($next->id)
                    ->update([
                        'station' => $station
                    ]);

                $patient = ListPatients::find($next->patientId);

                Number::where('section','vital'.$station)
                    ->update([
                        'num'=> $patient->num,
                        'priority' => $patient->priority,
                        'patientId' => $next->patientId
                    ]);
            }


            return redirect()->back()->with('station',$station);
        }else if($action=='done'){
            Vital::where('station',$station)->delete();
            $data = ListPatients::find($id);

            ListPatients::find($id)
                ->update([
                    'step' => 3
                ]);
            $c = new Consultation();
            $c->patientId = $id;
            $c->section = $data->section;
            $c->save();

            Number::where('section','vital'.$station)
                ->update([
                    'num'=> '',
                    'priority' => '',
                    'patientId' => ''
                ]);

            return redirect()->back()->with('station',$station);
        }else if($action=='cancel'){
            Vital::where('station',$station)->delete();
            $data = ListPatients::find($id);

            $p = new Pending();
            $p->patientId = $id;
            $p->num = $data->num;
            $p->step = $data->step;
            $p->save();

            ListPatients::find($id)
                ->update([
                    'step' => 99
                ]);

            Number::where('section','vital'.$station)
                ->update([
                    'num'=> '',
                    'priority' => '',
                    'patientId' => ''
                ]);
            return redirect()->back()->with('station',$station);

        }else if($action=='notify'){
            return redirect()->back()->with('station',$station);
        }

        return redirect()->back()->with('status','error');
    }

    public function consultation()
    {
        return view('page.consultation');
    }

    static function getConsultationData($section)
    {
        $data = Consultation::select('list.*')
            ->join('list','list.id','=','consultation.patientId')
            ->where('consultation.section',$section)
            ->where('consultation.status',1)
            ->orderBy('consultation.id','asc')
            ->first();
        return $data;
    }

    static function getNumber($section)
    {
        $data = Number::where('section',$section)
                ->first();

        if($data->num > 0){
            return $data;
        }else{
            return false;
        }
    }

    public function consultationSection($section)
    {
        $next = Consultation::select('consultation.id','consultation.patientId')
            ->join('list','list.id','=','consultation.patientId')
            ->where('consultation.status',0)
            ->where('consultation.section',$section)
            ->orderBy('list.priority','desc')
            ->first();

        if($next)
        {
            Consultation::find($next->id)
                ->update([
                    'status' => 1
                ]);

            $patient = ListPatients::find($next->patientId);

            Number::where('section',$section)
                ->update([
                    'num'=> $patient->num,
                    'priority' => $patient->priority,
                    'patientId' => $next->patientId
                ]);
        }

        return redirect()->back()->with('section',$section);
    }

    public function consultationDone($id)
    {
        $section = Consultation::where('patientId',$id)->first()->section;
        Consultation::where('patientId',$id)->delete();

        ListPatients::find($id)
            ->update([
                'step' => 4
            ]);

        $patient = ListPatients::find($id);
        Number::where('section',$section)
            ->update([
                'num'=> '',
                'priority' => '',
                'patientId' => ''
            ]);
        return redirect()->back()->with('section',$section);
    }

    public function consultationCancel($id)
    {
        $section = Consultation::where('patientId',$id)->first()->section;
        Consultation::where('patientId',$id)->delete();
        $data = ListPatients::find($id);

        $p = new Pending();
        $p->patientId = $id;
        $p->num = $data->num;
        $p->step = $data->step;
        $p->save();

        ListPatients::find($id)
            ->update([
                'step' => 99
            ]);

        Number::where('section',$section)
            ->update([
                'num'=> '',
                'priority' => '',
                'patientId' => ''
            ]);
        return redirect()->back()->with('section',$section);
    }

    public function consultationNotify($id)
    {
        $section = Consultation::where('patientId',$id)->first()->section;
        return redirect()->back()->with('section',$section);
    }

    static function getPendingList($step,$section=null)
    {
        if($section){
            $data = array(
                'pedia' => ListPatients::where('step',3)->where('section','pedia')->count(),
                'im' => ListPatients::where('step',3)->where('section','im')->count(),
                'surgery' => ListPatients::where('step',3)->where('section','surgery')->count(),
                'ob' => ListPatients::where('step',3)->where('section','ob')->count(),
                'dental' => ListPatients::where('step',3)->where('section','dental')->count(),
                'bite'  => ListPatients::where('step',3)->where('section','bite')->count()
            );
            return $data;
        }
        $count = ListPatients::where('step',$step)
                ->count();
        $minus = Vital::where('station','!=',0)->count();
        $count -= $minus;
        return $count;
    }

    static function getPendingInCard()
    {
        $data = ListPatients::select('num','id')
                ->where('status','pending')
                ->limit(12)
                ->get();
        return $data;
    }

    public function patientPending()
    {
        $keyword = Session::get('pendingKeyword');
        $data = Pending::select('list.*','pending.id as pendingId','pending.step as currentStep')
                ->join('list','list.id','=','pending.patientId');
        if($keyword)
        {
            $data = $data->where(function($q) use ($keyword) {
                $q->where('fname','like',"%$keyword%")
                    ->orwhere('num','like',"%$keyword%")
                    ->orwhere('lname','like',"%$keyword%");
            });
        }
        $data = $data->orderBy('lname','asc')
            ->paginate(20);

        return view('patient.pending',[
            'title' => 'Patient Pending',
            'data' => $data
        ]);
    }

    public function patientList()
    {
        $date = date('m/d/Y');
        $keyword = Session::get('listKeyword');
        $data = ListPatients::select('*');
        if($keyword)
        {
            $keyword = (object)$keyword;
            $data = $data->where(function($q) use ($keyword) {
                $q->where('fname','like',"%$keyword->name%")
                    ->orwhere('num','like',"%$keyword->name%")
                    ->orwhere('lname','like',"%$keyword->name%");
            });
            $date = $keyword->dateCreated;
        }
        $date = date('Y-m-d',strtotime($date));
        $from = $date . ' 00:00:00';
        $to = $date . ' 23:59:59';
        $data = $data->whereBetween('created_at',[$from,$to])
            ->orderBy('id','desc')
            ->paginate(20);

        return view('patient.list',[
            'title' => 'Patient List',
            'data' => $data,
            'keyword' => $keyword
        ]);
    }

    public function searchPatient(Request $req)
    {
        $data = array(
            'name' => $req->keyword,
            'dateCreated' => $req->dateCreated
        );
        Session::put('listKeyword',$data);

        return self::patientList();
    }
}
