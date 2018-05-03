<?php

class Action {

    public function hook ($tag = "", $function = "", $priority = "", $accepted_args = "") {

        add_action(
            $tag,
            $function,
            $priority,
            $accepted_args
        );

    }

}