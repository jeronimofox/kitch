<?php

use Illuminate\Support\Facades\Route;

$list = ['Team', 'User', 'Idea', 'Project', 'Product'];


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
