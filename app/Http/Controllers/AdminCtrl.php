<?php

namespace App\Http\Controllers;

use App\Access;
use App\News;
use App\Parameters;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('access');
        $this->middleware('admin');
    }

    public function users($info = array())
    {
        $user = Session::get('auth');
        $currentUser = $user->id;
        $keyword = Session::get('userKeyword');

        $data = User::select('*')->where('id','!=',$currentUser);
        if($keyword)
        {
            $data = $data->where(function($q) use ($keyword) {
                $q->where('username','like',"%$keyword%")
                    ->orwhere('fname','like',"%$keyword%")
                    ->orwhere('lname','like',"%$keyword%")
                    ->orwhere('profession','like',"%$keyword%")
                    ->orwhere('access','like',"%$keyword%");
            });
        }
        $data = $data->orderBy('status','asc')
                    ->orderBy('fname','asc')
                    ->paginate(20);
        return view('settings.users',[
            'data' => $data,
            'info' => $info
        ]);
    }

    public function userSave(Request $req)
    {
        $username = $req->username;
        $check = User::where('username',$username)->first();
        if($check)
        {
            return redirect()->back()->with('status','duplicate');
        }

        $u = new User();
        $u->profession = $req->profession;
        $u->fname = $req->fname;
        $u->lname = $req->lname;
        $u->access = $req->access;
        $u->username = $req->username;
        $u->password = bcrypt($req->password);
        $u->status = $req->status;
        $u->save();

        return redirect()->back()->with('status','save');
    }

    public function userSearch(Request $req)
    {
        $keyword = $req->keyword;
        Session::put('userKeyword',$keyword);
        return self::users();
    }

    public function userInfo($id)
    {
        Session::put('userDeleteId',$id);
        $info = User::find($id);
        return self::users($info);
    }

    public function userDelete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('status','deleted');
    }

    public function userUpdate(Request $req)
    {
        $data = array(
            'profession' => $req->profession,
            'fname' => $req->fname,
            'lname' => $req->lname,
            'username' => $req->username,
            'access' => $req->access,
            'status' => $req->status
        );

        if($req->password!='')
        {
            $data['password'] = bcrypt($req->password);
        }

        User::where('id',$req->currentId)
            ->update($data);
        return redirect()->back()->with('status','updated');
    }

    public function validatePassword($id,$password)
    {
        $user = User::find($id);
        if(Hash::check($password,$user->password))
        {
            return true;
        }
        return false;
    }

    public function access()
    {
        $keyword = Session::get('accessKeyword');
        $data = User::select('*');
        if($keyword)
        {
            $data = $data->where(function($q) use ($keyword) {
                $q->where('username','like',"%$keyword%")
                    ->orwhere('fname','like',"%$keyword%")
                    ->orwhere('lname','like',"%$keyword%")
                    ->orwhere('profession','like',"%$keyword%")
                    ->orwhere('access','like',"%$keyword%");
            });
        }
        $data = $data->orderBy('lname','asc')
                ->where('access','standard')
                ->paginate(20);
        return view('settings.access',[
            'data' => $data
        ]);
    }

    public function accessSearch(Request $req)
    {
        $keyword = $req->keyword;
        Session::put('accessKeyword',$keyword);
        return self::access();
    }

    static function getAccess($id)
    {
        $access = Access::where('userId',$id)->first();
        if(!$access)
        {
            $tbl = new Access();
            $tbl->userId = $id;
            $tbl->save();
            $access = Access::where('userId',$id)->first();
        }
        return $access;
    }

    public function accessUpdate(Request $req)
    {
        $data = array();
        $section = array(
            'registration',
            'card',
            'vital',
            'pedia',
            'im',
            'surgery',
            'ob',
            'dental',
            'bite'
        );
        foreach($section as $row)
        {
            if($req->$row)
            {
                $data[$row] = 1;
            }else{
                $data[$row] = 0;
            }
        }

        $newAccess = Access::updateOrCreate(['userId' => $req->userId],$data);
        if($newAccess->wasRecentlyCreated){
            return redirect()->back()->with('status','created');
        }else{
            return redirect()->back()->with('status','updated');
        }

    }

    public function parameters($info=array())
    {
        $data = News::orderBy('created_at','desc')
                ->paginate(10);
        $url = Parameters::where('description','socket')
                ->first()
                ->value;

        return view('settings.parameters',[
            'data' => $data,
            'info' => $info,
            'url' => $url
        ]);
    }

    public function urlUpdate(Request $req)
    {
        Parameters::where('description','socket')
            ->update([
                'value' => $req->url
            ]);
        Session::put('socket',$req->url);
        return redirect()->back()->with('status','urlUpdated');
    }

    public function saveNews(Request $req)
    {
        $content = $req->description;
        $tbl = new News();
        $tbl->content = $content;
        $tbl->save();
        return redirect()->back()->with('status','saved');
    }

    public function newsInfo($id)
    {
        $info = News::find($id);
        return self::parameters($info);
    }

    public function updateNews(Request $req)
    {
        News::where('id',$req->currentId)
            ->update([
                'content' => $req->description
            ]);
        return redirect()->back()->with('status','updated');
    }

    public function deleteNews($id)
    {
        News::where('id',$id)
            ->delete();
        return redirect()->back()->with('status','deleted');
    }
}
