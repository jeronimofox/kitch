<?php

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
})->name('welcome');
Route::get('/teams', "App\Http\Controllers\TeamController@index")->name('team.list');
Route::get('/users', "App\Http\Controllers\UsersController@index")->name('team.list');
Route::get('/teams/{team}', "App\Http\Controllers\TeamController@show")->name('team.show');
Route::get('/users/{user}', "App\Http\Controllers\UserController@show")->name('user.show');
