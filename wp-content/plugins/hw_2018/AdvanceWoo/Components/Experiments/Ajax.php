<?php

class Ajax {

    public static function add ($interface = "public", $action, $callback) {
        if ($interface == "public") {
            self::frontend($action,$callback);
        }elseif($interface == "admin"){
            self::backend($action,$callback);
        }else{
            Console::error("The given interface could not be found.");
        }
        return 0;
    }

    public static function backend ($action,$callback) {
        add_action( 'wp_ajax_' . $action, $callback );
    }

    public static function frontend ($action,$callback) {
        add_action( 'wp_ajax_' . $action, $callback );
        add_action( 'wp_ajax_nopriv_' . $action, $callback );
    }

}