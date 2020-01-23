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

// Route::get('/', function () {
//     return view('user.layouts.home');
// });
    Route::get('/','UserController@index')->name('user.index');
    Route::get('abouts','UserController@about')->name('abouts.index');
    Route::get('navcaus','UserController@navcauses')->name('navcaus.index');
    Route::get('causesgallary','UserController@causesgallary')->name('causesgallary.index');
    Route::get('running','UserController@running')->name('running.index');
    Route::get('upcoming','UserController@upcoming')->name('upcomingevents.index');
    Route::get('studentblog','UserController@studentblog')->name('studentblog.index');
    Route::get('userblogs','UserController@userblog')->name('userblogs.index');
    Route::get('contact','UserController@contact')->name('contact.index');
    Route::get('doner','UserController@doner')->name('doner.index');
    Route::post('reply','Admin\ReplyController@store')->name('reply.store');
Route::group(['middleware'=>'student'], function (){
    Route::post('donate','Admin\DonateController@store')->name('donte.store');
    // Route::get('donate','Admin\DonateController@index')->name('donte.index');   
});
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard.index');
    Route::resource('slider','SliderController');
    Route::resource('charity','CharityController');
    Route::resource('causes','CausesController');
    Route::resource('volunteer','VolunteerController');
    Route::resource('events','EventsController');
    Route::resource('story','StoryController');
    Route::resource('allheading','AllHeadingController');
    Route::resource('about','AboutController');
    Route::resource('navcauses','NavCausesController');
    Route::resource('causespost','CausesPostController');  
    Route::resource('runevents','RunningEventsController');
    Route::resource('upcoming','UpcomingEventsController');
    Route::resource('upcomingcontent','UpcomingContentController');
    Route::resource('subscribe','SubscribeController');
    Route::get('donate','DonateController@index')->name('donte.index');
    Route::get('reply','ReplyController@index')->name('reply.index');   
    Route::resource('footer','FooterController');
    Route::resource('userblog','UserBlogController');
    Route::resource('gallery','GalleryController');
    Route::get('usershow','UsershowController@index')->name('usershow.index');
});

