<?php
/*
 * The guy responsible for all cherad on wordpress
 * */

require_once dirname(__FILE__) . "/API/Options.php";

class HwEngine {

    public function init () {
        add_filter('the_content',[$this,'addHello']);
//        add_action('wp_loaded',[$this,'sayHello']);
//        add_action('wp_loaded',[$this,'getOptions']);
        add_action('admin_menu', [$this,'hw2018_options_page']);
        add_action('admin_init', [$this,'AddStylestoAdmin']);
    }

    public function addHello ($content) {
        return $content . "<br><small>Created by: hw</small><br>";
    }

    public function sayHello () {
        echo '<script>alert("Hello i am loaded")</script>';
    }

    public function getOptions () {
        return Options::getAll();
    }

    public function hw2018_options_page()
    {
        add_menu_page(
            'About me Footer',
            'Hello World Simple Plugin',
            'manage_options',
            plugin_dir_path(__FILE__) . '/admin/hw_options.php',
            null,
            '',
            20
        );
    }

    public function AddStylestoAdmin () {
        wp_enqueue_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css');
    }
}