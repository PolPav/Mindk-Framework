<h1><?= self::$error ?></h1>
<form class="order-form" action="/order" method="post">
    <p>Name: <input name="name" type="text" class="form-control" placeholder="Enter your name" size="50">
    <p>Email: <input name="email" type="text" class="form-control" placeholder="Enter your email">
    <p>Phone: <input name="phone" type="text" class="form-control" placeholder="Enter your phone">
    <p>Address: <input name="address" type="text" class="form-control" placeholder="Enter your address">
        <input id="order-button" type="submit" class="btn btn-info c-btn" value="To order">
</form>