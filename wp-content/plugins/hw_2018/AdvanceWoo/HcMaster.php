<?php

include_once dirname(__FILE__) . "/Autoload.php";

Autoload::classes(dirname(__FILE__) . "/Components/","",false);
Autoload::classes(dirname(__FILE__) . "/Models/","",false);

class HcMaster {

    private $wp;

    public function __construct()
    {
        $this->wp = new WordpressApi();
        $this->initActions();
        $this->initFilters();
        $this->initShortcodes();
        $this->enqueueScripts();

        Ajax::frontend([
            'handle' => 'hc_ajax_call',
            'object_name' => 'hw2018_welcome',
            'data' => array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'password' => 1234 ),
            'action' => 'change_password',
            'callback' => [Welcome::class,'changePassword']
        ]);
    }

    public function initActions () {
        $this->wp->actionHook('widgets_init',$this->getAction(Widget::class,'register'));
    }

    public function initFilters () {

    }

    public function initShortcodes () {
        $this->wp->addShortcode('hc_home_page',$this->getAction(HomePage::class,'get'));
        $this->wp->addShortcode('hc_products_of_the_month',$this->getAction(Frontend::class,'hoodies'));
        $this->wp->addShortcode('hc_woo_details',$this->getAction(Welcome::class,'welcomeMessage'));
    }

    public function getAction ($object, $method) {
        return [
            $object,
            $method
        ];
    }

    public function enqueueScripts () {
        add_action( 'wp_enqueue_scripts', [self::class,'assets'] );
    }

    function assets() {
        wp_enqueue_script('lol', Plugin::assetsUrl() . "/js/ajax.js", ['jquery']);
//        wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    }

}