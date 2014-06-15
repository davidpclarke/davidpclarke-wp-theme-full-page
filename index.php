		<?php get_header(); ?>

<!--        <div id="content"> -->

<div id="content" class="js-masonry" data-masonry-options='{ "columnWidth": 235, "itemSelector": ".grid-post", "gutter": 5, "isFitWidth": true }'>

            <!-- Moved header inside container to inherit width set by Masonry
            <div id="header">
                <header>
                    <?php
                    // Set blog name as the H1 for the homepage (the article title will be the H1 for other pages)
                    if ( is_home() || is_front_page() ) { 
                    ?>
                        <h1 id="blog-title"><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
                    <?php } else { ?>
                        <div id="blog-title"><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
                        </div>
                    <?php } ?>
                </header>
            </div>
            -->

<div id="header" class="grid-post header">
    <header>
        <?php
        // Set blog name as the H1 for the homepage (the article title will be the H1 for other pages)
        if ( is_home() || is_front_page() ) { 
        ?>
            <h1 id="blog-title"><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
        <?php } else { ?>
            <div id="blog-title"><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
            </div>
        <?php } ?>
    </header>
</div>

			<?php 
            // Counter used for logic to customise first post
            $i = 0;

            while ( have_posts() ) : the_post() ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('grid-post'); ?>>

                <div class="block">

                    <?php 
                    if ( has_post_thumbnail() ) {
                    ?>
                        <a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'my-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
                        <?php  the_post_thumbnail( array(240,10000) ); ?>
                        </a>

                    <?php
                    } else {
                        // If there is no thumbnail, display title only
                    ?>

                        <a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'my-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
                            <img src="http://placehold.it/235/25AAE1/ffffff&text=<?php printf( __('%s', 'my-theme'), the_title_attribute('echo=0') ); ?>">
                        </a>

                    <?php
                    } 
                    ?>

                    <div class="hover_info">
                        <h2 class="grid-title">
                            <a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'my-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                    </div>
                </div>

            </div><!-- #post-<?php the_ID(); ?> -->

			<?php 
            $i++;
            endwhile; 
            ?>

        </div><!-- #content -->

        <?php /* Bottom post navigation */ ?>
        <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
            <div id="nav-below" class="navigation" style="clear: both;">
<!-- move style to CSS -->
                <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'my-theme' )) ?></div>
                <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'my-theme' )) ?></div>
            </div><!-- #nav-below -->
        <?php } ?>

        <!-- Vanilla Masonary fills gaps left by float in 'content' div --
        <script src="<?php echo site_url(); ?>/wp-includes/js/vanilla-masonry.js"></script>
        <script> window.onload = function() { var wall = new Masonry( document.getElementById( 'content' ) ); }; </script>
        -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>


		<?php get_footer(); ?>     