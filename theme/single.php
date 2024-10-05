<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Magelang
 */

get_header();

if ( is_active_sidebar( 'sidebar-1' ) ): ?>
<div id="content-wrap" class="flex flex-col md:flex-row mx-auto max-w-5xl">	
	
	<section id="primary" class="lg:w-2/3 m-4">
<?php else: ?>
<div id="content-wrap" class="mx-auto max-w-5xl">
	
	<section id="primary" class="w-full md:w-auto">
<?php endif;?>
		<main id="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span aria-hidden="true">' . __( 'Next Post', 'magelang' ) . '</span> ' .
								'<span class="sr-only">' . __( 'Next post:', 'magelang' ) . '</span> <br/>' .
								'<span>%title</span>',
							'prev_text' => '<span aria-hidden="true">' . __( 'Previous Post', 'magelang' ) . '</span> ' .
								'<span class="sr-only">' . __( 'Previous post:', 'magelang' ) . '</span> <br/>' .
								'<span>%title</span>',
						)
					);
				}

				// If comments are open, or we have at least one comment, load
				// the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				// End the loop.
			endwhile;
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

</div>

<?php
get_footer();
