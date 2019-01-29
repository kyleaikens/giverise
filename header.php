<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <? if(is_page('create-confirm')) {
	// WP_Query arguments
	$args = array(
		'post_type' => 'protests',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => '1'
	);

	// The Query
	$query = new WP_Query( $args );
	// The Loop
		while ( $query->have_posts() ) { $query->the_post(); ?>

		<meta property='og:title' content='<?php the_title() ?>'/>
		<meta property='og:description' content='<?php the_title() ?>'/>
		<meta property='og:url' content='<?php the_permalink() ?>'/>
		<meta property='og:image' content='https://cdn.cnn.com/cnnnext/dam/assets/170121211838-28-womens-march-dc-exlarge-169.jpg'/>
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:title" content="<?php the_title() ?>" />
	<? } wp_reset_postdata();
	} ?>


	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=La+Belle+Aurore" rel="stylesheet"> 
	<?php gravity_form_enqueue_scripts(1,true) ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.jpg"/></a>
		</div>
		<nav id="site-navigation" class="main-navigation">
			<a href="#">Sponsor Activists</a>
			<a href="#">How It Works</a>
			<a href="/join-protest">Join a Protest</a> 

		</nav>
		<div class="rightside-menu">
			<? if ( is_user_logged_in() ) { ?>
				<? $current_user = wp_get_current_user(); ?>
			    <a class="myaccount" href="<?= wp_logout_url(get_permalink()); ?>"><?= $current_user->display_name; ?></a>
			<? } else { ?>
				<a class="signin" href="#">Sign In</a>
			<? } ?>
			
		</div>
	</header>

	<div id="content" class="site-content">
