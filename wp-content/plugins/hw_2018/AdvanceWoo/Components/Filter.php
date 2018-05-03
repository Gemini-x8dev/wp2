<?php

class Filter {

    public function hook ($tag = "", $function = "", $priority = "", $accepted_args = "") {

        add_filter(
            $tag,
            $function,
            $priority,
            $accepted_args
        );

    }

}