<?php
error_reporting(E_ALL);

/**
 * Подключаем debug()
 */
require_once '../vendor/libs/functions.php';

/**
 * Берет URI
 */
$uri = '/'.$_SERVER['QUERY_STRING'];


/**
 * HOME - Корень сайта
 */
define('WWW',__DIR__);
define('HOME',dirname(__DIR__));
define('APP',dirname(__DIR__).'/app');
define('CORE',dirname(__DIR__).'/vendor/core');
define('LIBS',dirname(__DIR__).'/vendor/libs');
define('CACHE',dirname(__DIR__).'/tmp/cache');
define('LAYOUT','default');



/**
 * Используем пространство имен
 */

use \vendor\core\Router;


/**
 * Автозагрузка файлов классов
 * @param $class
 */
spl_autoload_register(function ($class)
{

    $file = HOME . '/' . str_replace('\\', '/', strtolower($class)) . '.php';
    if (is_file($file)) {
        require_once $file;
    } /*else {
            echo 'Файл <b>' . $file . '</b> не найден<br>';
        } */
});

new \vendor\core\App();
/**
 * Правила пользователя
 */
Router::addRoutes('^/page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$',['controller' => 'Page']);
Router::addRoutes('^/page/(?P<alias>[a-z-]+)$',['controller' => 'Page', 'action' => 'view']);

/**
 * Правила по умолчанию
 */
Router::addRoutes('^$',['controller' => 'Main', 'action' => 'view']);
Router::addRoutes('^/?(?P<controller>[a-z-]+)?/?(?P<action>[a-z-]+)?$');



Router::dispatch($uri);






