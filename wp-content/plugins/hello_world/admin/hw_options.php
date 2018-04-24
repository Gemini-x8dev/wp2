<?php

// check user capabilities
if (!current_user_can('manage_options')) {
    die('you are not allowed to view this page..');
}

require_once dirname(__FILE__) . "/../HwInit.php";
require_once ABSPATH . "/wp-includes/class-wp-query.php" ;
require_once HwInit::HW_ENGINE;

if(isset($_POST)) {
    $line = isset($_POST['line']) && $_POST['line'] ? $_POST['line'] : '';
    $about = isset($_POST['about']) && $_POST['about'] ? $_POST['about'] : '';
    // add a new post
    if($line && $about) {
        $response = wp_insert_post([
            'post_type' => 'about',
            'post_content' => $about,
            'post_title' => $line,
            'post_status' => 'publish'
        ],true);
        print_r($response);
    }
}
$posts = get_posts(['post_type' => 'about']);
$posts = !empty($posts) ? $posts[0] : false;
?>
<div class="wrap">
    <h1><?= esc_html(get_admin_page_title()); ?></h1>
    <div class="madeinjapan col-md-6">
        <form action="" method="post">
            <div class="form-group">
                <label for="hello">Add a good line</label>
                <input class="form-control" name="line" id="line" placeholder="" value="">
            </div>
            <div class="form-group">
                <label for="hello">About</label>
                <textarea class="form-control" name="about" id="about" placeholder="" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <?php
    if($posts) {
    ?>
        <div class="madeinjapan">
            <div class="alert alert-primary">
                <?= $posts->post_content ?>
            </div>
        </div>
    <?php
    }
    ?>

</div>

<style>
    .madeinjapan {
        padding: 3rem;
        box-shadow: 0px 0px 1px 0px lightgrey;
    }
</style>