<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:url" content="https://www.aito.ca" />
			<meta property="og:type" content="website" />
			<meta property="og:title" content="Amnesty International Toronto Organization (AITO)" />
			<meta property="og:description" content="Supporting Amnesty International groups, entities, networks, and members in the Greater Toronto Area." />
			<meta property="og:image" content="https://www.aito.ca/wp-content/uploads/2018/04/toronto-regional-meeting-2016-02-amnesty-international-aito.jpg" />
			<!-- sharing thumbnail image -->
			<link rel="image_src" href="https://www.aito.ca/wp-content/uploads/2018/04/toronto-regional-meeting-2016-02-amnesty-international-aito.jpg">
			<meta property="og:updated_time" content="<?=time()?>" />
			<meta attribute="author" content="Stephanie Tran, Amnesty International Toronto Organization" />
			<meta attribute="keywords" content="AITO, Amnesty, Amnesty International, Toronto, Amnesty International Toronto Organization, human rights" />


<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<meta name="google-site-verification" content="_USouJFEsffxpbELCqkKMsT4c_coYoODeQNZl-z9t54" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
            <a id="nav-logo"  href="https://aito.ca/"><img alt="Amnesty International Toronto Organization logo" src="https://www.aito.ca/wp-content/uploads/2018/04/AITO-LOGO.png" /></a> 
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
