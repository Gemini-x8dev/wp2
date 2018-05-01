<?php

class Misc {

    public static function printToConsole ($data) {
        echo "<script>console.log('".$data."')</script>";
    }

    public static function prettyPrint ($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

}