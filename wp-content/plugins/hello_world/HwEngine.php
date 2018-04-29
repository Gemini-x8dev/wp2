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
    private $taxonomy;
    private $ajax;

    function __construct()
    {
        $this->settings = new Settings();
        $this->misc = new Misc();
        $this->pages = new Page();
        $this->trees = new Trees();
        $this->taxonomy = new Taxonomy();
        $this->ajax = new Ajax();
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
        add_action('init', $this->getAction($this->taxonomy,'resgiterTreeGroups'));
        add_action('init', $this->getAction($this->taxonomy,'registerTechGroup'));
        add_action("wp_ajax_my_user_vote", $this->getAction($this->ajax,"my_user_vote"));
        add_action("wp_ajax_nopriv_my_user_vote", $this->getAction($this->ajax,"my_must_login"));

        add_action("wp_ajax_my_page_views", $this->getAction($this->ajax,"my_page_views"));
        add_action("wp_ajax_nopriv_my_page_views", $this->getAction($this->ajax,"my_must_login"));

        add_action( 'wp_enqueue_scripts', $this->getAction($this->ajax,'addScripts'));
    }

    private function getAction ($obj,$method) {
        return [$obj,$method];
    }

}