<?php

namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;

class MainController extends AppController
{
   // public $layout = 'default';

    public function viewAction()
    {
//        App::$app ->getList();
//        $model = new Main();
        R::fancyDebug(true);
        $posts = App::$app->cache->get('posts');
        if (!$posts){
            $posts = R::getAssoc('SELECT * FROM content');
            App::$app->cache->set('posts', $posts, 3600*24);
        }
//        echo date('Y-m-d H:i', time());
//        echo '<br>';
//        echo date('Y-m-d H:i', 1488960905);
        $this->view ='main';
        $menu = $this->menu;
        $sb = $this->sb;
        $title = 'PAGE TITLE';
        $this->setMeta('Главная страница','Описание страницы', 'Ключевые слова');
        $meta = $this->meta;
        $this->set(compact('title','posts', 'menu','sb','meta'));
    }

    public function testAction()
    {
        $this->layout = 'test';
    }

    
}