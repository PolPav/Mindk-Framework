<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <ul>
                <?php
                $sum = 0;
                foreach (self::$ready_arr as $product) {
                    $prod_id = (int)$product['product_id'];
                    $product_name = $product['product_name'];
                    $attr_name = $product['attribute_name'];
                    $val_param = $product['value_parameters'];
                    $img = $product['image_name'];
                    $description = $product['description'];
                    $price = $product['price'];
                    self::$id = $prod_id;
                    ?>
                        <select name="quantity" class="form-control input-sm" style="width: 50px">
                            <option>1</option>
                        </select>
                        <li><img src=../img/<?= $img ?> width=120 height=120></li>

                        <li><h4><?= $product_name ?></h4></li>
                        <li><h4><?= $price ?>$</h4></li>

                        <?php
                        $sum += $price;
                        }
                        ?>
                    <h3>all goods in the amount: <?= $sum?>$ </h3>
                    <a href="/basket/delete/">
                         <button type="button" class="btn btn-info i-btn">Delete</button>
                    </a>
                    <a href="/basket/order">
                        <button type="submit" class="btn btn-info c-btn">Checkout</button>
                    </a>
            </ul>
        </div>
    </div>
</div>