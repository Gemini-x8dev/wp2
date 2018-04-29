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

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
			
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_pagination( apply_filters( 'mypreview_conj_lite_post_pagination_args', array(
				'prev_text' => '<span class="screen-reader-text">' . __( 'Previous page', 'conj-lite' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'conj-lite' ) . '</span>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'conj-lite' ) . ' </span>',
			) ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
            <p class="return-to-shop">
                <a class="button wc-backward" href="http://wp2.dev/shop/">
                    Return to shop		</a>
            </p>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();