<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <ul class="prod-list">

                 <?php
                 foreach (self::$ready_arr as $product) {

                         $prod_id = (int)$product['product_id'];
                         $product_name = $product['product_name'];
                         $attr_name = $product['attribute_name'];
                         $val_param = $product['value_parameters'];
                         $description = $product['description'];
                         $price = $product['price'];
                         $img = $product['image_name'];
                          self::$id = $prod_id;

                             ?>
                             <div class="col-lg-3 product">
                             <li style="margin-top: 15px"><img src=/../img/<?= $img ?> width=50 height=50></li>
                             <li><h4><span><?= $product_name ?></span></h4></li>
                             <li><span><?= $attr_name ?>
                             <li><span><?= $val_param ?>
                             <li><span><?= $description ?></span></li>
                             <li><h4><span><?= $price ?>$</span></h4></li>
                             <a href="/catalog/add/<?= self::$id ?>">
                          <button type="button" class="btn btn-info prod-btn">Add to basket</button>
                       </a>
                   </div>
                  <?php
                 }
                ?>

            </ul>

        </div>
    </div>
</div>