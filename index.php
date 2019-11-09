<?php
session_start();
require 'inc/data/products.php';
require 'inc/head.php';

if (isset($_GET['add_to_cart'])) {
    echo '<strong style="font-size: 20px; color: green">Cookies added in your cart !</strong>';
    $cookie_name = 'Cart';
    if(empty($_COOKIE['Cart'])) {
        $cookie_value = $_GET['add_to_cart'];
        setcookie($cookie_name, $cookie_value, time() + 24 * 3600, null, null, false, true);
    } else {
        $cookie_value= $_COOKIE['Cart'];
        setcookie($cookie_name, $cookie_value . ',' . $_GET['add_to_cart'], time() + 24 * 3600, null, null, false, true);
    }
}


?>

<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
