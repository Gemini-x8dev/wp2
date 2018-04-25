<?php
/*
 * The guy responsible for all cherad on wordpress
 * */

class REST {
    public function getOptions () {
        return Options::getAll();
    }
}