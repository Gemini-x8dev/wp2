<?php

require_once dirname(__FILE__) . "/../HwInit.php";
HwInit::includeClasses('ENGINE');

//Debugging::prettyPrint(get_registered_settings());
//Debugging::prettyPrint(wp_nav_menu( array( 'theme_location' => 'header-menu' ) ));
Debugging::prettyPrint(get_post_meta(30, '_trees_meta_key', false));