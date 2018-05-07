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

}