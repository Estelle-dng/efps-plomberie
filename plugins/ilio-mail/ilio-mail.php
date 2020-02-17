<?php
/*
Plugin Name: Infinite Loop : Mail
Description: Mail management
Author: Infinit Loop
Version: 1.0
 */

/* Exit if accessed directly */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @since 1.0
 */
class Ilio_Mail {

    /**
     * PHP5 constructor method.
     *
     * @since 1.0
     */
    function __construct() {

        /* Defines constants */
        self::define_constants();

        /* Include common function file. */
        add_action('plugins_loaded', array(&$this, 'ilio_mail_include'), 12);
        /* Load the frontend files. */
        add_action('plugins_loaded', array(&$this, 'ilio_mail_frontend'), 13);
        /* Load the admin files. */
        add_action('plugins_loaded', array(&$this, 'ilio_mail_admin'), 14);
    }

    /*
     * Defines constants
     *
     * @since 1.0
     */
    static public function define_constants() {

        defined('ILIO_MAIL_VERSION')
        || define('ILIO_MAIL_VERSION', '1.0');

        defined('ILIO_MAIL_PLUGIN_NAME')
        || define('ILIO_MAIL_PLUGIN_NAME', basename(dirname(__FILE__)));

        defined('ILIO_MAIL_PLUGIN_BASENAME')
        || define('ILIO_MAIL_PLUGIN_BASENAME', ILIO_MAIL_PLUGIN_NAME . '/' . basename(__FILE__));

        defined('ILIO_MAIL_PLUGIN_DIR')
        || define('ILIO_MAIL_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

        defined('ILIO_MAIL_PLUGIN_URL')
        || define('ILIO_MAIL_PLUGIN_URL', untrailingslashit(plugins_url(ILIO_MAIL_PLUGIN_NAME)));

        defined('ILIO_MAIL_INCLUDES_DIR')
        || define('ILIO_MAIL_INCLUDES_DIR', ILIO_MAIL_PLUGIN_DIR . '/includes');

        defined('ILIO_MAIL_ADMIN_DIR')
        || define('ILIO_MAIL_ADMIN_DIR', ILIO_MAIL_PLUGIN_DIR . '/admin');

        defined('ILIO_MAIL_ADMIN_URL')
        || define('ILIO_MAIL_ADMIN_URL', ILIO_MAIL_PLUGIN_URL . '/admin');

        defined('ILIO_MAIL_ADMIN_INCLUDES_DIR')
        || define('ILIO_MAIL_ADMIN_INCLUDES_DIR', ILIO_MAIL_ADMIN_DIR . '/includes');

        defined('ILIO_MAIL_ADMIN_INCLUDES_URL')
        || define('ILIO_MAIL_ADMIN_INCLUDES_URL', ILIO_MAIL_PLUGIN_URL . '/admin/includes/');

        defined('ILIO_MAIL_FRONTEND_DIR')
        || define('ILIO_MAIL_FRONTEND_DIR', ILIO_MAIL_PLUGIN_DIR . '/frontend');
    }


    /**
     * Include Frontend Class
     *
     * @since 1.0
     */
    public function ilio_mail_frontend() {
        require_once(ILIO_MAIL_INCLUDES_DIR . '/classes/class-mail.php');
    }

    /**
     * Loads the admin functions and files.
     *
     * @since 1.0
     */
    public function ilio_mail_admin() {
        if (is_admin()) {
            require_once(ILIO_MAIL_ADMIN_DIR . '/admin.php');
        }
    }

    /**
     * Loads the initial files needed by the plugin.
     *
     * @since 1.0
     */
    public function ilio_mail_include() {
        require_once(ILIO_MAIL_INCLUDES_DIR . '/common.php');
    }
}

new Ilio_Mail();
