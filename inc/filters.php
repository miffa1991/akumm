<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}


add_filter('excerpt_more', function($more) {
	return ' ';
});
add_filter( 'excerpt_length', function(){
	return 20;
} );
// Contact Form 7 remove auto added p tags
add_filter('wpcf7_autop_or_not', '__return_false');


add_filter('widget_text','do_shortcode');




add_action('get_header', 'rmyoast_ob_start');
add_action('wp_head', 'rmyoast_ob_end_flush', 100);
 
function rmyoast_ob_start() {
    ob_start('remove_yoast');
}
function rmyoast_ob_end_flush() {
    ob_end_flush();
}
function remove_yoast($output) {
    if (defined('WPSEO_VERSION')) {
        $output = str_ireplace('<!-- This site is optimized with the Yoast SEO plugin v' . WPSEO_VERSION . ' - https://yoast.com/wordpress/plugins/seo/ -->', '', $output);
        $output = str_ireplace('<!-- / Yoast SEO plugin. -->', '', $output);
    }
    return $output;
}


add_filter('acf/format_value/type=text', 'do_shortcode');


