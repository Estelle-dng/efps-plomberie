<?php
/**
 * Common functions
 *
 * @package WordPress
 * @subpackage Infinite loop : blocks
 * @since 1.0
 */

/**
 * Display sheet single template
 *
 */
if(!function_exists('display_single_blocks')) {
    function display_single_blocks() {
        $front_blocks_display = Ilio_Blocks_Frontend::get_instance();
        $front_blocks_display->display_single_blocks();
    }
}

if(!function_exists('display_list_blocks')) {
    function display_list_blocks() {
        $front_bloc_display = Ilio_Blocks_Frontend::get_instance();
        $front_bloc_display->display_list_blocks();
    }
}

if(!function_exists('display_block')) {
    function display_block($slug, $post) {
        $front_bloc_display = Ilio_Blocks_Frontend::get_instance();
        $front_bloc_display->display_block($slug, $post);
    }
}

if(!function_exists('get_link_url')) {
    function get_link_url($button) {
        $front_bloc_display = Ilio_Blocks_Frontend::get_instance();
        return $front_bloc_display->get_link_url($button);
    }
}