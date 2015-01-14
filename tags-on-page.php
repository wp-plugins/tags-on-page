<?php
/*
Plugin Name: Tags On Page
Version: 1.2
Author: CyberSEO.NET
Author URI: http://www.cyberseo.net/
Plugin URI: http://www.cyberseo.net/tags-on-page/
Description: Displays a list of tags (tag cloud) on the specified page.
*/

if (! function_exists ( "get_option" ) || ! function_exists ( "add_filter" )) {
	die ();
}

define ( 'TAGS_ON_PAGE_PAGE_TITLE', 'tags_on_page_page_title' );
define ( 'TAGS_ON_PAGE_NUMBER_OF_TAGS', 'tags_on_page_number_of_tags' );
define ( 'TAGS_ON_PAGE_SMALLEST_SIZE', 'tags_on_page_smallest_size' );
define ( 'TAGS_ON_PAGE_LARGEST_SIZE', 'tags_on_page_largest_size' );

function tags_on_page_set_option($option_name, $newvalue, $deprecated = '', $autoload = 'yes') {
	if (get_option ( $option_name ) === false) {
		add_option ( $option_name, $newvalue, $deprecated, $autoload );
	} else {
		update_option ( $option_name, $newvalue );
	}
}

function tags_on_page_options_menu() {
	if (function_exists ( 'add_options_page' )) {
		add_options_page ( __ ( 'Tags On Page' ), __ ( 'Tags On Page' ), 'manage_options', DIRNAME ( __FILE__ ) . '/tags-on-page-opt.php' );
	}
}

function tags_on_page_the_content($content) {
	$page = get_option ( TAGS_ON_PAGE_PAGE_TITLE );
	if ($page != '' && is_page ( $page )) {
		$content = wp_tag_cloud ( 'number=' . get_option ( TAGS_ON_PAGE_NUMBER_OF_TAGS ) . '&smallest=' . get_option ( TAGS_ON_PAGE_SMALLEST_SIZE ) . '&largest=' . get_option ( TAGS_ON_PAGE_LARGEST_SIZE ) . '&echo=false' );
	}
	return $content;
}

if (get_option ( TAGS_ON_PAGE_PAGE_TITLE ) === false) {
	tags_on_page_set_option ( TAGS_ON_PAGE_PAGE_TITLE, '' );
}

if (get_option ( TAGS_ON_PAGE_NUMBER_OF_TAGS ) === false) {
	tags_on_page_set_option ( TAGS_ON_PAGE_NUMBER_OF_TAGS, 0 );
}

if (get_option ( TAGS_ON_PAGE_SMALLEST_SIZE ) === false) {
	tags_on_page_set_option ( TAGS_ON_PAGE_SMALLEST_SIZE, 8 );
}

if (get_option ( TAGS_ON_PAGE_LARGEST_SIZE ) === false) {
	tags_on_page_set_option ( TAGS_ON_PAGE_LARGEST_SIZE, 22 );
}

if (is_admin ()) {
	add_action ( 'admin_menu', 'tags_on_page_options_menu' );
} else {
	add_filter ( 'the_content', 'tags_on_page_the_content' );
}
?>