<?php
/**
 * Frontend Class
 *
 * @package WordPress
 * @subpackage Infinit Loop : Blank
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_BLANK_VERSION')) exit;

/**
 * @since 1.0
 */
class Ilio_Blank_Frontend extends Master_Common {

    /**
     * PHP5 constructor method.
     *
     * @since 1.0
     */
    function __construct() {
        /* Main Frontend Init */
        //add_action('template_redirect', array( &$this, 'blank_init_front' ) );
    }

    function display_single_blank() {
        $this->display_template('blank.single', array());
    }

}
