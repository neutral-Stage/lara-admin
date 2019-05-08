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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('{path}', "HomeController@index")->where('path', '([A-z\d-\/_.]+)?');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/event/all', 'EventViewerController@index')->name('admin.events');
    Route::get('/event/{id}', 'EventViewerController@detail')->name('admin.event');
    Route::get('/reaction/event{event_id}/problem{problem_id}', 'ReactionController@create')->name('reaction');
    Route::get('/reaction/iwannahelp', 'ReactionController@iwannahelp')->name('admin.reaction.help');
    Route::get('/reaction/people-who-will-help', 'ReactionController@gethelp')->name('admin.reaction.gethelp');
});
