<?php

class WordpressApi {

    public function actionHook ($tag = "", $function = "", $priority = "", $accepted_args = "") {

        add_filter(
            $tag,
            $function,
            $priority,
            $accepted_args
        );

    }

    public function filterHook ($tag = "", $function = "", $priority = "", $accepted_args = "") {

        add_filter(
            $tag,
            $function,
            $priority,
            $accepted_args
        );

    }

    public function addShortcode ($tag = "", $function = "") {

        add_shortcode(
            $tag,
            $function
        );

    }

}