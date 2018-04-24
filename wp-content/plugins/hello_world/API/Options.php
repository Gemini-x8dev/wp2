<?php

require_once ABSPATH . "/wp-includes/option.php";

class Options {
    public static function getAll() {
        return wp_load_alloptions();
    }
}