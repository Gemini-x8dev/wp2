<?php

class Debugging {

    public static function prettyPrint ($data) {
        echo '<pre>';
        print_r($data);
    }

    public static function prettyPrintThenExit ($data) {
        echo '<pre>';
        print_r($data);
        exit;
    }

    public static function pushToConsole ($response) {
        echo "<script>console.log('$response')</script>";
    }
}