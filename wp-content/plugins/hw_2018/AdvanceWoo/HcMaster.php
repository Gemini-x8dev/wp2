<?php

include_once dirname(__FILE__) . "/Autoload.php";

Autoload::classes(dirname(__FILE__) . "/Components/","",false);

class HcMaster {

    private $wp;

    public function __construct()
    {
        $this->wp = new WordpressApi();
        $this->initActions();
        $this->initFilters();
        $this->initShortcodes();
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

}