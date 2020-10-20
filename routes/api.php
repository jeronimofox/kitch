<?php

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

$list = ['Team', 'User'];
array_map(function ($entity) {
    $controllerName = "App\Http\Controllers\\" . $entity . "Controller";
    $routeParams = (new  $controllerName())->registerRoutes();
    Route::middleware('api')
        ->namespace($routeParams['ns'])
        ->name($routeParams['name'])
        ->prefix($routeParams['prefix'])
        ->group(function () use ($routeParams) {

            foreach ($routeParams['routes'] as $value) {
                Route::{$value['method']}($value['path'], $value['action'])->name($value['name']);
            }
        });
}, $list);
