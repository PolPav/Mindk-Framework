<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = new polpav\framework\App(include('../app/config/config.php'));
$app->run();
/**
 * all what comment is my experiments
 */
//$app->get('/hello', function() use($app){
//    echo "<br><h3>Hello function</h3><br>";
//   $app->response('hello function response', 201);
//});
//$app->queryBuilder('/category', 'shop\app\Category', 'categoryAction', 'category_params');

//$app->get('/catalog', function() use($app){
//   $app->response('Hello', 203);
//});
//$app->get('/basket');
//$app->get('');
//$app->response('Hello');
//$app->get('/category');
//$app->response('Hay');
//$app->redirect('http://google.com');
//$app->request->post('title2');
//$app->request->get('title');
//$app->request->get();
//$app->request->containerShow();
$link = $app->connect('mysql', include('../app/config/config.php'));
$sql = 'SELECT * FROM client';
$query = $link->query($sql);
$result = $link->fetch('assoc');

//var_dump($result);
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
    <p>POST_REQUEST: <input type="text" name="title2" size="100">
    <p><input type="submit" value="SEND">
</form>
<a href="index.php?x=100">LINK</a>
<?php echo $_GET['x'];
    echo $_GET['title']  ?>
<form action="index.php" method="get">
    <p>GET_REQUEST: <input type="text" name="title" size="100">
    <p>GET_REQUEST: <input type="text" name="title2" size="100">
    <p><input type="submit" value="SEND">
</form>
</body>
</html>



