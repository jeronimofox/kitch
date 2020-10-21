<?php

namespace App\Domain\Teams\Controllers;

use App\Domain\WebController;
use App\Http\Livewire\ListTeams;
use App\Http\Livewire\TeamShow;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TeamController extends WebController
{

    public static string $className = "Team";
    public static string $ns = "App\Domain\Teams\Controllers";


    /**
     * ->GET /;
     * @return Application|Factory|View|Collection|Model[]|mixed|string
     */
    public function index()
    {
        return (new ListTeams())->renderToView();
    }

    /**
     * ->GET /{model};
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
