<?php

namespace App\Http\Controllers;

use App\Access;
use App\Parameters;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function validateLogin(Request $req)
    {
        $login = User::where('username',$req->username)
            ->first();
        if($login){
            if($login->status==0){
                return redirect()->back()->with('status','inactive');
            }else{
                if(Hash::check($req->password,$login->password))
                {
                    if($login->access=='admin')
                    {
                        $access = array(
                            'registration' => 1,
                            'card' => 1,
                            'vital' => 1,
                            'pedia' => 1,
                            'im' => 1,
                            'surgery' => 1,
                            'ob' => 1,
                            'dental' => 1,
                            'bite' => 1,
                            'cashier' => 1,
                            'msw' => 1
                        );
                        Session::put('access',(object)$access);
                    }else{
                        Session::put('access',Access::where('userId',$login->id)->first());
                    }

                    Session::put('auth',$login);
                    Session::put('socket',Parameters::where('description','socket')->first()->value);
                    return redirect('/');
                }
                else
                {
                    return redirect()->back()->with('status','error');
                }
            }
        }else{
            return redirect()->back()->with('status','error');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $req)
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
        $u->access = 'standard';
        $u->username = $req->username;
        $u->password = bcrypt($req->password);
        $u->status = 0;
        $u->save();

        return redirect()->back()->with('status','save');
    }

}
