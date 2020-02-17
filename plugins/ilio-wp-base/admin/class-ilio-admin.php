<?php
/**
 * Admin settings Plugin Init
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
class Ilio_Admin {

	/**
	 * PHP5 constructor method.
	 *
	 * @since 1.0
	 */
	function __construct() {
		/**
		 * Adding ACF Location Rule Operator combined with POLYLANG PLUGIN
		 */
		add_filter( 'acf/location/rule_types', array(&$this,'theme_lang_rules') );
		add_filter( 'acf/location/rule_operators', array(&$this,'theme_lang_operators') );
		add_filter( 'acf/location/rule_values/lang', array(&$this,'theme_lang_values') );
		add_filter( 'acf/location/rule_match/lang', array(&$this,'theme_lang_match'), 10, 3 );
		/**
		 * Create main Menu Option & Relation
		 */
		$this->_create_option_menu();
	}

	/**
	 * Adding ACF Location Rule (used by ACF Plugin)
	 */
	function theme_lang_rules($choices) {
		$choices['Langue']['lang'] = __('Langue courrante');
		return $choices;
	}

	/**
	 * Adding ACF Location Rule Operator (used by ACF Plugin)
	 */
	function theme_lang_operators( $choices ) {
		$choices['=='] = __('est égal à');
		$choices['!='] = __('n‘est pas égal à');
		return $choices;
	}

	/**
	 * Adding ACF Location Rule Values (used by ACF Plugin)
	 */
	function theme_lang_values($choices) {
		global $polylang;
		if ($polylang) {
			$languages = $polylang->model->get_languages_list();
			$choices['all'] = __('Toutes');
			if(count($languages) > 0) {
				foreach($languages as $lang) {
					$choices[$lang->slug] = $lang->name;
				}
			}
		}
		return $choices;
	}

	/**
	 * Matching ACF Location Rule (used by ACF Plugin)
	 */
	function theme_lang_match($match, $rule, $options) {
		global $polylang;
		$selected_lang = $rule['value'];
		$match = false;
		if ($polylang) {
			if($rule['operator'] == "==") {
				if($polylang->curlang) {
					$match = ( $polylang->curlang->slug == $selected_lang );
				}
				else {
					$match = ( $selected_lang == 'all' );
				}
			}
			elseif($rule['operator'] == "!=") {
				$match = ( $polylang->curlang && $polylang->curlang->slug != $selected_lang );
			}
		}
		return $match;
	}

	/**
	 * Create Relation Menu & Relation Option Group
	 */
	protected function _create_option_menu() {
		// Create Main Menu
		acf_add_options_page(array(
	        'page_title'    => __('Theme General Settings'),
	        'menu_title'    => __('Options'),
	        'menu_slug'     => 'theme-general-settings',
	        'capability'    => 'edit_posts',
	        'redirect'      => true
	    ));
	    // Create Relation Menu
	    acf_add_options_page(array(
			'page_title' 	=> __('Page Relations'),
			'menu_title'	=> __('Relations'),
			'menu_slug' 	=> 'page-relation-settings',
			'capability'	=> 'activate_plugins',
			'parent_slug'	=> 'theme-general-settings'
		));
	}


}

new Ilio_Admin();