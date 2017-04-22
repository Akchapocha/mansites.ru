<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\Controller;
use R;
use vendor\core\App;

class AppController extends Controller
{
    public $menu;
    public $sb;
    public $meta = [];

    public function __construct($route)
    {
        parent::__construct($route);
//        if ($this->route['controller'] == 'Main' && $this->route['action'] == 'view'){
//            echo '<h1>TEST<h1>';
//        }
        new Main();

        $this->menu = App::$app->cache->get('menu');
        if (!$this->menu){
            $this->menu = R::getAssoc('SELECT * FROM menu');
            App::$app->cache->set('menu', $this->menu, 3600*24);
        }

        $this->sb = App::$app->cache->get('category');
        if (!$this->sb){
            $this->sb = R::getAssoc('SELECT * FROM category');
            App::$app->cache->set('category', $this->sb, 3600*24);
        }

        //$this->menu = R::getAssoc('SELECT * FROM menu');
        //$this->sb = R::getAssoc('SELECT * FROM category');
//        debug($this->menu);
    }

    protected function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
}