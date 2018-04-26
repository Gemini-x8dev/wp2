<?php

function include_srcs () {
    wp_enqueue_style('styles',get_stylesheet_uri());
    wp_enqueue_style('bootstrap_4','https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css');
    wp_enqueue_style('pricing',get_theme_file_uri("/css/pricing.css"));
    wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.2.1.slim.min.js',NULL,'3.2.1',true);
    wp_enqueue_script('Utils',get_theme_file_uri("js/Utils.js"),NULL,'0.1',true);
    wp_enqueue_script('calls',get_theme_file_uri("js/calls.js"),NULL,'0.1',true);
}

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'register_my_menus' );
add_action('wp_enqueue_scripts','include_srcs');