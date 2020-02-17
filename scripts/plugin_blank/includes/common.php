<?php
/**
 * Common functions
 *
 * @package WordPress
 * @subpackage Infinite loop : blank
 * @since 1.0
 */

/**
 * Display sheet single template
 *
 */
if(!function_exists('display_single_blank')) {
    function display_single_blank() {
        $front_blank_display = Ilio_Blank_Frontend::get_instance();
        $front_blank_display->display_single_blank();
    }
}
