<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

?>

<header id="masthead" class="bg-black text-white flex flex-col md:flex-row justify-between items-center p-8 border-t-magenta border-t-4 shadow text-center md:text-left">

	<div class="text-lg">
		<h1 class="text-3xl font-extrabold mb-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
		$magelang_description = get_bloginfo( 'description', 'display' );
		if ( $magelang_description || is_customize_preview() ) :
		?>
		<p class="text-sm"><?php echo $magelang_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<?php endif; ?>
	</div>

	<nav id="site-navigation" class="mt-4 md:mt-0" aria-label="<?php esc_attr_e( 'Main Navigation', 'magelang' ); ?>">
		<button class="sm:hidden mb-4" aria-controls="primary-menu" aria-expanded="false">
			<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<title>Mobile menu</title>
				<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
			</svg>
		</button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'	 =>	'list-reset hidden sm:flex text-lg sm:li-pl-4 li-pb-4 md:li-pb-0',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->
