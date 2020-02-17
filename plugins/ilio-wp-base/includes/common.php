<?php
/**
 * Common Functions
 *
 * @package WordPress
 * @subpackage Infinite Loop BASE - @Plugin Principal
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_BASE_VERSION')) {
    exit;
}

/**
 * Get current language
 */
if (!function_exists('get_current_lang')) {
    function get_current_lang() {
        $lang = pll_current_language() ? pll_current_language() : pll_default_language();
        return $lang;
    }
}

/**
 * function to get the page relation
 *
 */
if (!function_exists('get_page_relation_id')) {
    function get_page_relation_id($name_relation) {
        include_once(ILIO_BASE_FRONTEND_DIR . '/class-ilio-frontend.php');
        $ilio_front = Ilio_Frontend::get_instance();

        $relation_page_id = $ilio_front->get_page_relation($name_relation);
        if ($relation_page_id) {
            return $relation_page_id;
        }

        return NULL;
    }
}


/**
 * Recursive search in array
 *
 * @return array
 */
if (!function_exists('search_key_arr')) {
    function search_key_arr($needle, $haystack, $parent = FALSE) {
        if (array_key_exists($needle, $haystack)) {
            return $haystack[$needle];
        }
        foreach ($haystack as $kelement => $element) {
            if (is_array($element) && search_key_arr($needle, $element, $parent)) {
                if ($parent) {
                    return array($kelement => $element[$needle]);
                }
                else {
                    return $element;
                }
            }
        }
        return FALSE;
    }
}

/**
 * Retrieve User Role
 */
if (!function_exists('get_user_role')) {
    function get_user_role() {
        global $current_user;
        $user_roles = $current_user->roles;
        $user_role = array_shift($user_roles);
        return $user_role;
    }
}

/**
 * Define Excerpt Length
 */
if (!function_exists('set_excerpt_length')) {
    function set_excerpt_length($length = 11) {
        add_filter('excerpt_length', create_function('$l', 'return ' . intval($length) . ';'), 999);
        add_filter('the_excerpt', create_function('$e', 'remove_all_filters( "excerpt_length", 999 ); return $e;'), 999);
    }
}

/**
 * Get exerpt from Post Object
 */
if (!function_exists('get_post_obj_excerpt')) {
    function get_post_obj_excerpt($content, $excerpt_length = 20) {
        if ('' != $content) {
            $text = strip_shortcodes($content);
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]>', $text);
            $excerpt_more = apply_filters('excerpt_more', ' ' . '(...)');
            $text = wp_trim_words($text, $excerpt_length, $excerpt_more);
        }
        return apply_filters('the_excerpt', $text);
    }
}

/**
 * Get page level
 */
if (!function_exists('get_page_level')) {
    function get_page_level($post_id) {
        if (!$post_id) {
            return '0';
        }
        $ancestors = get_post_ancestors($post_id);
        $depth = count($ancestors);
        return $depth;
    }
}

/**
 * Deep Search In Array
 *
 * @param mixed array
 * @return array
 */
if (!function_exists('search_in_array')) {
    function search_in_array($needle, $haystack, $key = FALSE, $preg = FALSE) {
        if ($preg && !$key) {
            if ($matches = preg_grep('/' . $needle . '/i', $haystack)) {
                return $matches;
            }
        }
        elseif ($preg && $key) {
            $cKeys = array_keys($haystack);
            foreach ($cKeys as $_cKey) {
                if (preg_match('/' . $needle . '/i', $_cKey)) {
                    return $haystack[$_cKey];
                }
            }
            if ($matches = preg_grep('/' . $needle . '/i', $haystack)) {
                return $matches;
            }
        }
        else {
            if (is_array($haystack) && in_array($needle, $haystack)) {
                if ($key) {
                    if (isset($haystack[$key]) && $haystack[$key] == $needle) {
                        return $haystack;
                    }
                }
                else {
                    return $haystack;
                }
            }
        }
        if (is_array($haystack)) {
            foreach ($haystack as $element) {
                if (is_array($element) && search_in_array($needle, $element, $key, $preg)) {
                    return $element;
                }
            }
        }
        return FALSE;
    }
}

/**
 * Convert string to clean URL
 *
 * @return array
 */

if (!function_exists('to_clean_url')) {
    function to_clean_url($str, $simple = TRUE) {
        if (!$simple) {
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
            $clean = strtolower(trim($clean, '-'));
            $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
        }
        else {
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
            $clean = strtolower(trim($clean, '-'));
        }
        return $clean;
    }
}

/**
 * Retrieve post by slug
 */
if (!function_exists('get_post_by_slug')) {
    function get_post_by_slug($slug) {
        $posts = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 1,
            'post_status' => 'publish'
        ));
        if (!$posts) {
            return FALSE;
        }
        else {
            return isset($posts[0]) ? get_permalink($posts[0]->ID) : FALSE;
        }
    }
}

/**
 * Function ACF Options
 */
if (!function_exists('fo')) {
    function fo($name, $pop = FALSE) {
        $op = get_field($name, 'options');
        $op = $pop ? ap($op) : $op;
        return $op;
    }
}

/**
 * Function ACF Options translate
 */
if (!function_exists('fol')) {
    function fol($name, $pop = FALSE) {
        add_filter('acf/settings/current_language', 'ilio_acf_settings_current_language', 20);
        $op = get_field($name, 'options');
        remove_filter('acf/settings/current_language', 'ilio_acf_settings_current_language', 20);
        $op = $pop ? ap($op) : $op;
        return $op;
    }
}

/**
 * Function ACF Fields
 */
if (!function_exists('f')) {
    function f($name, $id = FALSE, $pop = FALSE) {
        $field = get_field($name, $id);
        if ($field && $pop) {
            $op = ap($field);
            return $op;
        }
        return $field;
    }
}

