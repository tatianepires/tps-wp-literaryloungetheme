<?php
/**
 * @summary        filters an enqueued script tag and adds a noscript element after it
 *
 * @description    filters an enqueued script tag (identified by the $handle variable) and
 *                 adds a noscript element after it. If there is also an inline script enqueued
 *                 after $handled, adds the noscript element after it.
 *
 * @access    public
 * @param     string    $tag       The tag string sent by `script_loader_tag` filter on WP_Scripts::do_item
 * @param     string    $handle    The script handle as sent by `script_loader_tag` filter on WP_Scripts::do_item
 * @param     string    $src       The script src as sent by `script_loader_tag` filter on WP_Scripts::do_item
 * @return    string    $tag       The filter $tag variable with the noscript element
 */
function llp_script_addon_filter($tag, $handle, $src){
	// as this filter will run for every enqueued script
	// we need to check if the handle is equals the script
	// we want to filter. If yes, than adds the noscript element
	if ( 'google-fonts' === $handle ){
		$preload = '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
		$tag = $tag . $preload;
	}
	return $tag;
}
// adds the llp_script_addon_filter function to the script_loader_tag filters
// it must use 3 as the last parameter to make $tag, $handle, $src available
// to the filter function
add_filter('script_loader_tag', 'llp_script_addon_filter', 10, 3);

/*
 * Based on https://wordpress.stackexchange.com/questions/281587/does-wordpress-wp-enqueue-style-support-noscript
 */