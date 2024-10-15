<?php
/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

?>

<section class="my-4">

	<header class="page-header">
		<?php if ( is_search() ) : ?>

			<h1 class="page-title">
				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title text-center mt-20">%1$s <span>%2$s</span></h1>',
					esc_html__( 'Search results for:', 'magelang' ),
					get_search_query()
				);
				?>
			</h1>
			<span class="page-title-separator"></span>

		<?php else : ?>

			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'magelang' ); ?></h1>

		<?php endif; ?>
	</header><!-- .page-header -->

	<div <?php magelang_content_class( 'page-content' ); ?>>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

			<p>
				<?php esc_html_e( 'Your site is set to show the most recent posts on your homepage, but you haven&rsquo;t published any posts.', 'magelang' ); ?>
			</p>

			<p>
				<a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">
					<?php
					/* translators: 1: link to WP admin new post page. */
					esc_html_e( 'Add or publish posts', 'magelang' );
					?>
				</a>
			</p>

			<?php
		elseif ( is_search() ) :
			?>

			<p class="text-center">
				<?php esc_html_e( 'Your search generated no results. Please try a different search.', 'magelang' ); ?>
			</p>

			<div class="mx-auto text-center">	
			<?php
			get_search_form();
			?>
			</div>
		<?php else : ?>

			<p>
				<?php esc_html_e( 'No content matched your request.', 'magelang' ); ?>
			</p>

			<div class="mx-auto">	
			<?php
			get_search_form();
			?>
			</div>
		<?php endif; ?>
	</div><!-- .page-content -->

</section>
