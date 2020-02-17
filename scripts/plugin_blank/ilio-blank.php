<?php
/*
Plugin Name: Infinite Loop : Blank
Author: Infinit Loop
Version: 1.0
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @since 1.0
 */
class Ilio_Blank {

    /**
     * PHP5 constructor method.
     *
     * @since 1.0
     */
    function __construct() {

        /* Defines constants */
        self::define_constants();


        add_filter('acf/load_field/name=relationship_base_field', array( &$this, 'acf_load_relationship_base_field_choices' ));

        /* Include acf fields. */
		add_action( 'plugins_loaded', array( &$this, 'ilio_include_acf_fields' ), 3 );

        /* Load the Custom Post Type "Resources"  */
        add_action( 'init', array( &$this, 'register_cpt_blank' ), 10 );
        /* Include common function file. */
        add_action( 'plugins_loaded', array( &$this, 'ilio_blank_include' ), 12 );
        /* Load the admin files. */
        add_action( 'plugins_loaded', array( &$this, 'ilio_blank_frontend' ), 13 );
        /* Register activation hook. */
        register_activation_hook( __FILE__, array( &$this, 'ilio_blank_initialize' ) );
        /* Register javascript */
        //add_action( 'wp_enqueue_scripts', array(&$this,'register_javascript'));
    }

    function register_javascript()
    {
        if (!is_admin()) {
            wp_enqueue_script('blankResources', ILIO_BLANK_PLUGIN_URL . '/includes/js/app.blank.js', array('jquery'), NULL, true);
        }
    }


    /*
     * Defines constants
     *
     * @since 1.0
     */
    static public function define_constants() {

        defined('ILIO_BLANK_VERSION')
            || define('ILIO_BLANK_VERSION', '1.0');

        defined('ILIO_BLANK_PLUGIN_NAME')
            || define('ILIO_BLANK_PLUGIN_NAME', basename(dirname(__FILE__)));

        defined('ILIO_BLANK_PLUGIN_BASENAME')
            || define('ILIO_BLANK_PLUGIN_BASENAME', ILIO_BLANK_PLUGIN_NAME . '/' . basename(__FILE__));

        defined('ILIO_BLANK_PLUGIN_DIR')
            || define('ILIO_BLANK_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

        defined('ILIO_BLANK_PLUGIN_URL')
            || define('ILIO_BLANK_PLUGIN_URL', untrailingslashit(plugins_url(ILIO_BLANK_PLUGIN_NAME)));

        defined('ILIO_BLANK_INCLUDES_DIR')
            || define('ILIO_BLANK_INCLUDES_DIR', ILIO_BLANK_PLUGIN_DIR . '/includes');

        defined('ILIO_BLANK_ADMIN_DIR')
            || define('ILIO_BLANK_ADMIN_DIR', ILIO_BLANK_PLUGIN_DIR . '/admin');

        defined('ILIO_BLANK_ADMIN_INCLUDES_DIR')
            || define('ILIO_BLANK_ADMIN_INCLUDES_DIR', ILIO_BLANK_ADMIN_DIR . '/includes');

        defined('ILIO_BLANK_ADMIN_INCLUDES_URL')
            || define('ILIO_BLANK_ADMIN_INCLUDES_URL', ILIO_BLANK_PLUGIN_URL . '/admin/includes/');

        defined('ILIO_BLANK_FRONTEND_DIR')
            || define('ILIO_BLANK_FRONTEND_DIR', ILIO_BLANK_PLUGIN_DIR . '/frontend');
    }


    /**
     * Method that runs only when the plugin is activated.
     *
     * @since 1.0
     */
    public function ilio_blank_initialize() {
        //if (!class_exists('Blank_Db')) {
        //    require_once( ILIO_BLANK_INCLUDES_DIR . '/classes/class-db.php');
        //    $blank_db = new Blank_Db();
        //}
    }

    /**
     * Include Frontend Class
     *
     * @since 1.0
     */
    public function ilio_blank_frontend() {

        /* Only load files if in the WordPress frontend. */
        if ( !is_admin() ) {
            /* Load the main settings file. */
            //require_once( ILIO_BLANK_INCLUDES_DIR . '/classes/class-blank.php' );
            require_once( ILIO_BLANK_FRONTEND_DIR . '/frontend.php' );
            $class_blank_display = new Ilio_Blank_Frontend();
        } else {
            require_once( ILIO_BLANK_ADMIN_DIR . '/admin.php');
        }
    }

    /**
     * Loads the initial files needed by the plugin.
     *
     * @since 1.0
     */
    public function ilio_blank_include() {
        /* Load the plugin functions file. */
        require_once( ILIO_BLANK_INCLUDES_DIR . '/common.php' );
    }

    /**
     * Load the Custom Post Type "Blank"
     *
     * @since 1.0
     */
    public function register_cpt_blank() {
        /* Include CPT creation file */
        //include_once( ILIO_BLANK_INCLUDES_DIR . '/blanks.post-type.php' );
    }

    public function acf_load_relationship_base_field_choices( $field ) {
        //$field['choices']['blank_listing'] = pll__('[Blank] Listing');
        return $field;
    }

    /**
	 * Loads the initial files ACF Fields.
	 *
	 * @since 1.0
	 */
	function ilio_include_acf_fields() {
		//require_once( ILIO_BLANK_INCLUDES_DIR . '/acf-fields/acf-blanks.php' );
	}

}

new Ilio_Blank();
