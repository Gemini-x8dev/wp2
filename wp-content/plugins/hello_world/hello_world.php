<?php
/*
Plugin Name: Hello World Simple Plugin
Description: Just exploring the art of wordpress here..
Author: HW
version: 0.0.1
*/

require_once dirname(__FILE__) . "/HwInit.php";
require_once HwInit::ROOT . '/HwEngine.php';
HwInit::includeClasses('API');

class HwPlug {

    public static function plug () {
        Options::addOption('about','');
        flush_rewrite_rules();
    }

    public static function unplug () {
        unregister_post_type( 'about' );
        flush_rewrite_rules();
    }

    public static function flush () {
        echo 'I am uninstalled..';
    }
}

register_activation_hook(__FILE__,['HwPlug','plug']);
register_deactivation_hook(__FILE__,['HwPlug','unplug']);
register_uninstall_hook(__FILE__,['HwPlug','flush']);

(new HwEngine())->init();