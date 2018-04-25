<?php
/*
 * The guy responsible for all cherad on wordpress
 * */

require_once dirname(__FILE__) . "/../HwInit.php";

class Page {

    public function hw2018_options_page()
    {
        add_menu_page(
            'About me Footer',
            'Bespoke Page',
            'manage_options',
            HwInit::ADMIN . '/hw_options.php',
            null,
            'dashicons-editor-unlink',
            80
        );
    }

    public function addCustomPostType () {
        register_post_type( 'about', [
            'public' => true,
            'labels' => [
                'name' => 'About',
                'singular_name' => 'About',
                'add_new' => 'Add About',
                'all_items' => 'All Abouts',
                'add_new_item' => 'Add About',
                'edit_item' => 'Edit About',
                'new_item' => 'New About',
                'view_item' => 'View About',
                'search_items' => 'Search Abouts',
                'not_found' => 'No Abouts found',
                'not_found_in_trash' => 'No Abouts found in trash',
                'parent_item_colon' => 'Parent About'
            ],
            'menu_position' => 80,
            'menu_icon' => 'dashicons-media-text'
        ]);
    }
}