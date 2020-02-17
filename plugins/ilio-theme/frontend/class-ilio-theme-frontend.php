<?php
/**
 * Frontend Class
 *
 * @package WordPress
 * @subpackage Infinite Loop Theme
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_THEME_VERSION')) exit;

/**
 * @since 1.0
 */
class Ilio_Theme_Frontend extends Master_Common {

    /* --------------------------------------------- */
    /* --------------  DIRECT DISPLAY -------------- */
    /* --------------------------------------------- */

    public function display_main_menu() {
        $items = fol('item_menu');
        $logo = get_field('logo', 'option');
        $logo_svg = get_field('logo_svg', 'option');

        $this->display_template('main.menu', array('items' => $items, 'logo' => $logo, 'logo_svg' => $logo_svg));
    }

    public function display_list_post() {
        $default_posts_per_page = get_option( 'posts_per_page' );

        $params = $_GET;

        // Retrieve author posts
        $paged = isset( $params['paged'] ) ? (int) $params['paged'] : 1;
        $posts_args = array(
            'posts_per_page' => $default_posts_per_page,
            'post_status'    => 'publish',
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
        );

        if (isset($params['skey'])) {
            $posts_args['s'] = $params['skey'];
        }

        if (isset($params['years'])) {
            $posts_args['date_query']['relation'] = 'OR';

            foreach ($params['years'] as $key => $year) {
                $posts_args['date_query'][] = ['year' => $year];
            }
        }

        if (isset($params['cats'])) {
            $posts_args['cat'] = implode(',', $params['cats']);
        }

        $wpquery = new WP_Query($posts_args);

        $this->display_template('list.post', array('wpquery' => $wpquery));
    }

    public function display_head_page() {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
        $img = isset($img[0]) ? $img[0] : null;

        $this->display_template('page.head', array('img' => $img, 'title' => get_the_title(), 'desc' => get_the_content()));
    }

    public function display_filters_post() {
        $years = [2017, 2018];

        $this->display_template('filter.post', array('years' => $years));
    }

    public function display_front_slide() {
        $items = get_fields();

        $this->display_template('front.slide', array('slides' => $items['homeslides']));
    }
}