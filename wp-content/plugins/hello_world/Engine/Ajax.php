<?php

class Ajax {

    function addScripts () {
        $nonce = wp_create_nonce("my_page_views_nonce");
        wp_enqueue_script( 'frontend-ajax', plugin_dir_url(__FILE__) . "../js/scripts.js", array('jquery'), null, true );
        wp_localize_script( 'frontend-ajax', 'single_tree_obj',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => $nonce,
                'action' => 'my_page_views',
                'post_id' => get_the_ID()
            )
        );
    }

    function my_user_vote() {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_user_vote_nonce")) {
            exit("No naughty business please");
        }

        $vote_count = get_post_meta($_REQUEST["post_id"], "votes", true);
        $vote_count = ($vote_count == '') ? 0 : $vote_count;
        $new_vote_count = $vote_count + 1;

        $vote = update_post_meta($_REQUEST["post_id"], "votes", $new_vote_count);

        if($vote === false) {
            $result['type'] = "error";
            $result['vote_count'] = $vote_count;
        }
        else {
            $result['type'] = "success";
            $result['vote_count'] = $new_vote_count;
        }

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $result = json_encode($result);
            echo $result;
        }
        else {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }

        die();

    }

    function my_page_views() {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_page_views_nonce")) {
            exit("No naughty business please");
        }

        $vote_count = get_post_meta($_REQUEST["post_id"], "views", true);
        $vote_count = ($vote_count == '') ? 0 : $vote_count;
        $new_vote_count = $vote_count + 1;

        $vote = update_post_meta($_REQUEST["post_id"], "views", $new_vote_count);

        if($vote === false) {
            $result['type'] = "error";
            $result['vote_count'] = $vote_count;
        }
        else {
            $result['type'] = "success";
            $result['vote_count'] = $new_vote_count;
        }

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $result = json_encode($result);
            echo $result;
        }
        else {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }

        die();

    }

    function my_must_login() {
        echo "You must log in to vote";
        die();
    }
}