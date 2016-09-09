<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = new polpav\framework\App(include('../app/config/config.php'));
$app->run();
$app->done();
$link = $app->connect('mysql', include('../app/config/config.php'));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>REST</title>
</head>
<body>
<form action="catalog" method="post">
    <p>POST_REQUEST: <input type="text" name="title" size="100">
    <p><input type="submit" value="SEND">
</form>
</body>
</html>



