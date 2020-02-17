<?php
/*
Plugin Name: Infinite Loop Theme
Description: Plugin Infinite Loop Theme
Author: Infinit Loop
Version: 1.0
Author URI: http://www.i-l.io/
*


/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @since 1.0
 */
class Ilio_Theme_Load {

	/**
	 * PHP5 constructor method.
	 *
	 * @since 1.0
	 */
	function __construct() {

		/* Defines constants */
		self::define_constants();

		add_filter('acf/load_field/name=relationship_base_field', array( &$this, 'acf_load_relationship_base_field_choices' ));

		/* Include common function file. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_includes' ), 10 );

		/* Include acf fields. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_include_acf_fields' ), 3 );

		/* Load the admin files. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_admin' ), 20 );

		/* Load the admin files. */
        add_action( 'plugins_loaded', array( &$this, 'ilio_frontend' ), 30 );

        // Disable Gutenberg for posts
        add_filter('use_block_editor_for_post', '__return_false', 10);

        // Disable Gutenberg for post types
        add_filter('use_block_editor_for_post_type', '__return_false', 10);

		add_action('init', array(&$this,'ilio_check_version'), 1000);
	}

	/**
	 * Defines constants used by the plugin.
	 *
	* @since 1.0
	 */
	static public function define_constants() {

		defined('ILIO_THEME_VERSION')
			|| define('ILIO_THEME_VERSION', '1.0');

		defined('ILIO_THEME_PLUGIN_NAME')
			|| define('ILIO_THEME_PLUGIN_NAME', basename(dirname(__FILE__)));

		defined('ILIO_THEME_PLUGIN_BASENAME')
			|| define('ILIO_THEME_PLUGIN_BASENAME', ILIO_THEME_PLUGIN_NAME . '/' . basename(__FILE__));

		defined('ILIO_THEME_PLUGIN_DIR')
			|| define('ILIO_THEME_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

		defined('ILIO_THEME_PLUGIN_URL')
			|| define('ILIO_THEME_PLUGIN_URL', untrailingslashit(plugins_url(ILIO_THEME_PLUGIN_NAME)));

		defined('ILIO_THEME_INCLUDES_DIR')
			|| define('ILIO_THEME_INCLUDES_DIR', ILIO_THEME_PLUGIN_DIR . '/includes');

		defined('ILIO_THEME_CLASSES_DIR')
			|| define('ILIO_THEME_CLASSES_DIR', ILIO_THEME_INCLUDES_DIR . '/classes');

		defined('ILIO_THEME_LOGS_DIR')
		    || define('ILIO_THEME_LOGS_DIR', ILIO_THEME_INCLUDES_DIR . '/logs');

		defined('ILIO_THEME_ADMIN_DIR')
			|| define('ILIO_THEME_ADMIN_DIR', ILIO_THEME_PLUGIN_DIR . '/admin');

		defined('ILIO_THEME_ADMIN_URL')
			|| define('ILIO_THEME_ADMIN_URL', ILIO_THEME_PLUGIN_URL . '/admin');

		defined('ILIO_THEME_ADMIN_INCLUDES_DIR')
			|| define('ILIO_THEME_ADMIN_INCLUDES_DIR', ILIO_THEME_ADMIN_DIR . '/includes');

		defined('ILIO_THEME_FRONTEND_DIR')
            || define('ILIO_THEME_FRONTEND_DIR', ILIO_THEME_PLUGIN_DIR . '/frontend');
	}


	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since 1.0
	 */
	function ilio_includes() {

		/* Load the plugin functions file. */
		require_once( ILIO_THEME_INCLUDES_DIR . '/common.php' );
	}

	/**
	 * Loads the admin functions and files.
	 *
	 * @since 1.0
	 */
	function ilio_admin() {
		/* Load the main admin file. */
		require_once( ILIO_THEME_ADMIN_DIR . '/class-ilio-theme-admin.php' );
	}

	/**
	 * Loads the initial files ACF Fields.
	 *
	 * @since 1.0
	 */
	function ilio_include_acf_fields() {
		require_once( ILIO_THEME_INCLUDES_DIR . '/acf-fields/acf-link.php' );
		require_once( ILIO_THEME_INCLUDES_DIR . '/acf-fields/acf-social.php' );
		require_once( ILIO_THEME_INCLUDES_DIR . '/acf-fields/acf-frontpage.php' );
		require_once( ILIO_THEME_INCLUDES_DIR . '/acf-fields/acf-menu-footer.php' );
		require_once( ILIO_THEME_INCLUDES_DIR . '/acf-fields/acf-header.php' );
		require_once( ILIO_THEME_INCLUDES_DIR . '/acf-fields/acf-google.php' );
	}

	/**
     * Include Frontend Class
     *
     * @since 1.0
     */
    public function ilio_frontend() {

        /* Only load files if in the WordPress frontend. */
        if ( !is_admin() ) {
            global $class_theme_display;
            /* Load the main settings file. */
            require_once( ILIO_THEME_FRONTEND_DIR . '/class-ilio-theme-frontend.php' );
            $class_theme_display = new Ilio_Theme_Frontend();
        }
    }

	public function acf_load_relationship_base_field_choices($field) {
		// Webhook
		$field['choices']['webhook'] = pll__('[Page] Webhook');

		return $field;
	}

	/**
	 * Update plugin version
	 */
	function ilio_check_version() {
		if (ILIO_THEME_VERSION != get_option('ilio_theme_version')) {
			$current_version = get_option('ilio_theme_version') ?: 1.0;

			update_option('ilio_theme_version', ILIO_THEME_VERSION);

//			if ($current_version <= '1.1') {
//				$this->update_ilio_theme_1_1();
//			}
		}
	}

	function update_ilio_theme_1_1() {
		/* Update code here */
	}
}

$ilio_theme_load = new Ilio_Theme_Load();
