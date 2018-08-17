<?php
/**
 * The template for displaying volunteer profile posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div id="vhr-header">
	<h1 id="vol-heading">VOICES FOR HUMAN RIGHTS</h1>
</div>
<div class="wrap vhr">
	<div id="primary" class="content-area">
		<main id="main vfhr" class="site-main" role="main">
			<?php


			/* Start the Loop */
			 while ( have_posts() ) : the_post();
				$do_not_duplicate[] = $post->ID; // Store post ID in array
				// Other loop actions could go here
				
			 


			 get_template_part( 'template-parts/post/content', get_post_format() );

			  // Ajax Load More
				$post__not_in = '';
				if($do_not_duplicate){
					$post__not_in = implode(',', $do_not_duplicate); 
				} 
				echo '<div class="ai-btn-contain">';
				echo do_shortcode('[ajax_load_more post__not_in="'.$post__not_in.'"  post_type="post" posts_per_page="1" category="voices-for-human-rights" progress_bar="true"  pause="true" progress_bar_color="ffff00" button_label="More posts"]</div>
				');

				endwhile; 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
<div id="white-box"></div>


<?php get_footer();
