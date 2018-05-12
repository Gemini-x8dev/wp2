<?php

class Users {

    public static function get ($id = null) {
        if (!$id) {
            return [];
        }
        return get_userdata($id);
    }

    public static function all () {
        return get_users();
    }

    public static function changeUserPassword ($password,$id) {
        if (!$id) {
            return false;
        }
        wp_set_password( $password, $id);
        return true;
    }

    public static function getLoggedIn () {
        return wp_get_current_user()->data;
    }

    public static function getOrders () {
        return get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array_keys( wc_get_order_statuses() ),  //'post_status' => array('wc-completed', 'wc-processing'),
        ) );
    }

}