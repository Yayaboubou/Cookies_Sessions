<?php
session_start();
require 'inc/head.php';
require 'inc/data/products.php'; //pour le '$catalog'
?>
<section class="cookies container-fluid">
    <div class="row">
         <?php if(!isset($_COOKIE['Cart'])): ?>
        <strong>Your cart is empty. You have any command in progress. </strong>
    </div>
    <div class="row">
        <?php elseif (isset($_COOKIE['Cart'])):
        $cookies = explode(',', $_COOKIE['Cart']);
        foreach ($cookies as $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">

                    <img src="assets/img/product-<?php echo $cookie; ?>.jpg" alt="<?php echo $catalog[$cookie]['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?php echo $catalog[$cookie]['name']; ?></h3>
                        <p><?php echo $catalog[$cookie]['description']; ?></p>
                    </figcaption>
                </figure>
            </div>
        <?php }
        endif ;?>
    </div>
</section>

<?php require 'inc/foot.php'; ?>
