<?php
/*
Plugin Name: Infinite Loop : Blocks
Author: Infinit Loop
Version: 1.0
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @since 1.0
 */
class Ilio_Blocks {

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
        add_action( 'init', array( &$this, 'register_cpt_blocks' ), 10 );
        /* Include common function file. */
        add_action( 'plugins_loaded', array( &$this, 'ilio_blocks_include' ), 12 );
        /* Load the admin files. */
        add_action( 'plugins_loaded', array( &$this, 'ilio_blocks_frontend' ), 13 );
        /* Register activation hook. */
        register_activation_hook( __FILE__, array( &$this, 'ilio_blocks_initialize' ) );
        /* Register javascript */
        //add_action( 'wp_enqueue_scripts', array(&$this,'register_javascript'));
    }

    function register_javascript()
    {
        if (!is_admin()) {
            wp_enqueue_script('blocksResources', ILIO_BLOCKS_PLUGIN_URL . '/includes/js/app.blocks.js', array('jquery'), NULL, true);
        }
    }


    /*
     * Defines constants
     *
     * @since 1.0
     */
    static public function define_constants() {

        defined('ILIO_BLOCKS_VERSION')
            || define('ILIO_BLOCKS_VERSION', '1.0');

        defined('ILIO_BLOCKS_PLUGIN_NAME')
            || define('ILIO_BLOCKS_PLUGIN_NAME', basename(dirname(__FILE__)));

        defined('ILIO_BLOCKS_PLUGIN_BASENAME')
            || define('ILIO_BLOCKS_PLUGIN_BASENAME', ILIO_BLOCKS_PLUGIN_NAME . '/' . basename(__FILE__));

        defined('ILIO_BLOCKS_PLUGIN_DIR')
            || define('ILIO_BLOCKS_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

        defined('ILIO_BLOCKS_PLUGIN_URL')
            || define('ILIO_BLOCKS_PLUGIN_URL', untrailingslashit(plugins_url(ILIO_BLOCKS_PLUGIN_NAME)));

        defined('ILIO_BLOCKS_INCLUDES_DIR')
            || define('ILIO_BLOCKS_INCLUDES_DIR', ILIO_BLOCKS_PLUGIN_DIR . '/includes');

        defined('ILIO_BLOCKS_ADMIN_DIR')
            || define('ILIO_BLOCKS_ADMIN_DIR', ILIO_BLOCKS_PLUGIN_DIR . '/admin');

        defined('ILIO_BLOCKS_ADMIN_INCLUDES_DIR')
            || define('ILIO_BLOCKS_ADMIN_INCLUDES_DIR', ILIO_BLOCKS_ADMIN_DIR . '/includes');

        defined('ILIO_BLOCKS_ADMIN_INCLUDES_URL')
            || define('ILIO_BLOCKS_ADMIN_INCLUDES_URL', ILIO_BLOCKS_PLUGIN_URL . '/admin/includes/');

        defined('ILIO_BLOCKS_FRONTEND_DIR')
            || define('ILIO_BLOCKS_FRONTEND_DIR', ILIO_BLOCKS_PLUGIN_DIR . '/frontend');
    }


    /**
     * Method that runs only when the plugin is activated.
     *
     * @since 1.0
     */
    public function ilio_blocks_initialize() {
        //if (!class_exists('Blocks_Db')) {
        //    require_once( ILIO_BLOCKS_INCLUDES_DIR . '/classes/class-db.php');
        //    $blocks_db = new Blocks_Db();
        //}
    }

    /**
     * Include Frontend Class
     *
     * @since 1.0
     */
    public function ilio_blocks_frontend() {

        /* Only load files if in the WordPress frontend. */
        if ( !is_admin() ) {
            /* Load the main settings file. */
            //require_once( ILIO_BLOCKS_INCLUDES_DIR . '/classes/class-blocks.php' );
            require_once( ILIO_BLOCKS_FRONTEND_DIR . '/frontend.php' );
            $class_blocks_display = new Ilio_Blocks_Frontend();
        } else {
            require_once( ILIO_BLOCKS_ADMIN_DIR . '/admin.php');
        }
    }

    /**
     * Loads the initial files needed by the plugin.
     *
     * @since 1.0
     */
    public function ilio_blocks_include() {
        /* Load the plugin functions file. */
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/common.php' );
    }

    /**
     * Load the Custom Post Type "Blocks"
     *
     * @since 1.0
     */
    public function register_cpt_blocks() {
        /* Include CPT creation file */
        //include_once( ILIO_BLOCKS_INCLUDES_DIR . '/blockss.post-type.php' );
    }

    public function acf_load_relationship_base_field_choices( $field ) {
        //$field['choices']['blocks_listing'] = pll__('[Blocks] Listing');
        return $field;
    }

    /**
	 * Loads the initial files ACF Fields.
	 *
	 * @since 1.0
	 */
	function ilio_include_acf_fields() {
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-list-block.php' );
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-text.php' );
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-quote.php' );
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-slider.php' );
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-info.php' );
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-ref.php' );
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-pictos.php' );
        require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-actus.php' );
		require_once( ILIO_BLOCKS_INCLUDES_DIR . '/acf-fields/acf-block-contact.php' );
	}

}

new Ilio_Blocks();
