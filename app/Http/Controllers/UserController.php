<?php

namespace App\Http\Controllers;

use App\Http\Livewire\TeamShow;
use App\Http\Livewire\Users\ListUsers;
use App\Http\Livewire\Users\Show;
use Illuminate\Database\Eloquent\Model;

class UserController extends WebController
{
    public function index()
    {
        return (new ListUsers())->renderToView();
    }

    /**
     * @param $model
     * @return TeamShow|Model
     */
    public function show($model)
    {
        return (new Show($model))->renderToView();
    }
}
