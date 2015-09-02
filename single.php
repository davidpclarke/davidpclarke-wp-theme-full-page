<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * davidpclarke: Theme for individual blog posts
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>

<?php get_header(); ?>

<div id="content">

        <?php the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php $postid = get_the_ID(); ?>
                <h1 class="entry-title <?php echo get_post_meta($postid, "Hero background", true); ?>"><a href="/">.. </a>/ <?php the_title(); ?></h1>

                <?php the_content(); ?>

                <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'my-theme' ) . '&after=</div>') ?>

                <div class="entry-utility">
                        <?php 
                        printf( __( 'Posted in %1$s%2$s.', 'my-theme' ),
                                get_the_category_list(', '),
                                get_the_tag_list( __( ' and tagged ', 'my-theme' ), ', ', '' ),
                                get_permalink(),
                                the_title_attribute('echo=0'),
                                comments_rss() ) ?>
                </div><!-- .entry-utility -->
        </div><!-- #post-<?php the_ID(); ?> -->           

        <div id="nav-below" class="navigation">
                <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
                <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
        </div><!-- #nav-below -->                 

        <?php 
                // comments_template('', true); 
        ?>
</div><!-- #content -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>