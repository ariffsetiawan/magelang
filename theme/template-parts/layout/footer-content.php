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

	<div class="p-4 border-t-2 border-b-2">
		<!-- <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<aside role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'magelang' ); ?>">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside>
		<?php endif; ?> -->

		<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
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
		<?php endif; ?>

	</div>

	<div class="p-4 text-center">
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
