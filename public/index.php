<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = new polpav\framework\App(include('../app/config/config.php'));
$app->run();
$app->done();
$link = $app->connect('mysql', include('../app/config/config.php'));



