<h1 style="position: relative; left: 40%; color: #4cae4c">Update catalog</h1>
<div class="c-admin">
    <div class="row">
        <div class="header-top h-nav">
            <div class="header-top min">
                <h2>Orders</h2>
            </div>
        </div>
        <div class="col-md-12">

            <div class="col-lg-6 nav-admin">
                <a href="/admin"><button type="button" class="btn btn-info btn-c">Back to admin-panel</button></a>
                <a href="/admin/orders"><button type="button" class="btn btn-info btn-c">Ready orders</button></a>
                <a href="/admin/create"><button type="button" class="btn btn-info btn-c">Add new user</button></a>
            </div>
            <?php
//             try {
                 ?>
                 <h1><?= self::$error ?></h1>
                 <form class="add-form" action="/admin/update" method="post">
                     <p>Product-name: <input name="product_name" type="text" class="form-control">
                     <p>Image: <input name="image_name" type="text" class="form-control">
                     <p>Price: <input name="price" type="text" class="form-control">
                     <p>Description: <textarea name="description" type="text" class="form-control"></textarea>
                         <input id="save-button" type="submit" class="btn btn-info save-btn" value="update">
                 </form>
                 <?php
//             } catch(\PolPav\Exception\ExceptionForm $e){
//
//             }
            ?>
        </div>
    </div>
</div>