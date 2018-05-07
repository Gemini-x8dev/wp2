<?php

class Plugin {

    public static function assetsUrl () {
        return plugin_dir_url(__FILE__) . "/../../assets";
    }

}