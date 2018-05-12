<?php

class Reviews {

    const name = 'hw_reviews';

    public static function get ($id = null) {
        global $wpdb;
        $table_name = $wpdb->prefix . self::name;

        $row = $wpdb->get_results( "SELECT * FROM $table_name WHERE id=$id");
        return $row;
    }

    public static function all () {
        global $wpdb;
        $table_name = $wpdb->prefix . self::name;

        $rows = $wpdb->get_results( "SELECT * FROM $table_name");
        return $rows;
    }

    public static function create ($review) {
        global $wpdb;

        $table_name = $wpdb->prefix . self::name;

        return $wpdb->insert(
            $table_name,
            $review
        );
    }

}