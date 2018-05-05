<?php

include_once dirname(__FILE__) . "/Autoload.php";
include_once dirname(__FILE__) . "/Components/Debugging.php";

Debugging::showErrors();

//Autoload::classes(dirname(__FILE__) . "/Components/","",true);
echo '<pre>';

$dir = dirname(__FILE__) . "/Components/";

//Autoload::classes($dir,"",true);

$files = Autoload::listFolderFiles($dir);
$files = Autoload::arrayFlatten($files);

print_r($files);
