<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::resource('leagues', 'LeagueController');
Route::post('/seasons/set-active', 'SeasonController@setActive')->name('seasons.set-active');
Route::resource('seasons', 'SeasonController');
Route::resource('teams', 'TeamController');
Route::resource('matches', 'MatchController');
Route::resource('fixtures', 'FixtureController');

Route::get('/plays', 'PlayController@index')->name('plays.index');
Route::post('/plays/play-all', 'PlayController@playAll')->name('plays.play-all');
Route::post('/plays/play-one', 'PlayController@playOne')->name('plays.play-one');








Route::group(['middleware' => 'auth'], function () {

});
