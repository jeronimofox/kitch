<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Comment\Doc;
use ReflectionException;
use ReflectionMethod;

class ApiController extends Controller
{
    public $model;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $name = "\App\Models\\" . \Str::between(class_basename($this), 'Controllers\\', 'Controller');
        $this->model = new $name();
    }

    /**
     * ->GET /;
     * @return Collection|Model[]
     */
    public function index()
    {
        return $this->model->all();
    }

    /**
     * ->GET /{model};
     * @param $model
     * @param Request $request
     * @return Model
     */
    public function show($model, Request $request)
    {
        return (!empty($request->get('with'))
            ? $this->model->find($model)->load($request->get('with'))
            : $this->model->find($model));
    }

    /**
     * ->PUT /{model};
     * @param $model
     * @param Request $request
     * @return bool
     */
    public function update($model, Request $request)
    {
        //todo validate
        return $this->model->find($model)->update($request->all());
    }

    /**
     * ->POST /;
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        //todo validate
        return $this->model->create($request->all());
    }

    /**
     * ->POST /delete/{model};
     * @param Model $model
     * @return bool|null
     */
    public function destroy(Model $model)
    {
        return $model->forceDelete();
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function registerRoutes()
    {
        $methods = get_class_methods($this);

        $entityName = Str::lower(\Str::between(class_basename($this), 'Controllers\\', 'Controller'));
        $namespace = "\App\Http\Controllers\\";
        $className = Str::after(class_basename($this), 'Controllers\\');
        $groupName = Str::plural($entityName);
        $routes = [];
        foreach ($methods as $method) {
            $doc = new Doc(new ReflectionMethod($this, $method));
            $text = $doc->getText();
            if (!Str::contains($text, '->')) {
                continue;
            }
            $routeString = Str::between($text, '->', ';');
            $routeParams = explode(' ', Str::between($text, '->', ';'));
            $routeMethodIndex = array_search(['GET', 'POST', 'DELETE', 'PUT'], $routeParams);
            $routeMethod = $routeParams[$routeMethodIndex];
            $routePath = Str::after($routeString, $routeMethod . ' ') == '/'
                ? ""
                : Str::after($routeString, $routeMethod . ' ');
            $params = [
                'method' => $routeMethod,
                'path' => $routePath,
                'action' => "{$className}@{$method}",
                'name' => $method];
            $routes[] = $params;
        }
        return ["ns" => $namespace, 'name' => $groupName . '.', 'prefix' => $groupName . '/', 'routes' => $routes];
    }
}
