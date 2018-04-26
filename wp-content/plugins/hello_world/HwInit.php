<?php

class HwInit {

    const ROOT = WP_CONTENT_DIR . "/plugins/hello_world/";
    const API = self::ROOT . "/API/";
    const ENGINE = self::ROOT . "/Engine/";
    const ADMIN = self::ROOT . "/admin/";

    public static function includeClasses ($dir, $class = "", $output = false) {

        $dir = constant("self::$dir");

        if (!$dir){
            return false;
        }

        if ($class) {
            require_once $dir . $class . ".php";
            return;
        }

        $apis = self::dirToArray($dir);
        foreach ($apis as $api) {
            $array = explode('.', $api);
            $extension = end($array);
            if($extension === "php") {
                if ($output) {
                    echo $dir . $api . "<br>";
                }
                require_once $dir . $api;
            }
        }
    }

    public static function dirToArray($dir) {

        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                {
                    $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                }
                else
                {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

}