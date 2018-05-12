<?php

class User {

    public static function dropDownWidget () {
        $user = (array)Users::getLoggedIn();
        if(!empty($user)){
            self::userMenu($user);
        }
    }

    public static function userMenu ($user) {
        ?>
        <div class="uk-inline" style="float: right">
            <button class="uk-button uk-button-default" type="button"><?= $user['user_nicename'] ?></button>
            <div uk-dropdown="pos: bottom-justify">
                <ul class="uk-nav uk-dropdown-nav">
                    <li class="uk-active"><a href="<?= get_site_url() . '/my-account/' ?>">My Account</a></li>
                    <li><a href="<?= get_site_url() . '/my-account/orders' ?>">Orders</a></li>
                    <li class="uk-nav-header">Other Details</li>
                    <li><a href="<?= get_site_url() . '/my-account/downloads' ?>">Downloads</a></li>
                    <li><a href="<?= get_site_url() . '/my-account/edit-address' ?>">Address</a></li>
                    <li><a href="<?= get_site_url() . '/my-account/edit-account' ?>">Account details</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="<?= get_site_url() . '/my-account/customer_logout' ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <?php
    }

}