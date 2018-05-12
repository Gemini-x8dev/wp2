<?php

include_once dirname(__FILE__) . "/Autoload.php";

Autoload::classes(dirname(__FILE__) . "/Components/","",false);
Autoload::classes(dirname(__FILE__) . "/Models/","",false);
Autoload::classes(dirname(__FILE__) . "/Templates/","",false);

class HcMaster {

    public function __construct()
    {
        $this->initActions();
        $this->initFilters();
        $this->initShortcodes();
        $this->initAjax();
    }

    public function initActions () {
        add_action('widgets_init',[Widget::class,'register']);
        add_action('wp_enqueue_scripts',[self::class,'scripts']);
        add_action( 'storefront_header', [User::class,'dropDownWidget'], 50 );
    }

    public function initFilters () {
        add_filter( 'woocommerce_checkout_fields' , [WcCheckout::class,'customizeFields'] );
        add_filter( 'woocommerce_product_tabs', [Products::class,'recentReviews'], 98 );
    }

    public function initAjax () {
        Ajax::add('public','change_password',[Welcome::class,'changePassword']);
        Ajax::add('public','hw2018_store_review',[Welcome::class,'storeReview']);
        Ajax::add('public','hw2018_store_reviews_get',[Welcome::class,'getReview']);
    }

    public function initShortcodes () {
        add_shortcode('hc_home_page',[HomePage::class,'get']);
        add_shortcode('hc_products_of_the_month',[Frontend::class,'hoodies']);
        add_shortcode('hc_woo_details',[Welcome::class,'welcomeMessage']);
        add_shortcode('hc2018_playful_content',[Welcome::class,'hc2018PlayfulContent']);
    }

    function scripts() {
        wp_enqueue_script('hc2018_ajax',Plugin::assetsUrl() . "/js/ajax.js" ,['jquery'],"0.01",true);
        wp_enqueue_script('hc2018_utils',Plugin::assetsUrl() . "/js/utils.js" ,['jquery'],"0.01",true);
        wp_enqueue_script('hc2018_uikit_js',Plugin::assetsUrl() . "/js/uikit.min.js" ,['jquery'],"0.01",true);
        wp_enqueue_script('hc2018_uikit_icons_js',Plugin::assetsUrl() . "/js/uikit-icons.min.js" ,['jquery'],"0.01",true);
        wp_enqueue_style('hc2018_uikit_css',Plugin::assetsUrl() . "/css/uikit.min.css");
    }

    public function getAction ($object, $method) {
        return [
            $object,
            $method
        ];
    }

}