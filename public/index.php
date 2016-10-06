<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = new PolPav\App(include('../app/config/config.php'));
$app->queryBuilder('/category','App\CategoryController','categoryAction', 'params');
$app->run();
$link = $app->connect('mysql', include('../app/config/config.php'));





