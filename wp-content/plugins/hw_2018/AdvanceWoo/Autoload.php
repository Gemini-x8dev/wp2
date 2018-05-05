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

        $apis = self::listFolderFiles($dir);
        $apis = self::arrayFlatten($apis);

        foreach ($apis as $api) {
            if ($api && gettype($api) == "string") {
                $array = explode('.', $api);
                $extension = end($array);
                if($extension === "php") {

                    require_once $api;

                    if ($output) {
                        echo '<script>console.log("'. $dir.$api .'")</script>';
                        echo $dir.$api."<br>";
                    }
                }
            }
        }
        return true;
    }

    public static function listFolderFiles($dir){
        $result = array();
        $ffs = scandir($dir);

        unset($ffs[array_search('.', $ffs, true)]);
        unset($ffs[array_search('..', $ffs, true)]);

        // prevent empty ordered elements
        if (count($ffs) < 1)
            return;

        foreach ($ffs as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                {
                    $result[$value] = self::listFolderFiles($dir . DIRECTORY_SEPARATOR . $value);
                }
                else
                {
                    $result[] = $dir . DIRECTORY_SEPARATOR . $value;
                }
            }
        }
        return $result;
    }


    public static function arrayFlatten($array) {
        if (!is_array($array)) {
            return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::arrayFlatten($value));
            }
            else {
                $result[] = $value;
            }
        }
        return $result;
    }
}