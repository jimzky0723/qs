<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login','LoginCtrl@index');
Route::post('login','LoginCtrl@validateLogin');
Route::get('/logout', function (){
    Session::flush();
    return redirect('login');
});


Route::get('register','LoginCtrl@register');
Route::post('register','LoginCtrl@registerSave');

Route::get('/','HomeCtrl@index')->middleware('access');


Route::get('number','NumberCtrl@index');
Route::post('number','NumberCtrl@saveNumber');
Route::post('number/get','NumberCtrl@get');


Route::get('patient/card','PatientCtrl@card')->middleware('page:card');
Route::get('patient/card/pending/list','PatientCtrl@getPendingInCard')->middleware('page:card');
Route::get('patient/card/{action}/{id}','PatientCtrl@cardProcess')->middleware('page:card');

Route::get('patient/vital','PatientCtrl@vital')->middleware('page:vital');
Route::get('patient/vital/{action}/{station}/{id}','PatientCtrl@vitalProcess')->middleware('page:vital');

Route::get('patient/consultation','PatientCtrl@consultation');
Route::get('patient/consultation/{section}','PatientCtrl@consultationSection');
Route::get('patient/consultation/done/{id}','PatientCtrl@consultationDone');
Route::get('patient/consultation/notify/{id}','PatientCtrl@consultationNotify');
Route::get('patient/consultation/cancel/{id}','PatientCtrl@consultationCancel');

Route::get('patient/list','PatientCtrl@patientList');
Route::post('patient/list','PatientCtrl@searchPatient');

Route::get('patient/count/vital/ob','PatientCtrl@getPendingListOB');
Route::get('patient/count/{step}','PatientCtrl@getPendingList');
Route::get('patient/count/{step}/{section}','PatientCtrl@getPendingList');



Route::get('patient/forward/{section}/{id}','PatientCtrl@forwardPatient');

Route::get('settings/user','AdminCtrl@users');
Route::post('settings/user','AdminCtrl@userSearch');
Route::post('settings/user/save','AdminCtrl@userSave');
Route::post('settings/user/update','AdminCtrl@userUpdate');
Route::get('settings/user/update/{id}','AdminCtrl@userInfo');
Route::get('settings/user/delete/{id}','AdminCtrl@userDelete');
Route::get('settings/user/get/{id}','AdminCtrl@userInfo');

Route::get('settings/access','AdminCtrl@access');
Route::post('settings/access','AdminCtrl@accessSearch');
Route::get('settings/access/get/{id}','AdminCtrl@getAccess');
Route::post('settings/access/update','AdminCtrl@accessUpdate');

Route::get('settings/parameters','AdminCtrl@parameters');
Route::get('settings/parameters/news/{id}','AdminCtrl@newsInfo');
Route::post('settings/parameters/url/update','AdminCtrl@urlUpdate');
Route::post('settings/news/save','AdminCtrl@saveNews');
Route::post('settings/news/update','AdminCtrl@updateNews');
Route::get('settings/news/delete/{id}','AdminCtrl@deleteNews');

Route::get('page/denied',function(){
    return view('page.denied');
});

Route::get('screen','HomeCtrl@screen');
Route::get('screen/card/pending/list','ScreenCtrl@getPendingInCard');
Route::get('screen/{screen}','ScreenCtrl@showScreen');
Route::get('sample',function(){
    $data = array(
        'fname' => 'Jimmy',
        'lname' => 'LOmocso'
    );
    $obj = (object)$data;
    echo $obj->fname;
});

Route::get('print','PrintCtrl@index');
Route::get('prints','PrintCtrl@prints');
Route::get('print/store/{number}/{section}/{priority}','PrintCtrl@store');
