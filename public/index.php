<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = new PolPav\App(include('../app/config/config.php'));
$app->run();








