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

if ( is_active_sidebar( 'sidebar-1' ) ): ?>
<div id="content-wrap" class="flex flex-col md:flex-row mx-auto max-w-5xl">	
	
	<section id="primary" class="lg:w-2/3 md:w-1/2 m-4">
<?php else: ?>
<div id="content-wrap" class="mx-auto max-w-5xl">
	
	<section id="primary" class="w-full md:w-auto">
<?php endif;?>
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

	<?php get_sidebar(); ?>

</div>

<?php
get_footer();
