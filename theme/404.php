<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Magelang
 */

get_header();
?>

<div id="content-wrap" class="mx-auto max-w-5xl">
	
	<section id="primary" class="w-full md:w-auto">
		<main id="main">

			<div class="my-6 py-12 mx-auto text-center">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'magelang' ); ?></h1>
					<span class="page-title-separator"></span>
				</header><!-- .page-header -->

				<div <?php magelang_content_class( 'page-content' ); ?>>
					<p><?php esc_html_e( 'This page could not be found. It might have been removed or renamed, or it may never have existed.', 'magelang' ); ?></p>
					<?php //get_search_form(); ?>
					<!-- TODO get latest posts -->
				</div><!-- .page-content -->
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

</div>

<?php
get_footer();
