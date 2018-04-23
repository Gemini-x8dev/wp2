<?php
/*
Plugin Name: Hello World Simple Plugin
Description: Just exploring the art of wordpress here..
Author: HW
version: 0.0.1
*/

require_once dirname(__FILE__) . "/Cherad.php";

class HelloWorldP {

    public static function activate () {
        register_post_type( 'book', ['public' => 'true'] );
        flush_rewrite_rules();
    }

    public static function deactivate () {
        unregister_post_type( 'book' );
        flush_rewrite_rules();
    }

    public static function uninstall () {
        echo 'I am uninstalled..';
    }
}

register_activation_hook(__FILE__,['HelloWorldP','activate']);
register_deactivation_hook(__FILE__,['HelloWorldP','deactivate']);
register_uninstall_hook(__FILE__,['HelloWorldP','uninstall']);

(new HW_Cherad())->init();