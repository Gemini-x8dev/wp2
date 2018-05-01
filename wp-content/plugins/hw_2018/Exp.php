<?php

class Exp {

    public function doStuff ($id) {
        $order = get_post_meta($id);
        $order['_billing_email'] = ['hnda@infl.co'];
        update_post_meta($id,'',$order);
//        Misc::prettyPrint($order);
    }

    function triggerThis($post_ID){
        Misc::printToConsole("Hello ... ");
    }

}