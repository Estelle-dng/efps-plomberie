<?php
/**
 * Parker et Parker Class Base
 *
 * @package WordPress
 * @subpackage Parker et Parker
 * @since Parker et Parker 1.0
 * @author Philippe BARTOLESCHI - Smart 7
 */

require_once(FUNCTIONS_PATH . 'class.admin.php'); // Edit login screen
require_once(FUNCTIONS_PATH . 'theme.functions.php'); // Include theme functions

/*================================================================================== */

/* Global Theme Base =============================================================== */

class parkerBase {

    public function init() {
        /**
         *  LANGUAGE & LOCALIZATION / SECURE KEY
         */
        // load the text domain for localization
        add_action('after_setup_theme', array(&$this, 'setup_theme'));

        /*
         * SCRIPTS
        */
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));

        /**
         *  IMAGES
         */
        // post thumbnail support
        add_theme_support('post-thumbnails');
        // Remove p tags on images
        add_filter('the_content', array(&$this, 'filter_image_tags'));

        /**
         *  WIDGETS
         */
        // Unregister default widgets
        add_action('widgets_init', array(&$this, 'unregister_default_widgets'));
    }

    /**
     *  Setup Theme
     */
    function setup_theme() {
        /* Langs */
        $lang_dir = get_template_directory() . '/languages';
        load_theme_textdomain('ilio', $lang_dir);

        add_theme_support('html5', array(
            'gallery',
            'caption'
        ));
    }

    /*
     * SCRIPTS
    */
    function enqueue_scripts() {
        wp_deregister_script('jquery');

        if (!is_admin()) {
            wp_enqueue_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', FALSE, NULL); // include jQuery
            wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', FALSE, NULL, TRUE);
            wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), NULL, TRUE);
            wp_enqueue_script('aos', get_template_directory_uri() . '/js/aos.js', array('jquery'), NULL, TRUE);
            wp_enqueue_script('createlogo', get_template_directory_uri() . '/js/createlogo.js', array('jquery'), NULL, TRUE);
            wp_enqueue_script('vivus', 'https://cdnjs.cloudflare.com/ajax/libs/vivus/0.4.1/vivus.min.js', array('jquery'), NULL, TRUE);
            wp_enqueue_script('sweet', get_template_directory_uri() . '/bower_components/sweetalert2/dist/sweetalert2.min.js',false,null);

            wp_enqueue_script('jstheme', get_template_directory_uri() . '/js/dist/global.js', array('jquery'), NULL, TRUE);
            wp_localize_script('jstheme', 'ajaxurl', admin_url('admin-ajax.php'));

            //wp_localize_script( 'jstheme', 'atVars', $jsVars );
        }
    }

    /**
     *  IMAGES
     */
    function filter_image_tags($content) {
        return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }

    /**
     *  WIDGETS
     */
    // Unregister default widgets
    function unregister_default_widgets() {
        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_RSS');
        unregister_widget('WP_Widget_Tag_Cloud');
    }
}