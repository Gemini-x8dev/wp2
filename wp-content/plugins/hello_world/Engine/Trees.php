<?php

class Trees {
    public function addTrees () {

        register_post_type( 'trees', [
            'public' => true,
            'labels' => [
                'name' => 'Trees',
                'singular_name' => 'Trees',
                'add_new' => 'Add Trees',
                'all_items' => 'All Treess',
                'add_new_item' => 'Add Trees',
                'edit_item' => 'Edit Trees',
                'new_item' => 'New Trees',
                'view_item' => 'View Trees',
                'search_items' => 'Search Treess',
                'not_found' => 'No Treess found',
                'not_found_in_trash' => 'No Treess found in trash',
                'parent_item_colon' => 'Parent Trees'
            ],
            'menu_position' => 80,
            'menu_icon' => 'dashicons-palmtree'
        ]);
    }

    public function treesProperties()
    {
        $screens = ['trees'];
        foreach ($screens as $screen) {
            add_meta_box(
                'tree_props',           // Unique ID
                'Describe the tree Properties',  // Box title
                [$this,'propertiesBoxes'],  // Content callback, must be of type callable
                $screen                   // Post type
            );
        }
    }

    public function propertiesBoxes($post)
    {
        $value = get_post_meta($post->ID, '_wporg_meta_key', true);
        ?>
        <label for="tree_props">How is this tree?</label>
        <select name="tree_props" id="tree_props" class="postbox">
            <option value="Cool Shade" <?php selected($value, 'Cool Shade'); ?>>Cool Shade</option>
            <option value="Green Leaves" <?php selected($value, 'Green Leaves'); ?>>Green Leaves</option>
            <option value="Cool Breeze" <?php selected($value, 'Cool Breeze'); ?>>Cool Breeze</option>
        </select>
        <?php
    }

    public function saveTreeProps($post_id)
    {
        if (array_key_exists('tree_props', $_POST)) {
            update_post_meta(
                $post_id,
                '_trees_meta_key',
                $_POST['tree_props']
            );
        }
    }


}