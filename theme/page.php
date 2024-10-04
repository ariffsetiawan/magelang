<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

get_header();
?>

<div id="content-wrap" class="flex flex-col md:flex-row mx-auto max-w-5xl">

	<section id="primary" class="lg:w-2/3 m-4">
		<main id="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open, or we have at least one comment, load
				// the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside id="secondary" class="lg:w-1/3 m-4 my-12" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'magelang' ); ?>">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside>
	<?php endif; ?>

</div>

<?php
get_footer();
