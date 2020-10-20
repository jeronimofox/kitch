<?php

namespace App\Http\Controllers;

use App\Http\Livewire\ListTeams;
use App\Http\Livewire\TeamShow;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

class TeamController extends WebController
{
    public function index()
    {
        return (new ListTeams())->renderToView();
    }

    /**
     * @param $model
     * @return TeamShow|Model
     */
    public function show($model)
    {
        return (new TeamShow($model))->renderToView();
    }

    /**
     * @param $model
     * @return TeamShow|Model
     */
    public function showWithTeams($model)
    {
        return (new TeamShow($model))->renderToView();
    }
}
