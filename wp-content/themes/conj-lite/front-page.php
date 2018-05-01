<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 	mypreview-conj
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <p class="return-to-shop">
                <a class="button wc-backward" href="http://wp2.dev/shop/">Return to shop</a>
            </p>
            <pre>
            <?php
            print_r(get_post_meta(128));
            ?>
            </pre>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();