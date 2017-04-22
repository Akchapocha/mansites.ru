<?php


namespace app\controllers;




class PagesController extends AppController
{
    public function viewAction()
    {
        echo '<b>Ушло по маршруту: </b>';
        debug($this->route);
        debug($_GET);
        echo 'Контролер <b>Pages::viewAction</b> подключен<br>';
    }

    public function testAction()
    {
        echo '<b>Ушло по маршруту: </b>';
        debug($this->route);
        echo 'Контроллер Pages::testAction подключен <br>';
    }

    public function testa()
    {
        echo 'Контроллер Pages::test подключен <br>';
    }

}