<?php

class Welcome {

    public static function welcomeMessage () {
//        if ( function_exists( 'is_woocommerce_active' ) && is_woocommerce_active() ) {
            global $woocommerce;
//            Debugging::prettyPrint($woocommerce);
//        }
        ?>
        <div class="woocommerce-message woocommerce-mini-cart-item">
            <p>Woocommerce is loaded.</p>
            <p>Version: <?= $woocommerce->version ?></p>
        </div>
        <?php
    }

}