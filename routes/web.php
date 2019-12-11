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

Route::get('/', function () {
    return view('welcome');
});
/*search*/
/*Route::any('/search',function (){
    $q = Input::get('q');

    $member =Member::where

});*/


Route::any('/Member-search', 'MemberDonationController@search');
Route::any('/Family-search', 'FamiliaDonationController@search');
Route::any('/Jumuiya-search', 'JumuiyaDonationController@search');
Route::any('/Vigango-search', 'KigangoDonationController@search');
Route::any('/Street-search', 'MtaaDonationController@search');

// donations report
Route::any('/Report-Donations', 'Donation_reportController@search');
Route::any('/Full-Report', 'Donation_reportController@search_full');

// matoleo report

    Route::resource('/Matoleo_add', 'MatoleoMemberController');
    Route::any('/matoleo_search', 'ReportMatoleoController@search');
    Route::any('/pdfgenerate', 'ReportMatoleoController@pdfgenerate');

//matoleo+member
Route::any('/Member-search', 'MatoleoMemberController@search');
Route::resource('/matoleo_report', 'ReportMatoleoController');

Route::get('/Donation_Report/{id}', 'Donation_reportController@full_report')->name('report');
Route::get('/report/download/{id}', 'Donation_reportController@downloadpdf')->name('reportpdf');
// member report

Route::get('/member_report','Report_memberController@memberReport');


/*End search*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Member', 'HomeController@add_new_member')->name('member_add');

Route::Resource('/Parokia', 'ParokiaController');
Route::Resource('/Vigango', 'KigangoController');
Route::Resource('/Mitaa', 'MtaaController');
Route::Resource('/Jumuiya', 'JumuiyaController');

Route::Resource('/Family', 'FamiliaController');
Route::Resource('/Member', 'MemberController');
Route::any('/get_family', 'MemberController@search');
Route::Resource('/Donation', 'DonationController');
Route::Resource('/User', 'UserController');



/*groups donations*/
Route::Resource('/Member-Donation', 'MemberDonationController');
Route::Resource('/Family-Donation', 'FamiliaDonationController');
Route::Resource('/Jumuiya-Donation', 'JumuiyaDonationController');
Route::Resource('/Kigango-Donation', 'KigangoDonationController');
Route::Resource('/Street-Donation', 'MtaaDonationController');

// matoleo
Route::Resource('/matoleo','MatoleoController');
Route::get('/other_matoleo/{id}', 'MatoleoController@otherpage');
Route::get('/main_matoleo/{id}','MatoleoController@mainpage');




Route::Resource('/other', 'OtherController');
Route::Resource('/wageni', 'GeneralController');



/* Reports*/

Route::get('/Donations_report','Donation_reportController@report');

// navigation contacts
Route::get('/contact', 'NavigationController@contact');
Route::get( '/add_contact', 'NavigationController@add_contact');