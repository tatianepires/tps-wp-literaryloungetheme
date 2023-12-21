<?php
/*
 * Customize logo and text
 */
add_action( 'login_enqueue_scripts', 'llp_custom_login_image' );
function llp_custom_login_image() {
    $img_url = sprintf('%s/assets/img/logo-128x128.png', get_stylesheet_directory_uri());
    $img_size = '128px';
    echo <<< STYLE_BLOCk
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Nothing+You+Could+Do');
        #login h1 a, .login h1 a {
            font-family: 'Nothing You Could Do', cursive;
            font-size: 2rem;
            font-weight: bold;
            text-indent: unset;
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
