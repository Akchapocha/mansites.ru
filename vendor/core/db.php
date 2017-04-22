<?php

namespace vendor\core;

use R;
class Db
{
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];


    protected function __construct()
    {
        $db = require_once HOME.'/config/config_db.php';
        //debug($db);
        require_once LIBS.'/rb.php';

        R::setup($db['dsn'],$db['user'],$db['password']);
        R::freeze(TRUE);
//        \R::fancyDebug(TRUE);

    }

    public static function instance()
    {
        if (self::$instance === NULL){
            self::$instance = new self;
        }
        return self::$instance;
    }


}