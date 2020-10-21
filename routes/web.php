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
$list = ['Team', 'User'];
array_map(function ($entity) {

    $controllerName = "App\Domain\\" . Str::plural($entity) . "\Controllers\\" . $entity . "Controller";
    $routeParams = (new  $controllerName())->registerRoutes();

    Route::middleware('web')
        ->namespace($routeParams['ns'])
        ->name($routeParams['name'])
        ->prefix($routeParams['prefix'])
        ->group(function () use ($routeParams) {
            foreach ($routeParams['routes'] as $value) {
                Route::{$value['method']}($value['path'], $value['action'])->name($value['name']);
            }
        });
}, $list);

Route::get('/auth', function () {
    return view('livewire.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('livewire.auth.register');
})->name('register');

Route::get('/profile', function () {
    return view('livewire.profile.show');
})->name('profile.show');

Route::get('/exit', function () {
    return view('welcome');
})->name("profile.exit");


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//Route::get('/teams', "App\Http\Controllers\TeamController@index")->name('team.list');
//Route::get('/users', "App\Http\Controllers\UsersController@index")->name('team.list');
//Route::get('/teams/{team}', "App\Http\Controllers\TeamController@show")->name('team.show');
//Route::get('/users/{user}', "App\Http\Controllers\UserController@show")->name('user.show');
