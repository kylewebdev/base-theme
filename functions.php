<?php

/**
 * _base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _base
 */

if (! defined('_BASE_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_BASE_VERSION', '1.0.0');
}

function _base_setup()
{
	/*
	* https://crunchify.com/how-to-clean-up-wordpress-header-section-without-any-plugin/
	*/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);
	remove_action('wp_head', 'wp_generator');

	function remove_revslider_meta_tag()
	{
		return '';
	}
	add_filter('revslider_meta_generator', 'remove_revslider_meta_tag');

	/**
	 * Remove Gutenberg Block Library CSS from loading on the frontend
	 */
	function wps_deregister_styles()
	{
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('global-styles');
	}
	add_action('wp_print_styles', 'wps_deregister_styles', 100);

	/**
	 * Disable the emoji's
	 * https://www.wpbeginner.com/plugins/how-to-disable-emojis-in-wordpress-4-2/
	 */
	function disable_emojis()
	{
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_filter('the_content_feed', 'wp_staticize_emoji');
		remove_filter('comment_text_rss', 'wp_staticize_emoji');
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
		add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
		add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
	}
	add_action('init', 'disable_emojis');

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 *
	 * @param array $plugins
	 * @return array Difference betwen the two arrays
	 */
	function disable_emojis_tinymce($plugins)
	{
		if (is_array($plugins)) {
			return array_diff($plugins, array('wpemoji'));
		} else {
			return array();
		}
	}

	/**
	 * Remove emoji CDN hostname from DNS prefetching hints.
	 *
	 * @param array $urls URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed for.
	 * @return array Difference betwen the two arrays.
	 */
	function disable_emojis_remove_dns_prefetch($urls, $relation_type)
	{
		if ('dns-prefetch' == $relation_type) {
			/** This filter is documented in wp-includes/formatting.php */
			$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

			$urls = array_diff($urls, array($emoji_svg_url));
		}

		return $urls;
	}

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support('title-tag');

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', '_base'),
		)
	);

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', '_base_setup');

/**
 * Enqueue scripts and styles.
 */
function _base_scripts()
{
	// Main css file
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/style.css', array(), _BASE_VERSION, 'all');
	wp_style_add_data('_s-style', 'rtl', 'replace');

	// Main js file
	wp_enqueue_script('theme-js', get_template_directory_uri() . '/dist/js/app.js', array('jquery'), _BASE_VERSION, array());
	wp_enqueue_script('react-init-js', get_template_directory_uri() . '/dist/js/react-init.js', array(), _BASE_VERSION, array('in_footer' => true));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', '_base_scripts');

/**
 * Custom login stylesheet
 */
function custom_login_styles() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/dist/css/login.css?v='. _BASE_VERSION .'" />';
}

add_action('login_head', 'custom_login_styles');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
