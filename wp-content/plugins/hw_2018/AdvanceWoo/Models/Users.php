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

}