<?php

namespace App\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Comment\Doc;
use ReflectionException;
use ReflectionMethod;

/**
 * @property string className
 */
class WebController extends Controller
{
    public static string $className;

    public Model $model;

    public static function getClassName()
    {
        static::$className = Str::after(class_basename(static::class), 'Controllers\\');
    }

    public function getClassNameAttribute()
    {
        return static::getClassName();
    }

    public static function getNs()
    {
        return static::$ns = static::$ns ?? "App\Domains\\" . static::$className . "\Controllers\\";
    }

    public static function getNsAttribute()
    {
        return static::getNs();
    }

    public function __construct()
    {
        $name = "App\Models\\" . \Str::between(class_basename($this), 'Controllers\\', 'Controller');
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
     * @return Model
     */
    public function show($model)
    {
        return $model;
    }

    /**
     * ->POST /{model};
     * @param Model $model
     * @param Request $request
     * @return bool
     */
    public function update(Model $model, Request $request)
    {
        return $model->update($request->all());
    }

    /**
     * ->DELETE /{model};
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
        //getting all methods
        $routes = $this->getRoutes();

        $entityName = Str::lower(\Str::between(class_basename(static::class), 'Controllers\\', 'Controller'));
        $groupName = Str::plural($entityName) . '.';
        $prefix = Str::plural($entityName) . '/';
        return [
            "ns" => static::$ns,
            'name' => $groupName,
            'prefix' => $prefix,
            'routes' => $routes
        ];
    }

    /**
     * Parses method and search for route param
     * @param string $method
     * @param string $routeSign
     * @return bool|string
     * @throws ReflectionException
     * @ignore
     */
    public function getRouteParametersStringFromDocBlock(string $method, $routeSign = '->')
    {
        $doc = new Doc(new ReflectionMethod(static::class, $method));
        $text = $doc->getText();
        if (Str::contains($text, "@ignore")) {
            return false;
        }
        return Str::contains($text, $routeSign) ? Str::between($text, '->', ';') : false;
    }

    /**
     * @param string $routeString
     * @param string $method
     * @return array
     * @ignore
     */
    public function getRouteParametersArrayFromParsedString(string $routeString, string $method)
    {
        $routeParams = explode(' ', $routeString);

        $routeMethod = $routeParams[array_search(['GET', 'POST', 'DELETE', 'UPDATE'], $routeParams)];

        $routePath = Str::after($routeString, $routeMethod . ' ') == '/'
            ? " "
            : Str::after($routeString, $routeMethod . ' ');

        return [
            'method' => $routeMethod,
            'path' => $routePath,
            'action' => static::$className . "Controller@" . $method,
            'name' => $method
        ];
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function getRoutes()
    {
        foreach (get_class_methods($this) as $method) {
            //searching for a Route Docstring params and skipping methods without it
            $routeString = $this->getRouteParametersStringFromDocBlock($method);
            if (!$routeString) {
                continue;
            }
            //getting full route parameters' array from a string
            $routes[] = $this->getRouteParametersArrayFromParsedString($routeString, $method);
        }
        return $routes ?? [];
    }
}
