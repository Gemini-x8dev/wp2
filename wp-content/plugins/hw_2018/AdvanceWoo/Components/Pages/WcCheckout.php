<?php

class WcCheckout {

    public static function customizeFields ($fields) {
        $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
        unset($fields['billing']['billing_company']);
        unset($fields['billing']['billing_phone']);
        unset($fields['billing']['billing_city']);
        unset($fields['billing']['billing_address_2']);
        unset($fields['billing']['billing_postcode']);
        unset($fields['billing']['billing_state']);
        unset($fields['shipping']['shipping_company']);
        unset($fields['shipping']['shipping_phone']);
        unset($fields['shipping']['shipping_postcode']);
        unset($fields['shipping']['shipping_state']);
        return $fields;
    }

}