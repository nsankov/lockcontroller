<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'v1',
    'as' => 'api.',
    'namespace' => 'Api\V1',
], function () {
    Route::get('locks', 'LockController@index');
    Route::get('locks/{lock:id}', 'LockController@show');
    Route::post('locks/{lock:id}', 'LockController@store');
    Route::put('locks/{lock:id}', 'LockController@update');
    Route::delete('locks/{lock:id}', 'LockController@destroy');
});
