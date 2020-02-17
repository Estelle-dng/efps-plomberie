<?php
/**
 * Admin Plugin Init
 *
 * @package WordPress
 * @subpackage Plugin Blank admin.
 * @since 1.0
 */

if (!defined('ILIO_BLANK_VERSION')) exit;

/**
 * @since 1.0
 */
class Ilio_Blank_Admin_Init extends Master_Common
{

    /**
     * PHP5 constructor method.
     *
     * @since 1.0
     */
    function __construct()
    {
        /* Admin Main Menu */
        //add_action('admin_init', array(&$this, 'Ilio_Admin_Redirect'));
    }
}

$ilio_blank_admin = new Ilio_Blank_Admin_Init();
