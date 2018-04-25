<?php
/*
 * The guy responsible for all cherad on wordpress
 * */
class Misc {

    public function addHello ($content) {
        return $content . "<br><small>Created by: hw</small><br>";
    }

    public function sayHello () {
        echo '<script>alert("Hello i am loaded")</script>';
    }

    public function AddStylestoAdmin () {
//        wp_enqueue_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css');
    }

}