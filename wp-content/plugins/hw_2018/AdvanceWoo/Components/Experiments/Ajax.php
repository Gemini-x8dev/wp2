<?php

class Ajax {

    public static function backend ($config) {
        self::jsObject($config);
        add_action( 'wp_ajax_' . $config['action'], $config['callback'] );
    }

    public static function frontend ($config) {
        self::jsObject($config);
        add_action( 'wp_ajax_' . $config['action'], $config['callback'] );
        add_action( 'wp_ajax_nopriv_' . $config['action'], $config['callback'] );
    }

    public static function jsObject ($config) {
        ?>
        <script>
            var <?= $config['object_name'] ?> = <?= json_encode($config['data']) ?>;
        </script>
        <?php
    }

}