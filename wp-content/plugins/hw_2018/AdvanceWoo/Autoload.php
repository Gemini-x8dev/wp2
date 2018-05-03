<?php
/**
 * Simple autoloader, so we don't need Composer just for this.
 */
class Autoload
{

    public static function classes ($dir, $class = "", $output = false) {

        if (!$dir){
            return false;
        }

        if ($class) {
            require_once $dir . $class . ".php";
            return;
        }

        $apis = self::dirToArray($dir);

        foreach ($apis as $api) {
            if (gettype($api) == "string") {
                $array = explode('.', $api);
                $extension = end($array);
                if($extension === "php") {

                    require_once $dir . $api;

                    if ($output) {
                        echo '<script>console.log("'. $dir.$api .'")</script>';
                    }
                }
            }
        }
        return true;
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
                    $result[$value] = self::dirToArray($dir . DIRECTORY_SEPARATOR . $value);
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