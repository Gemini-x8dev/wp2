<?php

include_once dirname(__FILE__) . "/../HwInit.php";
HwInit::includeClasses('ENGINE','Debugging');

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
            'menu_icon' => 'dashicons-palmtree',
            'taxonomies' => ['category'],
            'supports' => ['title', 'editor', 'excerpt', 'thumbnail']
        ]);
    }

    public function treesProperties()
    {
        $screens = ['trees'];
        foreach ($screens as $screen) {
            add_meta_box(
                $screen . '_props',           // Unique ID
                'Describe the tree Properties',  // Box title
                [$this,'propertiesBoxes'],  // Content callback, must be of type callable
                $screen                   // Post type
            );
        }
    }

    public function propertiesBoxes($post)
    {
        $value = get_post_meta($post->ID, '_tree_props', true);
        $trees_props = new StdClass();

        $trees_props->prop = isset($value['prop']) ? $value['prop'] : '';
        $trees_props->fruit = isset($value['fruit']) ? $value['fruit'] : '';
        $trees_props->texture = isset($value['texture']) ? $value['texture'] : '';
        $trees_props->length = isset($value['length']) ? $value['length'] : '';
        $trees_props->email = isset($value['email']) ? $value['email'] : '';

        Debugging::pushToConsole(json_encode($value));
        ?>
        <table class="form-table">

            <tbody>
            <tr>
                <th scope="row"><label for="prop">How is this tree?</label></th>
                <td>
                    <select name="prop" id="prop" class="postbox">
                        <option value="Cool Shade" <?php selected($trees_props->prop, 'Cool Shade'); ?>>Cool Shade</option>
                        <option value="Green Leaves" <?php selected($trees_props->prop, 'Green Leaves'); ?>>Green Leaves</option>
                        <option value="Cool Breeze" <?php selected($trees_props->prop, 'Cool Breeze'); ?>>Cool Breeze</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="fruit">Fruit</label></th>
                <td><input name="fruit" type="text" id="fruit" aria-describedby="tagline-description" value="<?= $trees_props->fruit ?>" class="regular-text">
                    <p class="description" id="tagline-description">Describe your fruit for this tree.</p></td>
            </tr>


            <tr>
                <th scope="row"><label for="texture">Texture</label></th>
                <td><input name="texture" type="text" id="texture" value="<?= $trees_props->texture ?>" class="regular-text code"></td>
            </tr>

            <tr>
                <th scope="row"><label for="length">Length</label></th>
                <td><input name="length" type="text" id="length" aria-describedby="home-description" value="<?= $trees_props->length ?>" class="regular-text code">
                </td>
            </tr>


            <tr>
                <th scope="row"><label for="email">Trees Address</label></th>
                <td><input name="email" type="email" id="email" aria-describedby="new-admin-email-description" value="<?= $trees_props->email ?>" class="regular-text ltr">
                    <p class="description" id="new-admin-email-description">This address is used for admin purposes. If you change this we will send you an email at your new address to confirm it. <strong>The new address will not become active until confirmed.</strong></p>
                </td>
            </tr>
            </tbody></table>

        <?php
    }

    public function saveTreeProps($post_id)
    {
        $prepare_meta = [
          'prop' => $_POST['prop'],
          'fruit' => $_POST['fruit'],
          'texture' => $_POST['texture'],
          'length' => $_POST['length'],
          'email' => $_POST['email'],
        ];

        update_post_meta($post_id,'_tree_props', $prepare_meta);
    }

    public function printTreeProps ($id,$key='_tree_props',$single=false) {
                $properties = get_post_meta($id,$key,$single);
                if(!empty($properties)) {
                    foreach ($properties as $prop) {
                        ?>
                        <div class="container list-group-item">
                            <p>Props:</p>
                            <p>
                                <span>Minsk:</span>
                                <span class="badge badge-success"><?= $prop['prop'] ?></span>
                                <span>Fruit:</span>
                                <span class="badge badge-success"><?= $prop['fruit'] ?></span>
                                <span>Texture:</span>
                                <span class="badge badge-success"><?= $prop['texture'] ?></span>
                                <span>Length:</span>
                                <span class="badge badge-success"><?= $prop['length'] ?></span>
                                <span>Email:</span>
                                <span class="badge badge-success"><?= $prop['email'] ?></span>
                            </p>
                        </div>
                        <?php
                    }
                }
                ?>
        <?php
    }

    public function addTreesToTheMix($query)
    {
        if (is_home() && $query->is_main_query()) {
            $query->set('post_type', ['post', 'trees','about']);
        }
        return $query;
    }
}