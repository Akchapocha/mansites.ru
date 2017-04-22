<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="utf-8">
    <title><?= $meta['title'] ?></title>
    <meta name="description" content="<?= $meta['desc'] ?>">
    <meta name="keywords" content="<?= $meta['keywords'] ?>">
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="page-wraper">

    <header id="header">
        <img id=logo src="/img/Logo1.png" title="Логотип" alt="Красивый логотип"/>
        <div id="sitename">
            <li><a href="/"><img src="/img/mansites.png"/></a></li>
        </div>
        <div id="slogo">
            <li>Производство сайтов</li>
        </div>
        <div id="menu-up">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/">меню админки</a></li>
<!--                --><?php //foreach ($menu as $item): ?>
<!--                    <li><a href="/page/--><?//= $item['desc_menu'] ?><!--">--><?//= $item['name_menu'] ?><!--</a></li>-->
<!--                --><?php //endforeach; ?>
            </ul>
        </div>
    </header>

    <div id="sb">
        <div id="sb1">
            <li>Шаблоны для CMS</li><br>
            <ul>
                сайдбар админки
<!--                --><?php //foreach ($sb as $item): ?>
<!--                    <li><a href="/page/--><?//= $item['desc_category'] ?><!--">--><?//= $item['name_category'] ?><!--</a></li>-->
<!---->
<!--                --><?php //endforeach; ?>
            </ul>
        </div>
    </div>

    <div id="content">
        <?= $content ?>
    </div>

    <div id="footer">
        <li>made by 2016</li>
    </div>

</div>

</body>

</html>