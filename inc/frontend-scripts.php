<?php
/*
 * Frontend scripts
 *
 * Enqueue theme's CSS and JS
 */

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

  // MailChimp's integration
  $mailchimp_integration_src = sprintf('%s/assets/js/mailchimp.js', get_template_directory());
  wp_enqueue_script( 'mailchimp-integration', $mailchimp_integration_src, array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'llp_frontend_scripts' );