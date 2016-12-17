<h1>Received orders:</h1>
<div class="col-md-12 c-admin c-admin-w">
    <div class="row">

        <div class="header-top h-nav">
            <div class="header-top min-order">
                <h2>Orders</h2>
                <a href="/admin"><button type="button" class="btn btn-info btn-c">Back to admin-panel</button></a>
            </div>
        </div>
        <div class="col-md-12">

            <?php
            foreach (self::$ready_arr as $order) {
                ?>
                <hr>
                <h2>Order Number: <?= $order['order_number']?> </h2>
                <p><b>Client</b>:<?= $order['user_name']?> </p>
                <p><b>Email</b>:<?= $order['email']?> </p>
                <p><b>Phone</b>:<?= $order['phone']?> </p>
                <p><b>Delivery Address</b>:<?= $order['address']?></p>
                <p><b>Order date</b>: <?= $order['date']?> </p>

                <h3>Purchased Products:</h3>

                <table class="table table-bordered">
                    <tr>
                        <th>N</th>
                        <th>Product-name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    <?php
                    $num = 1;
                    $sum = 0;
                    foreach ($order['order_data'] as $order_data) {
                        ?>

                        <tr>
                            <td><?= $num ?></td>
                            <td><?= $order_data['product_name'] ?></td>
                            <td><?= $order_data['price'] ?></td>
                            <td><?= $order_data['quantity'] ?></td>
                        </tr>


                        <?php $num++;
                        $sum += $order_data['price'];
                    }
                        ?>
                </table>
                <h4>Total amount: <?= $sum ?>$</h4>
             <?php
            }
            ?>
        </div>
    </div>
</div>
   
