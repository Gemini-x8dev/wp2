<?php

include_once dirname(__FILE__) . "/Autoload.php";

Autoload::classes(dirname(__FILE__) . "/Components/","",false);
Autoload::classes(dirname(__FILE__) . "/Components/Experiments/","",false);

class HcMaster {

    private $action;
    private $filter;
    private $shortcode;

    public function __construct()
    {
        $this->action = new Action();
        $this->filter = new Filter();
        $this->initActions();
        $this->initFilters();
        $this->initShortcodes();
    }

    public function initActions () {
        $this->action->hook('hc_everything_is_ready',$this->getAction(Welcome::class,'welcomeMessage'));
    }

    public function initFilters () {

    }

    public function initShortcodes () {

    }

    public function getAction ($object, $method) {
        return [
            $object,
            $method
        ];
    }

}