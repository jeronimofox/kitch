<?php

namespace App\Domain\Users\Controllers;

use App\Domain\WebController;
use App\Http\Livewire\TeamShow;
use App\Http\Livewire\Users\ListUsers;
use App\Http\Livewire\Users\Show;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserController extends WebController
{
    public static string $className = "User";

    public static string $ns = "App\Domain\Users\Controllers";


    /**
     * ->GET /;
     * @return Application|Factory|View|Collection|Model[]|mixed|string
     */
    public function index()
    {
        return (new ListUsers())->renderToView();
    }

    /**
     * ->GET /{model};
     * @param $model
     * @return TeamShow|Model
     */
    public function show($model)
    {
        return (new Show($model))->renderToView();
    }
}
