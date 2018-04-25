<?php

require_once dirname(__FILE__) . "/../HwInit.php";
HwInit::includeClasses('ENGINE');

Debugging::prettyPrint(get_registered_settings());