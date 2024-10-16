<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magelang
 */

?>

<header id="masthead" class="bg-black border-t-primary border-t-4 shadow">

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
			<!-- Menu -->
			<?php
				wp_nav_menu([
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'hidden lg:flex space-x-4',
				'container'      => false,
				'walker'         => new Tailwind_Nav_Walker(),
				]);
			?>

			<!-- Mobile Menu Toggle -->
			<div class="block lg:hidden">
				<button class="text-white focus:outline-none" id="menu-toggle">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
					</svg>
				</button>
			</div>

			<!-- Mobile Menu -->
			<div id="mobile-menu" class="hidden lg:hidden fixed inset-y-0 left-0 w-96 bg-gray-900 text-white text-left transform -translate-x-full transition-transform duration-300 h-screen p-6 z-30">
				<div class="p-4">
					<button id="menu-close" class="text-white focus:outline-none float-right mt-4">
						<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
						</svg>
					</button>
				</div>
				<?php
					wp_nav_menu([
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'block space-y-2 mt-8',
					'container'      => false,
					]);
				?>
			</div>
		</nav><!-- #site-navigation -->
	</div>
	
</header><!-- #masthead -->
