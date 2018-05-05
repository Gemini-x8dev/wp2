<?php
class Debugging {

    public static function showErrors () {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    public static function prettyPrint ($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public static function prettyPrintThenExit ($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }

    public static function pushToConsole ($response) {
        echo "<script>console.log('$response')</script>";
    }
}
