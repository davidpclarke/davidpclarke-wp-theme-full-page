<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php
        if ( is_single() ) { 
        	single_post_title(); 
        } elseif ( is_home() || is_front_page() ) { 
        	bloginfo('name'); 
        	print ' | '; 
        	bloginfo('description');
        	get_page_number(); 
        } elseif ( is_page() ) { 
        	single_post_title(''); 
        } elseif ( is_search() ) { 
        	bloginfo('name'); 
        	print ' | Search results for ' . wp_specialchars($s); 
        	get_page_number(); 
        } elseif ( is_404() ) { 
        	bloginfo('name'); 
        	print ' | Not Found'; 
        }
        else { 
        	bloginfo('name'); 
        	wp_title('|'); 
        	get_page_number(); 
        }
    ?></title>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="author" content="David Clarke">

	<meta name="viewport" content="width=device-width">

	<!-- Google font for blog title and headings --
	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'> -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,200' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <?php 
    if ( is_singular() )
    	// Use threaded comments 
    	wp_enqueue_script( 'comment-reply' ); 
    ?>
 
    <?php 
    // Hook for plugins
    wp_head(); 
    ?>
 
 	<!-- Links for RSS feeds and pingbacks -->
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'my-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'my-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body>
<div id="wrapper" class="hfeed"> <?php //"hfeed" class tells bots that site publishes syndicated content like blog posts ?>
    <?php
    if ( is_home() || is_front_page() ) { 
    ?>
        <div id="home-container" role="main">
    <?php } else { ?>
        <div id="container" role="main">
    <?php } ?>
		<div id="header">
			<header>
				<?php
				// Set blog name as the H1 for the homepage
				if ( is_home() || is_front_page() ) { 
				?>
					<h1 id="blog-title"><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
				<?php } else { ?>
					<div id="blog-title"><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
					</div>
				<?php } ?>
			</header>
		</div>
