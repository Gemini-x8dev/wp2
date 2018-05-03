<?php

include_once dirname(__FILE__) . "/Autoload.php";

Autoload::classes(dirname(__FILE__) . "/Components/","",false);
Autoload::classes(dirname(__FILE__) . "/Components/Experiments/","",false);

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
        $this->wp->actionHook('hc_everything_is_ready',$this->getAction(Welcome::class,'welcomeMessage'));
    }

    public function initFilters () {

    }

    public function initShortcodes () {
        $this->wp->addShortcode('hc_home_page',$this->getAction(HomePage::class,'get'));
    }

    public function getAction ($object, $method) {
        return [
            $object,
            $method
        ];
    }

}