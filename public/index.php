<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = new shop\app\App(include('../app/config/config.php'));
$app->run();
$app->done();


