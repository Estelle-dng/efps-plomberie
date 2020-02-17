<?php
/**
 * Frontend Class
 *
 * @package WordPress
 * @subpackage Infinite Loop BASE - @Plugin Principal
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_BASE_VERSION')) exit;

/**
 * @since 1.0
 */
class Ilio_Frontend extends Master_Common {

    public $relations_tab = null;

    /**
     * PHP5 constructor method.
     *
     * @since 1.0
     */
    function __construct() {

        /* Enqueue Script */
        add_action('wp_enqueue_scripts', array( &$this, 'ilio_enqueue_scripts' ) );
    }

    public function get_page_relation($name_relation) {
        
        if (!$this->relations_tab) {
            $this->relations_tab = fo('pages_relationship');
        }

        foreach ($this->relations_tab as $relation) {
            if ($relation['relationship_base_field'] == $name_relation) {
                return pll_get_post($relation['page']);
            }
        }

        return null;
    }

    /**
     * Enqueue the frontend scripts
     */
    function ilio_enqueue_scripts() {
        wp_enqueue_script('iliocookie', ILIO_BASE_PLUGIN_URL . '/js/ilio-cookie.js', array('jquery'), NULL, true);
        wp_localize_script('iliocookie', 'liliouL10n', $this->iliou_admin_l10n() );
    }

    function iliou_admin_l10n($key = false) {
        $data = array(
            'adminAjaxUri'          => admin_url("admin-ajax.php"),
            'mainUrl'               => home_url( '/' ),
            'anonce'                => wp_create_nonce("Ajax_ilioProtectW3b"),
            'msgCookie'             => pll__('En poursuivant votre navigation sur ce site, vous acceptez l\'utilisation de cookies afin de réaliser des statistiques de visites', 'ilio'),
            'okCookie'              => pll__('Ok', 'ilio'),
        );

        if($key && array_key_exists($key, $data))
            return $data[$key];
        $params = array( 'l10n_print_after' => 'liliouL10n = ' . json_encode($data) . ';' );
        return $params;
    }
}
