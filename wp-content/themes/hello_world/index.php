<?php get_header(); ?>
<div class="container">
    <div class="row">
    <?php
    $rows_counter = 0;
    if ( have_posts() ) {
        while (have_posts()) {
            the_post();
            $rows_counter++;
            ?>
            <div class="card col-md-3 m-3">
                <?= the_post_thumbnail('medium','hello') ?>
                <div class="card-body">
                    <h5 class="card-title"><?= the_title() ?></h5>
                    <p class="card-text">
                        <?= the_content() ?>
                        <?= the_date() ?>
                    </p>
                    <a href="<?= the_permalink() ?>" class="btn btn-primary">Visit</a>
                </div>
            </div>
            <?php
            if ($rows_counter % 3 === 0) {
                ?>
                </div>
                <div class="row">
                <?php
            }
        }
    }
    ?>
    </div>
</div>
<?= get_footer() ?>