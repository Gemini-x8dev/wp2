<?php

class Console {

    public static function error ($message) {
        ?>
        <script>console.error('<?= $message ?>')</script>
        <?php
    }

    public static function warn ($message) {
        ?>
        <script>console.warn('<?= $message ?>')</script>
        <?php
    }

    public static function info ($message) {
        ?>
        <script>console.info('<?= $message ?>')</script>
        <?php
    }

}