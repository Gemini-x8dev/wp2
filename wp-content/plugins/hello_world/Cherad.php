<?php
/*
 * The guy responsible for all cherad on wordpress
 * */
class HW_Cherad {

    public function init () {
        add_filter('the_content',[$this,'addHello']);
    }

    public function addHello ($content) {
        return $content . "<br><small>Created by: hw</small><br>";
    }

}