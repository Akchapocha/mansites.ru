<?php

namespace vendor\core;



/**
 * Class Router
 * @package vendor\core
 */
class Router
{

    /**  
     * Таблица маршрутов
     * @var array
     */
    protected static $routes = [];

    /**   
     * Текущий маршрут
     * @var array
     */
    protected static $route = [];

    /**
     * Добавляет маршрут в таблицу маршрутов
     * @param $regexp
     * @param $route
     */
    public static function addRoutes($regexp,$route=[])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает таблицу маршрутов
     * @return array
     */
    public static function getRoutes()
    {
        echo 'Таблица маршрутов: ';
        return self::$routes;
    }

    /**
     * Возвращает текущий маршрут
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Ищет совпадение URL с маршрутами в таблице маршрутов
     * @param $url
     * @return bool
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i",$url,$mathces)) {
                foreach ($mathces as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['controller'])) {
                    $route['controller'] = 'Page';
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'view';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Отправляет по маршруту
     * @param $url
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = '\app\controllers\\'.ucfirst(self::$route['controller'].'Controller');
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::$route['action'].'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    http_response_code(404);
                    require_once '404.html';
                    echo 'Метод '.$controller.'::<b>'.$action.'</b> не найден<br>';
                    //debug(self::$route);
                }

            } else {
                http_response_code(404);
                require_once '404.html';
                echo 'Контроллер <b>'.$controller.'</b> не найден<br>';
            }
        } else {
            http_response_code(404);
            require_once '404.html';
        }
    }

    protected static function removeQueryString($url)
    {
        if ($url !== '/'){
            $params = explode('&',$url, 2);
            if (false === strpos($params[0], '=')){
                    return rtrim($params[0],'/');
            } else {
                return '';
            }
        }
    }
}