<?php
declare(strict_types=1);


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

//Map page complete
//1.	Type start and end location
//2.	Draw/link each points
//3.	Design stat layout
//a.	Cost
//b.	Weather
//c.	Time
//d.	Distance
//Dashboard complete
//1.	Layout with hardcoded values
//Homepage Design complete
//Route list page design complete
//Expenses list page



Route::get('/', function () {
    return view('welcome');
});

Route::get('map', [
    'as' => 'map.index',
    'uses' => 'App\Http\Controllers\MapController@index'
]);

Route::get('my-routs', [
    'as' => 'user.my_routs',
    'uses' => 'App\Http\Controllers\HomeController@myRouts'
]);

Route::get('my-rout', [
    'as' => 'user.view_rout',
    'uses' => 'App\Http\Controllers\HomeController@viewRout'
]);

Route::get('/layout', function () {
    return view('layout');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
