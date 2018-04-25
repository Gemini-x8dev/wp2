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
}