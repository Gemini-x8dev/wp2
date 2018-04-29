<?php
/* Template Name: Http */
get_header();
$response = wp_remote_get( 'https://reqres.in/api/users?per_page=500' );
$data = json_decode(wp_remote_retrieve_body($response))->data;
?>
<div class="row">
<?php
foreach ($data as $d) {
    ?>
    <div class="card col-md-3 m-md-5">
        <img class="card-img-top" src="<?= $d->avatar ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $d->first_name ?> <?= $d->last_name ?></h5>
        </div>
    </div>
<?php } ?>

</div>
<?php get_footer(); ?>
