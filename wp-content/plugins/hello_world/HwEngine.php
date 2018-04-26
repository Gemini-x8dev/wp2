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
    private $trees;

    function __construct()
    {
        $this->settings = new Settings();
        $this->misc = new Misc();
        $this->pages = new Page();
        $this->trees = new Trees();
    }

    public function init () {
        add_filter('the_content',$this->getAction($this->misc,'truncateString'));
        add_filter('the_content',$this->getAction($this->misc,'addHello'));
        add_action('admin_menu', $this->getAction($this->pages,'hw2018_options_page'));
        add_action('admin_init', $this->getAction($this->misc,'addStylestoAdmin'));
        add_action('init', $this->getAction($this->pages,'addCustomPostType'));
        add_action('init', $this->getAction($this->trees,'addTrees'));
        add_action('admin_init', $this->getAction($this->settings,'addANewSetting'));
        add_action( 'admin_menu', $this->getAction($this->settings,'addSettingsPage'));
        add_action('add_meta_boxes', $this->getAction($this->trees,'treesProperties'));
        add_action('save_post', $this->getAction($this->trees,'saveTreeProps'));
        add_action('pre_get_posts', $this->getAction($this->trees,'addTreesToTheMix'));
    }

    private function getAction ($obj,$method) {
        return [$obj,$method];
    }

}