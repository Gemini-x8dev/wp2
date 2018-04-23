<?php get_header(); ?>
<div class="container">
    <div class="row">
    <?php
    if ( have_posts() ) {
        while (have_posts()) {
            the_post();
            ?>
            <div class="card-deck mb-3 col-md-4 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal"><?= the_title() ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <?= the_content() ?>
                            <?= the_date() ?>
                        </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
    </div>
</div>
<?= get_footer() ?>