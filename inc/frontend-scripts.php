<?php
/*
 * Frontend scripts
 *
 * Enqueue theme's CSS and JS
 */

function llp_frontend_scripts() {
  // Parent theme's CSS
  wp_enqueue_style('twentytwentyfour', get_template_directory_uri() . '/style.css' );

  // MailChimp's integration
  $mailchimp_integration_src = sprintf('%s/assets/js/mailchimp.js', get_template_directory());
  wp_enqueue_script( 'mailchimp-integration', $mailchimp_integration_src, array(), false, false );
}
add_action( 'wp_enqueue_scripts', 'llp_frontend_scripts' );