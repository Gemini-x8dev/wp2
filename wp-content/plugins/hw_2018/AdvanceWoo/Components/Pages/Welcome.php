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
            <div id="hw2018-change-password">

            </div>
        </div>
        <?php
    }

    public static function changePassword() {
        $faiz = Users::get(1);
        ob_clean();
        ?>
        <p>
            Looking to change your password eh? <?= $faiz->data->user_nicename ?>
            <input type="text" class="form-row-last" value="<?= $faiz->data->user_pass ?>">
            btw your email is <?= $faiz->data->user_email ?>
            <button onclick="alert('Hello world..')">change</button>
        </p>
        <?php
        wp_die();
    }

}