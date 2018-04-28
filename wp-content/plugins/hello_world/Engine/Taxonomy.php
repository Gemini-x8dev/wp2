<?php

class Taxonomy {

    public function resgiterTreeGroups () {
        $labels = [
            'name'              => _x('Olives', 'taxonomy general name'),
            'singular_name'     => _x('Olive', 'taxonomy singular name'),
            'search_items'      => __('Search Olives'),
            'all_items'         => __('All Olives'),
            'parent_item'       => __('Parent Olive'),
            'parent_item_colon' => __('Parent Olive:'),
            'edit_item'         => __('Edit Olive'),
            'update_item'       => __('Update Olive'),
            'add_new_item'      => __('Add New Olive'),
            'new_item_name'     => __('New Olive Name'),
            'menu_name'         => __('Olive'),
        ];
        $args = [
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'olive'],
        ];
        register_taxonomy('olive', ['trees'], $args);
    }

    public function registerTechGroup () {
        $labels = [
            'name'              => _x('Technos', 'taxonomy general name'),
            'singular_name'     => _x('Tech', 'taxonomy singular name'),
            'search_items'      => __('Search Technos'),
            'all_items'         => __('All Technos'),
            'parent_item'       => __('Parent Tech'),
            'parent_item_colon' => __('Parent Tech:'),
            'edit_item'         => __('Edit Tech'),
            'update_item'       => __('Update Tech'),
            'add_new_item'      => __('Add New Tech'),
            'new_item_name'     => __('New Tech Name'),
            'menu_name'         => __('Tech'),
        ];
        $args = [
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'tech'],
        ];
        register_taxonomy('tech', ['post'], $args);
    }

}