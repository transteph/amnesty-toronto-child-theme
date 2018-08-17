<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ) :
?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'twentyseventeen' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			
			</div>
		<?php }
		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
				<?php } if ( has_nav_menu( 'social' ) ) : ?>
									<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
										<?php
											wp_nav_menu( array(
												'theme_location' => 'social',
												'menu_class'     => 'social-links-menu',
												'depth'          => 1,
												'link_before'    => '<span class="screen-reader-text">',
												'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
											) );
										?>
										
									</nav><!-- .social-navigation -->
								<?php endif;?><p id="reg-info">
				Copyright © <?php echo date("Y"); ?> Amnesty International Toronto Organization. 
			</p>

			</div>
		
		


	</aside><!-- .widget-area -->

<?php endif; ?>
