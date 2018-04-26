<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <?php
            if ( have_posts() ) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="card-deck mb-3 text-center">
                        <div class="mb-4">
                            <div class="py-lg-2">
                                <h4 class="my-0 font-weight-normal"><?= the_title() ?></h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <?= the_content() ?>
                                    <?php (new Trees())->printTreeProps(get_the_ID()) ?>
                                    <?= the_date() ?>
                                </ul>
                                <a href="<?= get_site_url() ?>" type="button" class="btn btn-xs btn-info">Home</a>
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