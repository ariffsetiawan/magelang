<article <?php post_class('my-4'); ?>>
    <header>
        <?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large', ['class' => 'w-auto max-h-fit lg:mr-4 ml-0 lg:my-6 my-2']  ); ?>
		<?php endif; ?>

        <a href="<?php the_permalink(); ?>"><h2 class="entry-title"><?php the_title(); ?></h2></a>
    </header>

    <footer class="entry-footer">
		<?php magelang_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>