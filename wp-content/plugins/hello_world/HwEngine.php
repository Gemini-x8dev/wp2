<?php
/*
 * The guy responsible for all cherad on wordpress
 * */

require_once dirname(__FILE__) . "/HwInit.php";

HwInit::includeClasses('API');
HwInit::includeClasses('ENGINE');

class HwEngine {

    private $settings;
    private $pages;
    private $misc;

    function __construct()
    {
        $this->settings = new Settings();
        $this->misc = new Misc();
        $this->pages = new Page();
    }

    public function init () {
        add_filter('the_content',$this->getAction($this->misc,'addHello'));
        add_action('admin_menu', $this->getAction($this->pages,'hw2018_options_page'));
        add_action('admin_init', $this->getAction($this->misc,'addStylestoAdmin'));
        add_action('init', $this->getAction($this->pages,'addCustomPostType'));
        add_action('admin_init', $this->getAction($this->settings,'addANewSetting'));
        add_action( 'admin_menu', $this->getAction($this->settings,'addSettingsPage'));
    }

    private function getAction ($obj,$method) {
        return [$obj,$method];
    }

}