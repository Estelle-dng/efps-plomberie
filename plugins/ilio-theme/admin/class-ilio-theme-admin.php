<?php
/**
 * Admin settings Plugin Init
 *
 * @package WordPress
 * @subpackage Infinite Loop Theme
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_THEME_VERSION')) exit;

/**
 * @since 1.0
 */
class Ilio_Theme_Admin {
	function __construct() {
		/* Admin menu */
		$this->_add_acf_menu_option();
	}

	protected function _add_acf_menu_option() {
	    acf_add_options_page(array(
			'page_title' 	=> __('Header theme'),
			'menu_title'	=> __('En Tête'),
			'menu_slug' 	=> 'header-settings_option_lang',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'theme-general-settings'
		));
		acf_add_options_page(array(
			'page_title' 	=> __('Footer theme'),
			'menu_title'	=> __('Pied de page'),
			'menu_slug' 	=> 'footer-settings_option_lang',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'theme-general-settings'
		));
		acf_add_options_page(array(
			'page_title' 	=> __('Social theme'),
			'menu_title'	=> __('Social'),
			'menu_slug' 	=> 'social-settings',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'theme-general-settings'
		));
		acf_add_options_page(array(
			'page_title' 	=> __('Page Google'),
			'menu_title'	=> __('Google Configuration'),
			'menu_slug' 	=> 'page-google-settings',
			'capability'	=> 'activate_plugins',
			'parent_slug'	=> 'theme-general-settings'
		));
	}
}

new Ilio_Theme_Admin();