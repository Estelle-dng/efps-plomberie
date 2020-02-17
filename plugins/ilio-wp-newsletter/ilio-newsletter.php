<?php
/*
Plugin Name: Infinite Loop - Newsletter
Description: Plugin Infinite Loop - Newsletter.
Author: Infinit Loop
Version: 1.0
Author URI: http://www.i-l.io/
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @since 1.0
 */
class Ilio_Newsletter_Load {
	/**
	 * PHP5 constructor method.
	 *
	 * @since 1.0
	 */
	function __construct() {
		self::define_constants();

		/* Include acf fields. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_include_acf_fields' ), 13 );

		/* Include common function file. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_nl_includes' ), 20 );

		/* Initialize all globals Class */
		add_action( 'plugins_loaded', array( &$this, 'ilio_nl_class_init' ), 30 );

		/* Load the admin files. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_nl_admin' ), 40 );

		/* Load the frontend files. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_nl_frontend' ), 50 );

		/* Register activation hook. */
		register_activation_hook( __FILE__, array( &$this, 'ilio_nl_activation' ) );

		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( &$this , 'ilio_nl_settings_action_links') );
	}

	/**
	 * Defines constants used by the plugin.
	 *
	* @since 1.0
	 */
	function define_constants() {
		defined('ILIO_NL_VERSION')
			|| define('ILIO_NL_VERSION', '1.0');

		defined('ILIO_NL_PLUGIN_NAME')
			|| define('ILIO_NL_PLUGIN_NAME', basename(dirname(__FILE__)));

		defined('ILIO_NL_PLUGIN_BASENAME')
			|| define('ILIO_NL_PLUGIN_BASENAME', ILIO_NL_PLUGIN_NAME . '/' . basename(__FILE__));

		defined('ILIO_NL_PLUGIN_DIR')
			|| define('ILIO_NL_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

		defined('ILIO_NL_PLUGIN_URL')
			|| define('ILIO_NL_PLUGIN_URL', untrailingslashit(plugins_url(ILIO_NL_PLUGIN_NAME)));

		defined('ILIO_NL_INCLUDES_DIR')
			|| define('ILIO_NL_INCLUDES_DIR', ILIO_NL_PLUGIN_DIR . '/includes');

		defined('ILIO_NL_FRONTEND_DIR')
			|| define('ILIO_NL_FRONTEND_DIR', ILIO_NL_PLUGIN_DIR . '/frontend');

		defined('ILIO_NL_FRONTEND_INCLUDES_DIR')
			|| define('ILIO_NL_FRONTEND_INCLUDES_DIR', ILIO_NL_FRONTEND_DIR . '/includes');

		defined('ILIO_NL_CLASSES_DIR')
			|| define('ILIO_NL_CLASSES_DIR', ILIO_NL_INCLUDES_DIR . '/classes');

		defined('ILIO_NL_ADMIN_DIR')
			|| define('ILIO_NL_ADMIN_DIR', ILIO_NL_PLUGIN_DIR . '/admin');

		defined('ILIO_NL_ADMIN_URL')
			|| define('ILIO_NL_ADMIN_URL', ILIO_NL_PLUGIN_URL . '/admin');
	}

	public function ilio_nl_settings_action_links($links) {
		$links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=parker-wp-newsletter%2Fadmin%2Fadmin.php') ) .'">' . __("Réglages","ilio") . '</a>';
	    return $links;
	}


	/**
	 * Init Global Class
	 *
	 * @since 1.0
	 */
	function ilio_nl_class_init() {
		global $ilio_nl;
		/* LOG Init */
		if (!class_exists('Ilio_Newsletter')) {
			require_once ILIO_NL_CLASSES_DIR . '/class-newsletter.php';
			$ilio_nl = new Ilio_Newsletter();
		}
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since 1.0
	 */
	function ilio_nl_includes() {

		/* Load the plugin functions file. */
		require_once( ILIO_NL_INCLUDES_DIR . '/common.php' );
	}

	/**
	 * Loads the frontend functions and files.
	 *
	 * @since 1.0
	 */
	function ilio_nl_frontend() {

		/* Only load files if in the WordPress admin. */
		if ( !is_admin() ) {
			global $class_ilio_newsletter_display;
            /* Load the main settings file. */
            require_once( ILIO_NL_FRONTEND_DIR . '/frontend.php' );
            $class_ilio_newsletter_display = new Ilio_Newsletter_Front_Init();
		}
	}

	/**
	 * Loads the initial files ACF Fields.
	 *
	 * @since 1.0
	 */
	function ilio_include_acf_fields() {
		require_once( ILIO_NL_INCLUDES_DIR . '/acf-fields/acf-newsletter.php' );
	}

	/**
	 * Method that runs only when the plugin is activated.
	 *
	 * @since 2.0
	 */
	function ilio_nl_activation() {
		if (!class_exists('Ilio_Newsletter_Install')) {
			require_once(ILIO_NL_INCLUDES_DIR . '/classes/class-db.php');
			$nl_db = new Ilio_Newsletter_Install();
			$nl_db->create_newsletter_table();
		}
	}

	/**
	 * Loads the admin functions and files.
	 *
	 * @since 2.0
	 */
	function ilio_nl_admin() {
		/* Load the main admin file. */
		require_once( ILIO_NL_ADMIN_DIR . '/admin.php' );
	}
}

$ilio_newsletter_Load = new Ilio_Newsletter_Load();