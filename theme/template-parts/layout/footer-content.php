<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

?>

<footer id="colophon">

	<?php if (is_active_sidebar('footerwidget-1')) : ?>
	<div class="border-t-2">
		<div id="content-wrap" class="flex flex-row mx-auto max-w-5xl p-4 mt-4">	
			<div class="site-footer-widget-area widget-area">
				<?php dynamic_sidebar('footerwidget-1'); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
	<div class="border-t-2">
		<div id="content-wrap" class="flex flex-row mx-auto max-w-5xl p-4 justify-center">
			<nav aria-label="<?php esc_attr_e( 'Footer Menu', 'magelang' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav>
		</div>
	</div>
	<?php endif; ?>

	<div class="border-t-2 p-4 text-center">
		<?php

		esc_html_e( '&copy; Copyright ', 'magelang' );
        echo date_i18n( esc_html__( 'Y', 'magelang' ) );

        $magelang_blog_info = get_bloginfo( 'name' );
		if ( ! empty( $magelang_blog_info ) ) :
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
			<?php
		endif;

		esc_html_e( 'Developed by ', 'magelang' );
                echo '<a href="' . esc_url( 'https://arifsetiawan.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Arif Setiawan', 'magelang' ) . '</a>.';

		/* translators: 1: WordPress link, 2: WordPress. */
		printf(
			'<a href="%1$s"> Powered by %2$s</a>.',
			esc_url( __( 'https://wordpress.org/', 'magelang' ) ),
			'WordPress'
		);
		?>
	</div>

</footer><!-- #colophon -->
