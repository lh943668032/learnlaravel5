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

use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('test','HomeController@test1');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@index');

Route::get('now', function () {
    return date("Y-m-d H:i:s");
});

//Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin',], function() {
//    Route::get('/', 'HomeController@index');
////    Route::get('articles', 'ArticleController@index');
//    Route::post('article/update', 'ArticleController@update');
//    Route::resource('articles', 'ArticleController');
//});

//Route::get('article/{id}', 'ArticleController@show');
//
//Route::post('comment', 'CommentController@store');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin',], function() {
    Route::get('/', 'HomeController@index');
    Route::post('system/update', 'SystemUpgradeController@update');
    Route::resource('systems', 'SystemUpgradeController');
    Route::get('system/getversions','SystemUpgradeController@getVersions');
    Route::post('system/getversions','SystemUpgradeController@getVersions');
});


