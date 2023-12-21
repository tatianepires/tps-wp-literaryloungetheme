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
			'src' => 'https://fonts.googleapis.com/css?family=Nothing+You+Could+Do&display=swap',
		),
	);

	// Enqueue third party styles
	foreach($third_party_styles as $style_name => $style_data) {
		wp_enqueue_style($style_name, $style_data['src'], array(), null);
	}

	// Theme's CSS
	$style_src = sprintf('%s/assets/css/styles.min.css', get_stylesheet_directory_uri());
	wp_enqueue_style('llp', $style_src, array('twentytwentyfour'));
}

add_action( 'wp_head', 'llp_favicon');
function llp_favicon(): void {
	printf('<link rel="shortcut icon" type="image/jpg" href="%s/favicon.ico"/>', get_stylesheet_directory_uri());
}

add_action( 'admin_head', 'llp_favicon_admin' );
function llp_favicon_admin(): void {
	printf('<link rel="shortcut icon" type="image/jpg" href="%s/favicon.ico"/>', get_stylesheet_directory_uri());
}
