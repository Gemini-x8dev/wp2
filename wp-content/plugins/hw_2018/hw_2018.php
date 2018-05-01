<?php
/*
Plugin Name: WP2 Addons
Description: Utilizing plugins hooks. Everything will be handled from this single point.
Author: HW
version: 0.0.1
*/

include_once dirname(__FILE__) . "/Misc.php";
include_once dirname(__FILE__) . "/API.php";
include_once dirname(__FILE__) . "/Exp.php";

class PluginHooks {

    public static function plug () {
        flush_rewrite_rules();
    }

    public static function unplug () {
        flush_rewrite_rules();
    }

    public static function flush () {
        echo 'I am uninstalled..';
    }
}

register_activation_hook(__FILE__,['PluginHooks','plug']);
register_deactivation_hook(__FILE__,['PluginHooks','unplug']);
register_uninstall_hook(__FILE__,['PluginHooks','flush']);

new API();