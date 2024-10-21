<?php
// Custom Front Page Template
get_header(); 

if ( is_active_sidebar( 'sidebar-1' ) ): ?>
<div id="content-wrap" class="flex flex-col md:flex-row mx-auto max-w-5xl">	

    <section id="primary" class="lg:w-2/3 md:w-1/2 m-4">
<?php else: ?>
<div id="content-wrap" class="mx-auto max-w-5xl">

    <section id="primary" class="w-full md:w-auto">
<?php endif;?>
        <main id="main">

        <?php
        if ( have_posts() ) {
            ?>
            <div class="front-page-content my-4">
                <h1>Custom Front Page</h1>
                <p>This is the content of the custom front-page.php template.</p>
            </div>

            <?php

            // Load posts loop.
            // while ( have_posts() ) {
            //     the_post();
            //     get_template_part( 'template-parts/content/content-excerpt' );
            // }

            // Previous/next page navigation.
            // magelang_the_posts_navigation();

        } else {

            // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content/content', 'none' );

        }
        ?>

        </main><!-- #main -->
    </section><!-- #primary -->

    <?php get_sidebar(); ?>

</div>

<?php
get_footer();