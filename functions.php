<?php

	// Enqueue parent theme stylesheet 
	function my_theme_enqueue_styles() {

		$parent_style = 'parent-style'; // This is 'twentyseveteen-style' for the Twenty Seventeen theme.

		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'child-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( $parent_style ),
			wp_get_theme()->get('Version')
		);
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

	/*
 * A simple function to control the number of Twenty Seventeen Theme Front Page Sections
 * Source: wpcolt.com
 */
if ( ! function_exists( 'wpc_custom_front_sections' ) ) {
	function wpc_custom_front_sections( $num_sections )
	{
		return 6; //Change this number to change the number of the sections.
	}
	add_filter( 'twentyseventeen_front_page_sections', 'wpc_custom_front_sections' );
}

/* Use custom editor stylesheet */
function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Button',  
			'block' => 'span',  
			'classes' => 'square-button',
			'wrapper' => true,
			
		)
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  

// add images to event list
function custom_widget_featured_image() {
	global $post;

	echo tribe_event_featured_image( $post->ID, false );
}
add_action( 'tribe_events_list_widget_before_the_event_title', 'custom_widget_featured_image' );

// automatically update plugins
add_filter( 'auto_update_plugin', '__return_true' );

add_filter( 'auto_update_theme', '__return_true' );

add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(STYLESHEETPATH  . "/single-{$cat->slug}.php") ) return STYLESHEETPATH  . "/single-{$cat->slug}.php"; } return $t;' ));

function wpdean_enqueue_icon_stylesheet() { 

wp_register_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css' ); 
wp_enqueue_style( 'fontawesome'); } 

add_action( 'wp_enqueue_scripts', 'wpdean_enqueue_icon_stylesheet' ); 






?>