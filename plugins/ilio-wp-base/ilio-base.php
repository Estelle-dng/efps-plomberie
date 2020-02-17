<?php
/*
Plugin Name: Infinite Loop BASE - @Plugin Principal
Description: Plugin Infinite Loop BASE, Global plugin.
Author: Infinit Loop
Version: 1.0
Author URI: http://www.i-l.io/
*


/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @since 1.0
 */
class Ilio_Base_Load {

	/**
	 * PHP5 constructor method.
	 *
	 * @since 1.0
	 */
	function __construct() {

		/* Defines constants */
		self::define_constants();

		/* Include common function file. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_includes' ), 2 );

		/* Include acf fields. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_include_acf_fields' ), 3 );

		/* Initialize all globals Class */
		add_action( 'plugins_loaded', array( &$this, 'ilio_class_init' ), 4 );

		/* Load the admin files. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_admin' ), 5 );

		/* Load the frontend files. */
		add_action( 'plugins_loaded', array( &$this, 'frontend_init' ), 11 );
	}

	/**
	 * Defines constants used by the plugin.
	 *
	* @since 1.0
	 */
	static public function define_constants() {

		defined('ILIO_BASE_VERSION')
			|| define('ILIO_BASE_VERSION', '1.0');

		defined('ILIO_BASE_PLUGIN_NAME')
			|| define('ILIO_BASE_PLUGIN_NAME', basename(dirname(__FILE__)));

		defined('ILIO_BASE_PLUGIN_BASENAME')
			|| define('ILIO_BASE_PLUGIN_BASENAME', ILIO_BASE_PLUGIN_NAME . '/' . basename(__FILE__));

		defined('ILIO_BASE_PLUGIN_DIR')
			|| define('ILIO_BASE_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

		defined('ILIO_BASE_PLUGIN_URL')
			|| define('ILIO_BASE_PLUGIN_URL', untrailingslashit(plugins_url(ILIO_BASE_PLUGIN_NAME)));

		defined('ILIO_BASE_INCLUDES_DIR')
			|| define('ILIO_BASE_INCLUDES_DIR', ILIO_BASE_PLUGIN_DIR . '/includes');

		defined('ILIO_BASE_CLASSES_DIR')
			|| define('ILIO_BASE_CLASSES_DIR', ILIO_BASE_INCLUDES_DIR . '/classes');

		defined('ILIO_BASE_ADMIN_DIR')
			|| define('ILIO_BASE_ADMIN_DIR', ILIO_BASE_PLUGIN_DIR . '/admin');

		defined('ILIO_BASE_ADMIN_URL')
			|| define('ILIO_BASE_ADMIN_URL', ILIO_BASE_PLUGIN_URL . '/admin');

		defined('ILIO_BASE_TMP_DIR')
			|| define('ILIO_BASE_TMP_DIR', ILIO_BASE_PLUGIN_DIR . '/tmp');

		defined('ILIO_BASE_ADMIN_INCLUDES_DIR')
			|| define('ILIO_BASE_ADMIN_INCLUDES_DIR', ILIO_BASE_ADMIN_DIR . '/includes');

		defined('ILIO_BASE_FRONTEND_DIR')
			|| define('ILIO_BASE_FRONTEND_DIR', ILIO_BASE_PLUGIN_DIR . '/frontend');
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since 1.0
	 */
	function ilio_includes() {
		/* Load the plugin functions file. */
		require_once( ILIO_BASE_INCLUDES_DIR . '/common.php' );
		require_once( ILIO_BASE_CLASSES_DIR . '/class-master-common.php' );
		require_once( ILIO_BASE_CLASSES_DIR . '/class-ilio-security.php' );
	}

	/**
	 * Loads the initial files ACF Fields.
	 *
	 * @since 1.0
	 */
	function ilio_include_acf_fields() {
		require_once( ILIO_BASE_INCLUDES_DIR . '/acf-fields/acf-relationships.php' );
	}

	/**
	 * Init Globals Classes
	 *
	 * @since 1.0
	 */
	function ilio_class_init() {
		if (!class_exists('Ilio_Form')) {
            require_once( ILIO_BASE_CLASSES_DIR . '/class-form.php' );
            $ilio_form = new Ilio_Form();
		}
	}

	/**
	 * Loads the admin functions and files.
	 *
	 * @since 1.0
	 */
	function ilio_admin() {

		/* Only load files if in the WordPress admin. */
		if ( is_admin() ) {
			/* Load the main admin file. */
			require_once( ILIO_BASE_ADMIN_DIR . '/class-ilio-admin.php' );

		}
	}

	/**
	 * Include Frontend Class
	 *
	 * @since 1.0
	 */
	public function frontend_init() {

		/* Only load files if in the WordPress frontend. */
		if ( !is_admin() ) {
			require_once( ILIO_BASE_FRONTEND_DIR . '/class-ilio-frontend.php' );
			$class_ilio_frontend = new Ilio_Frontend();
		}
	}
}

$ilio_base_load = new Ilio_Base_Load();
