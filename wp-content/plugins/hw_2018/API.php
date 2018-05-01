<?php

class API {

    private $exp;

    function __construct()
    {
        $this->exp = new Exp();

        $this->hookToFilter('hw_2018_add_stuff','themeFooter');
        $this->hookToAction('wp_enqueue_scripts','AddStuffToTheme');
        $this->hookToAction('hw_2018_theme_functions','themeFiltersActions');
        add_action('woocommerce_order_actions_start',[$this->exp,'doStuff']);
        add_action( 'woocommerce_process_shop_order_meta', [$this->exp,'triggerThis']);
        add_shortcode('shortcode_sample_1', [$this,'form_creation']);
    }

    function hookToAction ($name,$method) {
        add_action($name,[$this,$method]);
    }

    function hookToFilter ($name,$method) {
        add_filter($name,[$this,$method]);
    }

    public function themeFooter () {
        echo bloginfo('site_url');
    }

    public function AddStuffToTheme () {
        wp_enqueue_script('scripts',plugin_dir_url(__FILE__) . "js/scripts.js",null,'0.1',true);
        wp_enqueue_style('styles',plugin_dir_url(__FILE__) . "css/hw_styles.css",null,'0.1',true);
    }

    public function themeFiltersActions () {
        $this->hookToFilter( 'woocommerce_checkout_fields' , 'removeCheckoutFields' );
        $this->hookToAction( 'woocommerce_after_order_notes' , 'addCheckoutFields' );
        $this->hookToAction( 'woocommerce_checkout_process' , 'my_custom_checkout_field_process' );
        $this->hookToAction( 'woocommerce_checkout_update_order_meta' , 'my_custom_checkout_field_update_order_meta' );
        $this->hookToAction( 'woocommerce_admin_order_data_after_billing_address' , 'addToOrderDetails' );
    }

    // Our hooked in function - $fields is passed via the filter!
    function removeCheckoutFields( $fields ) {
//        $this->prettyPrint($fields);
        unset($fields['billing']['billing_city']);
        unset($fields['billing']['billing_state']);
        unset($fields['billing']['billing_postcode']);
        return $fields;
    }

    function addCheckoutFields ($checkout) {

        echo '<div id="my_custom_checkout_field"><h2>' . __('My Field') . '</h2>';

        woocommerce_form_field( 'my_field_name', array(
            'type'          => 'text',
            'required'      => true,
            'class'         => array('my-field-class form-row-wide'),
            'label'         => __('Fill in this field'),
            'placeholder'   => __('Enter something'),
        ), $checkout->get_value( 'my_field_name' ));

        echo '</div>';
    }

    function my_custom_checkout_field_process() {
        // Check if set, if its not set add an error.
        if ( ! $_POST['my_field_name'] )
            wc_add_notice( __( 'Please enter something into this new shiny field.' ), 'error' );
    }

    function my_custom_checkout_field_update_order_meta( $order_id ) {
        if ( ! empty( $_POST['my_field_name'] ) ) {
            update_post_meta( $order_id, 'My Field', sanitize_text_field( $_POST['my_field_name'] ) );
        }
    }

    function addToOrderDetails ($order) {
        $oda = $order->get_meta_data();
        $myfield = isset($oda[0]) ? $oda[0]->value : '';
        echo 'My Field : ' . $myfield;
    }

    function prettyPrint ($stuff) {
        echo '<pre>';
        print_r($stuff);
    }

    function form_creation(){
        ?>
        <div id="order_review" class="woocommerce-checkout-review-order">
            <h3 class="conj-wc-checkout-order-review__heading">Your order</h3>
            <table class="shop_table woocommerce-checkout-review-order-table">
                <thead>
                <tr>
                    <th class="product-name">Product</th>
                    <th class="product-total">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr class="cart_item">
                    <td class="product-name">
                        Single&nbsp;
                        <strong class="product-quantity">× 1</strong>													</td>
                    <td class="product-total">
                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">د.إ</span>2.00</span>						</td>
                </tr>
                </tbody>
                <tfoot>

                <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">د.إ</span>2.00</span></td>
                </tr>

                <tr class="order-total">
                    <th>Total</th>
                    <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">د.إ</span>2.00</span></strong> </td>
                </tr>
                </tfoot>
            </table>

            <div id="payment" class="woocommerce-checkout-payment">
                <ul class="wc_payment_methods payment_methods methods">
                    <li class="wc_payment_method payment_method_wctelr">
                        <input id="payment_method_wctelr" type="radio" class="input-radio" name="payment_method" value="wctelr" checked="checked" data-order_button_text="Proceed to Telr">

                        <label for="payment_method_wctelr">
                            Credit/Debit Card 	</label>
                        <div class="payment_box payment_method_wctelr">
                            <p>Pay using a credit or debit card via Telr Secure Payments<iframe style="width:1px;height:1px;visibility:hidden;display:none;" src="https://secure.telrcdn.com/preload.html"></iframe></p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_ppec_paypal">
                        <input id="payment_method_ppec_paypal" type="radio" class="input-radio" name="payment_method" value="ppec_paypal" data-order_button_text="Continue to payment">

                        <label for="payment_method_ppec_paypal">
                            PayPal Express Checkout <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png" alt="PayPal Express Checkout">	</label>
                        <div class="payment_box payment_method_ppec_paypal" style="display:none;">
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                        </div>
                    </li>
                </ul>
                <div class="form-row place-order">
                    <noscript>
                        Since your browser does not support JavaScript, or it is disabled, please ensure you click the &amp;lt;em&amp;gt;Update Totals&amp;lt;/em&amp;gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so.			&lt;br/&gt;&lt;button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals"&gt;Update totals&lt;/button&gt;
                    </noscript>

                    <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Proceed to Telr</button>

                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="67f3192954"><input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">	</div>
            </div>

        </div>
        <?php
    }
}