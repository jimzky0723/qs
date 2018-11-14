<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\ConsoleMakeCommand;
use Illuminate\Support\Facades\Session;

class PrintCtrl extends Controller
{
    public function index()
    {
        return view('print');
    }

    public function store($number,$section)
    {
        Session::put('printNumber',$number);
        Session::put('printSection',$section);
//
//        $print = realpath('/xampp/htdocs/tdh/qs/public/print/print.bat');
//
//        shell_exec("$print");
//        echo 'ok to print';

        $gotIt = array();
        $file = realpath('/xampp/htdocs/tdh/qs/public/print/print.bat');
        exec( $file, $gotIt );
        echo implode("<br>",$gotIt);
    }
}
