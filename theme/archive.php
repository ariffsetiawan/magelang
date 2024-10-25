<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

get_header();
?>
<div id="content-wrap" class="mx-auto max-w-2xl">

	<section id="primary" class="w-full md:w-auto m-4">
		<main id="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header my-4">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php
					// If this isn't search result, show an optional term description.
					if( ! is_search() ) :
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="page-description">%s</div>', $term_description );
						endif;
					endif;
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			magelang_the_posts_navigation();

		else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

</div>

<?php
get_footer();
