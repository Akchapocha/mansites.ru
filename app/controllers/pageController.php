<?php


namespace app\controllers;


 use R;

class PageController extends AppController
{
    public function viewAction()
    {

        $this->setMeta('Вторая страница','Описание страницы', 'Ключевые слова');
        $meta = $this->meta;
        $menu = $this->menu;
        $sb = $this->sb;

        $desc_menu = R::getAssoc("SELECT desc_menu FROM menu");
        $desc_category = R::getAssoc("SELECT desc_category FROM category");

        foreach ($desc_menu as $id_menu){
            if ((string)$id_menu == (string)$this->route['alias']){
                $this->view = 'menu';
                $text_menu = R::getRow("SELECT text_menu FROM menu WHERE desc_menu = '{$this->route['alias']}'");
                $text_menu = $text_menu['text_menu'];
            }

        }

        foreach ($desc_category as $id_category){
            if ((string)$id_category == (string)$this->route['alias']){
                $this->view = 'category';
                $name_category = R::getRow("SELECT name_category FROM category WHERE desc_category = '{$this->route['alias']}'");
                $name_category = $name_category['name_category'];
            }

        }


        $this->set(compact('title', 'menu','sb','meta','text_menu','name_category'));
        //debug($this->route);

    }
}