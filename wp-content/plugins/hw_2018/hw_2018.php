<?php
/*
Plugin Name: WP2 Addons
Description: Utilizing plugins hooks. Everything will be handled from this single point.
Author: HW
version: 0.0.1
*/

include_once dirname(__FILE__) . "/AdvanceWoo/HcMaster.php";

class PluginHooks {

    public static function plug () {
        self::addReviewsTable();
        self::populateReviewsTable();
        flush_rewrite_rules();
    }

    public static function unplug () {
        self::removeReviewsTable();
        flush_rewrite_rules();
    }

    public static function flush () {
        echo 'I am uninstalled..';
    }

    public static function addReviewsTable () {
        global $wpdb;

        $table_name = $wpdb->prefix . 'hw_reviews';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		review text NOT NULL,
		stars int(10) DEFAULT 0 NOT NULL,
		PRIMARY KEY  (id)
	    ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        dbDelta( $sql );
    }

    public static function populateReviewsTable () {
        global $wpdb;

        $reviews = [
            [
                'name' => 'Joe',
                'review' => 'Excellent! eh',
                'stars' => 1
            ],
            [
                'name' => 'Gill',
                'review' => 'Wow! Thats some eh',
                'stars' => 3
            ]
        ];

        $table_name = $wpdb->prefix . 'hw_reviews';
        foreach ($reviews as $review) {
            $wpdb->insert(
                $table_name,
                array(
                    'time' => current_time( 'mysql' ),
                    'name' => $review['name'],
                    'review' => $review['review'],
                    'stars' => $review['stars'],
                )
            );
        }
    }

    public static function removeReviewsTable () {

        global $wpdb;

        $table_name = $wpdb->prefix . 'hw_reviews';

        $wpdb->query( "DROP TABLE IF EXISTS $table_name" );

    }

}

register_activation_hook(__FILE__,['PluginHooks','plug']);
register_deactivation_hook(__FILE__,['PluginHooks','unplug']);
register_uninstall_hook(__FILE__,['PluginHooks','flush']);

new HcMaster();