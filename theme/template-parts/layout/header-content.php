<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

?>

<header id="masthead" class="bg-black border-t-magenta border-t-4 shadow">

	<div id="content-wrap" class="flex flex-col md:flex-row justify-between items-center mx-auto max-w-5xl p-4 text-center md:text-left text-white">
		<div class="site-branding flex items-center">
			<?php the_custom_logo();?>
			<div class="flex flex-col">
				<h1 class="site-title text-3xl font-extrabold mb-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				$magelang_description = get_bloginfo( 'description', 'display' );
				if ( $magelang_description || is_customize_preview() ) :
				?>
				<p class="site description text-sm"><?php echo $magelang_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div>
		</div><!-- .site-branding -->

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
	</div>
	
</header><!-- #masthead -->
