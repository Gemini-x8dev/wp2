<?php

class Welcome {

    public static function welcomeMessage () {
            global $woocommerce;
        ?>
        <div class="woocommerce-message woocommerce-mini-cart-item">
            <p>Woocommerce is loaded.</p>
            <p>Version: <?= $woocommerce->version ?></p>
            <p>Hey <b> <?= $woocommerce->customer->get_first_name() ?> <?= $woocommerce->customer->get_last_name() ?> </b> </p>
            <p>PHP Mem: <b><?= ini_get ( 'memory_limit' ); ?></b></p>
        </div>
        <?php
    }

}