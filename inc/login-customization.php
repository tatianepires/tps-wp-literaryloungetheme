<?php
/*
 * Customize logo
 */
add_action('login_head', 'llp_custom_login_style');
function llp_custom_login_style() {
	$style_src = sprintf('%s/assets/css/login.min.css', get_stylesheet_directory_uri());
	wp_register_style('llp_login_style', $style_src);
	wp_enqueue_style("llp_login_style");
}

add_action( 'login_enqueue_scripts', 'llp_custom_login_image' );
function llp_custom_login_image() {
    $img_url = sprintf('%s/assets/img/logo-128x128.png', get_stylesheet_directory_uri());
    $img_size = '128px';
    echo <<< STYLE_BLOCk
        <style>
        #login h1 a, .login h1 a {
            background-image: url($img_url);
            width: $img_size;
            height: $img_size;
            background-size: $img_size $img_size;
            background-repeat: no-repeat;
            padding-top: $img_size;
        }
        #login h1 a, .login h1 a:focus,
        #login h1 a, .login h1 a:hover {
            border: none;
            outline: 0 !important;
        }
    </style>
    STYLE_BLOCk;
}

/*
 * Customize URL
 */
add_filter( 'login_headerurl', 'llp_login_url' );
function llp_login_url() {
	return home_url();
}

/*
 * Customize URL title
 */
add_filter( 'login_headertext', 'llp_login_url_title' );
function llp_login_url_title() {
	return get_bloginfo('name');
}
