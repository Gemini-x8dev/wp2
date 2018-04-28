<?php
/*
 * The guy responsible for all cherad on wordpress
 * */
class Misc {

    public function addHello ($content) {
        return $content . "<br><small>Created by: hw</small><br>";
    }

    public function truncateString ($content) {
        if (is_front_page()) {
            return (strlen($content) > 300) ? substr($content, 0, 300) . '...' : $content;
        }
        return $content;
    }

    public function sayHello () {
        echo '<script>alert("Hello i am loaded")</script>';
    }

    public function AddStylestoAdmin () {
//        wp_enqueue_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css');
    }

    public static function castVote ($id) {
        $votes = get_post_meta($id, "votes", true);
        $votes = ($votes == "") ? 0 : $votes;
        ?>
        <p>
            This post has <span id="vote_counter"> <?= $votes ?> </span> votes
        </p>
        <?php
        $nonce = wp_create_nonce("my_user_vote_nonce");
        $link = admin_url('admin-ajax.php?action=my_user_vote&post_id='.$id.'&nonce='.$nonce);
        ?>
        <p><a class="user_vote" data-nonce="<?= $nonce ?>" data-post_id="<?= $id ?>" href="<?= $link ?>">vote for this article</a></p>
        <?php
    }

    public static function PageViews () {
        ?>
        <p>
            Page viewed <span id="viewed_times">0</span>
        </p>
        <?php
    }

}