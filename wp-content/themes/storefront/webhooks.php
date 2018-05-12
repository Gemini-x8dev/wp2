<?php
/*
 * Template Name: webhooks
 */

get_header();

$orders = Users::getOrders();
echo '    <ul class="uk-list uk-list-striped">';
foreach ($orders as $order) {
    ?>
        <li>
            <div class="uk-section uk-section-muted">
                <div class="uk-container">
                    <h3><?= $order->post_title ?></h3>
                </div>
            </div>
        </li>
    <?php
}
echo '</ul>';
get_footer();


