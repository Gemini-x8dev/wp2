<?php

require_once ABSPATH . "/wp-includes/option.php";

class Options {

    public static function getAll() {
        return wp_load_alloptions();
    }

    public static function getOption($name) {
        return get_option($name);
    }

    public static function addOption($name,$value) {
        return add_option($name,$value);
    }

    public static function updateOption($name,$value,$autoload = true) {
        return update_option($name,$value,$autoload);
    }

}