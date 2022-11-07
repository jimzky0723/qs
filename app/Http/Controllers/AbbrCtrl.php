<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbbrCtrl extends Controller
{
    static function equiv($str)
    {
        switch($str){
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
            case 'bite2':
                return 'Animal Bite<br>Treatment Center';
            case 'card':
                return 'Card Issuance';
            case 'vital1':
                return 'Vital: Station 1';
            case 'vital2':
                return 'Vital: Station 2';
            case 'vital3':
                return 'Vital: Station 3';
            case 'vital':
                return 'Vital Signs';
            case 'registration':
                return 'Registration';
            case 'cashier':
                return 'Cashier';
            case 'msw':
                return 'MSW';
            default:
                return 'Error';
        }
    }

    static function step($step)
    {
        switch($step){
            case 0:
                return 'Registration';
            case 1:
                return 'Card Issuance';
            case 2:
                return 'Vital Signs';
            case 3:
                return 'Consultation';
            case 4:
                return 'Done';
            default:
                return 'Cancelled';
        }
    }
}
