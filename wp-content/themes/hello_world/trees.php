<?php
/* Template Name: Trees */
get_header();
?>
<?php
$args = array( 'post_type' => 'trees', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <div class="card-footer mx-lg-5 px-lg-5 m-md-4">
        <div class="mb-4">
            <div class="py-lg-2">
                <h4 class="my-0 font-weight-normal"><?= the_title() ?></h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    author: <?= the_author() ?>
                    <?= the_content() ?>
                    <?php (new Trees())->printTreeProps(get_the_ID()) ?>
                    <?= the_date() ?>
                </ul>
                <a href="<?= the_permalink() ?>" type="button" class="btn btn-xs btn-info">check tree</a>
            </div>
        </div>
    </div>
    <?php
endwhile;
get_footer(); ?>