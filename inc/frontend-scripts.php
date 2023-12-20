<?php
/*
 * Frontend scripts
 *
 * Enqueue theme's CSS and JS
 */

add_action( 'wp_enqueue_scripts', 'llp_frontend_scripts' );
function llp_frontend_scripts(): void {
  // Parent theme's CSS
  wp_enqueue_style('twentytwentyfour', get_template_directory_uri() . '/style.css' );

	$third_party_styles = array(
		'google-fonts' => array(
			'src' => 'https://fonts.googleapis.com/css?family=Nothing+You+Could+Do',
		),
	);

	// Enqueue third party styles
	foreach($third_party_styles as $style_name => $style_data) {
		wp_enqueue_style($style_name, $style_data['src'], array(), null);
	}

	// Theme's CSS
	wp_enqueue_style('llp', get_stylesheet_directory_uri() . '/css/styles.min.css', array('twentytwentyfour'));
}

add_action( 'wp_head', 'llp_favicon');
function llp_favicon() {
	printf('<link rel="shortcut icon" type="image/jpg" href="%s/favicon.ico"/>', get_stylesheet_directory_uri(), );
}