/**
 * Remove Ptags
 */
function filterPtag($content) {
    return preg_replace('#<p(.*?)>(.*?)</p>#is', '$2<br/>', $content);
}

/**
 * Array POP
 */
if (!function_exists('ap')) {
    function ap($op) {
        if (is_array($op)) {
            $op = array_pop($op);
        }
        return $op;
    }
}

/**
 * Retrive Page Translation According to Polylang
 */
function get_t_trans($id, $perm = TRUE) {
    $tId = pll_get_post($id);
    if ($perm) {
        return get_permalink($tId);
    }

    return $tId;
}

/**
 * All Translation Codes
 */
function get_langs_pll($keys = FALSE) {
    $translations = pll_the_languages(array('raw' => 1));
    $langs = array();
    foreach ($translations as $_lang) {
        $langs[$_lang['slug']] = $_lang['name'];
    }
    if ($keys) {
        return array_keys($langs);
    }

    return $langs;
}

/**
 * @param $text
 *
 * @return mixed
 */
function clean_string($text) {
    $text = trim($text);
    $utf8 = array(
        '/[áàâãªä]/u' => 'a',
        '/[ÁÀÂÃÄ]/u' => 'A',
        '/[ÍÌÎÏ]/u' => 'I',
        '/[íìîï]/u' => 'i',
        '/[éèêë]/u' => 'e',
        '/[ÉÈÊË]/u' => 'E',
        '/[óòôõºö]/u' => 'o',
        '/[ÓÒÔÕÖ]/u' => 'O',
        '/[úùûü]/u' => 'u',
        '/[ÚÙÛÜ]/u' => 'U',
        '/ç/' => 'c',
        '/Ç/' => 'C',
        '/ñ/' => 'n',
        '/Ñ/' => 'N',
        '/–/' => '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u' => ' ', // Literally a single quote
        '/[\'\']/u' => ' ', // Simple quote
        '/[“”«»„]/u' => ' ', // Double quote
        '/ /' => ' ', // Nonbreaking space (equiv. to 0x160)
        '/\\\/u' => ''   // Backslashes
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $text);
}

/**
 * @param $text
 *
 * @return string
 */
function clean_string_tolower($text) {
    $text = strtolower(clean_string($text));
    return preg_replace('/ /', '-', $text);
}

/* --------------------------------------------------------------*/
/* ------------------------- ACF Hooks ------------------------- */
/* --------------------------------------------------------------*/

function ilio_option_acf_load_value($value, $post_id, $field) {
    if (strstr($field['_name'], 'option_lang')) {
        $lang = get_current_lang();

        if ($value) {

            // if string, decode value and keep the current language
            // else if array, decode only sub array and keep array structure.
            if (!is_array($value)) {
                $values = json_decode($value, TRUE);
                $value = isset($values[$lang]) ? $values[$lang] : NULL;
            }
            else {
                $value = isset($value[$lang]) ? json_decode($value[$lang]) : NULL;
            }

        }
    }

    return $value;
}

add_filter('acf/load_value', 'ilio_option_acf_load_value', 10, 3);


function ilio_option_acf_update_value($value, $post_id, $field) {
    if (strstr($field['_name'], 'option_lang') && !isset($field['sub_fields'])) {
        $lang = get_current_lang();

        // If repeater
        if ($field['parent'] && !is_numeric($field['parent'])) {
            global $wpdb;

            $rawValue = $wpdb->get_row(
                $wpdb->prepare(
                    "SELECT option_name FROM {$wpdb->options} WHERE option_value = %s",
                    $field['key']
                )
            );

            //$rawValue = $wpdb->get_row("SELECT option_name FROM $wpdb->options WHERE option_value = '" . $field['key'] . "'");
            if ($rawValue) {
                $tabValue = get_option(ltrim($rawValue->option_name, '_'));
            }
            else {
                $tabValue = NULL;
            }
        }
        else {
            $tabValue = get_option('options_' . $field['name']);
        }

        // if array, decode only sub array, to keep array structure
        // else if string, decode the return value
        if (!is_array($tabValue)) {
            $values = json_decode($tabValue, TRUE);
        }
        else {
            foreach ($tabValue as $key => $tabs) {
                $values[$key] = json_decode($tabs);
            }
        }

        // check if array to encode only values and keep returning array at the end
        // if string, return json encoded string
        if (!is_array($value)) {
            $values[$lang] = $value;
            $value = json_encode($values, JSON_UNESCAPED_UNICODE);
        }
        else {
            $values[$lang] = $value;
            $value = array();
            foreach ($values as $key => $val) {
                $value[$key] = json_encode($val, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    return $value;
}

add_filter('acf/update_value', 'ilio_option_acf_update_value', 10, 3);


function ilio_acf_load_field($field) {
    if (strstr($field['_name'], 'option_lang')) {
        if (strpos($_SERVER['PHP_SELF'], "post.php") === FALSE) {
            $field['label'] = $field['label'] . ' (<span class="infoField">Multilangue</span>)';
        }
    }
    return $field;
}

// acf/load_field - filter for every field
add_filter('acf/load_field', 'ilio_acf_load_field');

// HOOK global translate option
function ilio_acf_settings_default_language($language) {
    return 'fr';
}

add_filter('acf/settings/default_language', 'ilio_acf_settings_default_language', 10);

function ilio_acf_settings_current_language($language) {
    return pll_current_language();
}

function ilio_acf_settings_language($language) {
    if (is_admin()) {
        $option = get_current_screen();
        if (strstr($option->base, 'option_lang')) {
            return pll_current_language();
        }
    }

    return 'fr';
}

add_filter('acf/settings/current_language', 'ilio_acf_settings_language', 10);
