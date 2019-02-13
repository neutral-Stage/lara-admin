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
Route::middleware('auth:api')->get('/event', function (Request $request) {
    return $request->event();
});

Route::middleware('auth:api')->get('/problem', function (Request $request) {
    return $request->problem();
});




Route::apiResources([
    'user' => 'API\UserController'
]);


Route::apiResources([
    'event' => 'API\EventController'
]);

Route::apiResources([
    'problem' => 'API\ProblemController'
]);






Route::get('profile', 'API\UserController@profile');
Route::get('findUser', 'API\UserController@search');
Route::put('profile', 'API\UserController@updateProfile');