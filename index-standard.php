		<?php get_header(); ?>
 
        <div id="content">
			<?php /* The Loop — with comments! */ ?>
			<?php while ( have_posts() ) : the_post() ?>
		 
			<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() */ ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php /* an h2 title */ ?>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'my-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<?php /* The entry content */ ?>
                <div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'my-theme' )  ); ?>
					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'my-theme' ) . '&after=</div>') ?>
                </div><!-- .entry-content -->

				<?php /* Microformatted category and tag links along with a comments link */ ?>
                <div class="entry-utility">
                    <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'my-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
                    on <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                    <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('and tagged ', 'my-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t\n" ) ?>
                </div><!-- #entry-utility -->
            </div><!-- #post-<?php the_ID(); ?> -->

			<?php /* Close up the post div and then end the loop with endwhile */ ?> 
			<?php endwhile; ?>

			<?php /* Bottom post navigation */ ?>
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
            <div id="nav-below" class="navigation">
                <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'my-theme' )) ?></div>
                <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'my-theme' )) ?></div>
            </div><!-- #nav-below -->
			<?php } ?>
        </div><!-- #content -->
 
        <div id="primary" class="widget-area">
        </div><!-- #primary .widget-area -->
 
        <div id="secondary" class="widget-area">
        </div><!-- #secondary -->

		<?php get_sidebar(); ?>
		<?php get_footer(); ?>     