<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

?>

<header id="masthead" class="bg-magenta text-white flex justify-between items-end p-4">

	<div class="text-lg text-bold">
		<?php
		if ( is_front_page() ) :
			?>
			<h1><?php bloginfo( 'name' ); ?></h1>
			<?php
		else :
			?>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		endif;

		$magelang_description = get_bloginfo( 'description', 'display' );
		if ( $magelang_description || is_customize_preview() ) :
			?>
			<p><?php echo $magelang_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<?php endif; ?>
	</div>

	<nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'magelang' ); ?>">
		<button aria-controls="primary-menu" aria-expanded="false" class="hidden"><?php esc_html_e( 'Primary Menu', 'magelang' ); ?></button>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->
