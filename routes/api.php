<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('filter', 'API\MemberController@filter');
Route::get('mtaa', 'API\MemberController@mtaa');
Route::get('jumuiya', 'API\MemberController@jumuiya');
Route::post( 'family_member_search', 'API\MemberController@family_member_search');
Route::post( 'members_search_data', 'API\MemberController@members_search_data');
Route::post( 'kigango_search', 'API\MemberController@kigango_search');




// SEARCH 
Route::post('kigango_member', 'API\MemberController@kigango_search');
Route::post('get_mitaa', 'API\ChurchUnitController@get_mitaa');
Route::post('get_jumuiya', 'API\ChurchUnitController@get_jumuiya');

Route::post('jumuiya_insert', 'API\ChurchUnitController@insertData');

Route::get('jumuiya_retreive', 'API\ChurchUnitController@getJumuiya');
Route::delete('jumuiya_delete/{id}', 'API\ChurchUnitController@destroy');
Route::get('jumuiya_show/{id}', 'API\ChurchUnitController@show');
Route::put('jumuiya_update', 'API\ChurchUnitController@update');  
Route::post('jumuiya_search', 'API\ChurchUnitController@search_jumuiya');

// family API 

Route::get('family_retreive', 'API\ChurchUnitFamily@getFamily');
Route::post('family_insert', 'API\ChurchUnitFamily@insertData');
Route::delete('family_delete/{id}', 'API\ChurchUnitFamily@destroy');
Route::get('family_show/{id}', 'API\ChurchUnitFamily@show');
Route::put('family_update', 'API\ChurchUnitFamily@update');



Route::post('arrange', 'API\ChurchUnitFamily@arrangevigango');
Route::post('family_search', 'API\ChurchUnitFamily@search_family');

// member API
Route::post('waumini_search', 'API\WauminiController@search');
Route::resource('waumini', 'API\WauminiController');

// kigango API
Route::resource('vigango', 'API\churchUnitVigango');


Route::get('parokia', 'API\churchUnitVigango@getparokia');
Route::put('kigango_update', 'API\churchUnitVigango@update_kigango');

//MITAA API
Route::resource('mitaa', 'API\churchUnitMitaa'); 
Route::get('mitaa_vigango', 'API\churchUnitMitaa@get_vigango');
Route::put('mtaa_update', 'API\churchUnitMitaa@update_mtaa');

// member API
Route::resource('members', 'API\churchUnitallMember'); 
Route::post('more', 'API\churchUnitallMember@more'); 
Route::put('status', 'API\churchUnitallMember@status');
Route::put( 'update_member', 'API\churchUnitallMember@update_member');
Route::post( 'byfamily', 'API\churchUnitallMember@byfamily');


//donation
Route::resource('donations', 'API\ManageDonationController');
Route::put( 'update_donations', 'API\ManageDonationController@update_donations');

// member donation
Route::get('get_selection', 'API\MemberDonationController@select');
Route::resource('member_donation', 'API\MemberDonationController');
Route::post( 'search_member', 'API\MemberDonationController@search_member');
Route::post( 'memberList', 'API\MemberDonationController@memberList');



// family donation
Route::get('get_selection_family', 'API\FamilyDonationController@select');
Route::resource('family_donation', 'API\FamilyDonationController');
Route::post( 'search_family', 'API\FamilyDonationController@search_family');
Route::post('familyList', 'API\FamilyDonationController@memberList');


// JUMUIYA DONATION
Route::get('get_selection_jumuiya', 'API\jumuiyaDonationController@select');
Route::resource('jumuiya_donation', 'API\jumuiyaDonationController');
Route::post('search_jumuiya', 'API\jumuiyaDonationController@search_jumuiya');
Route::post('jumuiyaList', 'API\jumuiyaDonationController@memberList');

// mtaa donation
Route::get('get_selection_mtaa', 'API\mtaaDonationController@select');
Route::resource('mtaa_donation', 'API\mtaaDonationController');
Route::post('search_mtaa', 'API\mtaaDonationController@search_mtaa');
Route::post('mtaaList', 'API\mtaaDonationController@memberList');



// kigango donation
Route::get('get_selection_kigango', 'API\kigangoDonationController@select');
Route::resource('kigango_donation', 'API\kigangoDonationController');
Route::post('search_kigango', 'API\kigangoDonationController@search_mtaa');
Route::post('kigangoList', 'API\kigangoDonationController@memberList');



// Report donation

Route::post('donations_report', 'API\ReportDonationController@donations');
Route::post('donation_report', 'API\ReportDonationController@donationList');


// matoleo
Route::resource('Matoleo_lib', 'API\MatoleoLibraryController');
Route::put('Matoleo_lib_update', 'API\MatoleoLibraryController@matoleo_update');
Route::put( 'Sadaka_v_update', 'API\specificMatoleoController@Sadaka_v_update');


// matoleo_specific
Route::resource('matoleo_data', 'API\specificMatoleoController');

Route::post('matoleo_data_search', 'API\specificMatoleoController@search_member');
Route::post( 'visonzo', 'API\specificMatoleoController@visonzo');
Route::post( 'view_bahasha', 'API\specificMatoleoController@view_bahasha');
Route::post( 'view_visonzo', 'API\specificMatoleoController@view_visonzo');
Route::post( 'saveHarambee', 'API\specificMatoleoController@saveHarambee');
Route::post( 'view_harambee', 'API\specificMatoleoController@view_harambee');
Route::post( 'search_members_jumuiya', 'API\MemberReportController@search_members');
Route::post( 'search_family_members', 'API\MemberReportController@search_family_members');
Route::post( 'get_jumuiya_spec', 'API\MemberReportController@get_jumuiya');
Route::post( 'matoleo_data_bahasha', 'API\specificMatoleoController@matoleo_data_bahasha');


// contact
Route::resource('contacts', 'API\ContactController');
Route::post('mtaa_jumuiyas', 'API\ContactController@get_jumuiya'); 



// get current user Login Info

Route::get('login_info', 'API\AuthController@get_current_user');

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('login_info', 'API\AuthController@get_current_user');
// });


Route::middleware('auth:api')->get('/login_info', function (Request $request) {
    return $request->user();
});