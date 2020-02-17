<?php
/**
 * Common Functions
 *
 * @package WordPress
 * @subpackage Infinite Loop Theme
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_THEME_VERSION')) {
    exit;
}

/**
 * DISPLAY FUNCTIONS
 */
if (!function_exists('display_main_menu')) {
    /**
     * Display Main Menu
     */
    function display_main_menu() {
        global $class_theme_display;
        $class_theme_display->display_main_menu();
    }
}

if (!function_exists('display_head_page')) {
    /**
     * Display heade page
     */
    function display_head_page() {
        global $class_theme_display;
        $class_theme_display->display_head_page();
    }
}

if (!function_exists('display_front_slide')) {
    /**
     * Display Front Slide
     */
    function display_front_slide() {
        global $class_theme_display;
        $class_theme_display->display_front_slide();
    }
}

if (!function_exists('display_list_post')) {
    /**
     * Display List post
     */
    function display_list_post() {
        global $class_theme_display;
        $class_theme_display->display_list_post();
    }
}

if (!function_exists('display_filters_post')) {
    /**
     * Display filter post
     *
     */
    function display_filters_post() {
        global $class_theme_display;
        $class_theme_display->display_filters_post();
    }
}

/**
 * CONFIGURATION FUNCTIONS
 */
if (!function_exists('my_acf_google_map_api')) {
    /**
     * Add Google Maps API key for ACF PRO
     *
     * @param $api
     * @return mixed
     */
    function my_acf_google_map_api($api) {
        $apiKey = get_field('google_api_key', 'option');
        $api['key'] = $apiKey;

        return $api;

    }

    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
}

if (!function_exists('cc_mime_types')) {
    /**
     * Add SVG format support in Media Library
     *
     * @param $mimes
     * @return mixed
     */
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    add_filter('upload_mimes', 'cc_mime_types');
}

if (!function_exists('remove_admin_bar')) {
    /**
     * Remove admin bar if the user is not an administrator
     */
    function remove_admin_bar() {
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(FALSE);
        }
    }

    add_action('after_setup_theme', 'remove_admin_bar');
}

/**
 * SEARCH PARAMS FUNCTIONS
 */
if (!function_exists('check_in_params')) {
    /**
     * Check request params
     *
     * @param $name
     * @param $value
     * @return bool
     */
    function check_in_params($name, $value) {
        $var = isset($_REQUEST[$name]) ? $_REQUEST[$name] : FALSE;
        if ($var !== FALSE) {
            if (is_array($var)) {
                return in_array($value, $var);
            }
            else {
                return $var == $value;
            }
        }

        return FALSE;
    }
}

if (!function_exists('check_url_param')) {
    /**
     * Check if $param exists and if so, if its value is equals to $value
     * If $param is an array, check if value is in the array
     *
     * @param $param
     * @param $value
     * @param bool $return_bool
     * @return bool
     */
    function check_url_param($param = '', $value, $return_bool = TRUE) {
        if (is_array($param)) {
            if (in_array($value, $param)) {
                return $return_bool ? TRUE : $param;
            }
            return FALSE;
        }
        else {
            if ($value == FALSE && $return_bool == FALSE) {
                return $param;
            }
            if ($param == $value) {
                return $return_bool ? TRUE : $param;
            }
            return FALSE;
        }
    }
}

/**
 * DATES FUNCTIONS
 */
if (!function_exists('convert_datetime_to_acf')) {
    /**
     * Convert an input datepicker to acf value
     * @param $input_date
     * @return string
     */
    function convert_datetime_to_acf($input_date) {
        if ($input_date == '') {
            return $input_date;
        }

        $current_language = pll_current_language();

        // Change date format according to current language
        if ($current_language == 'fr') {
            $date = DateTime::createFromFormat('d/m/Y', $input_date);
        }
        else {
            $date = DateTime::createFromFormat('m/d/Y', $input_date);
        }

        /*if (strpos($input_date, '-') !== false) {
            $date = DateTime::createFromFormat('Y-m-d', $input_date);
        }
        else {
            $current_language = pll_current_language();

            // Change date format according to current language
            if ($current_language == 'fr') {
                $date = DateTime::createFromFormat('d/m/Y', $input_date);
            } else {
                $date = DateTime::createFromFormat('m/d/Y', $input_date);
            }
        }*/

        return $date->format('Ymd');
    }
}

if (!function_exists('convert_acf_datetime_to_value')) {
    /**
     * Convert an acf field to input datepicker value
     * @param $date
     * @return string
     */
    function convert_acf_datetime_to_value($date, $custom_format = FALSE, $fr_format = FALSE, $en_format = FALSE) {
        if ($date == '') {
            return $date;
        }

        if ($custom_format !== FALSE) {
            return date_i18n($custom_format, strtotime($date));
        }

        $current_language = pll_current_language();

        // Change date format according to current language
        if ($current_language == 'fr') {
            return date_i18n('d/m/Y', strtotime($date));
        }
        else {
            return date_i18n('m/d/Y', strtotime($date));
        }
    }
}

if (!function_exists('compare_dates')) {
    /**
     * Check if date A is before date B
     *
     * @param $date
     * @param bool $date_comparison
     */
    function compare_dates($date_a, $date_b = false) {
        if ($date_b == false) {
            $date_b = date('Ymd');
        }

        return $date_a < $date_b;
    }
}

/**
 * GENERAL FUNCTIONS
 */
if (!function_exists('ilio_truncate_text')) {
    /**
     * Truncate text until $limit
     *
     * @param $string
     * @param int $limit
     * @param string $suffix
     * @return string
     */
    function ilio_truncate_text($string, $limit = 100, $suffix = '...') {
        if (strlen($string) > $limit) {
            $parts = preg_split('/([\s\n\r]+)/', $string, NULL, PREG_SPLIT_DELIM_CAPTURE);
            $parts_count = count($parts);

            $length = 0;
            $last_part = 0;
            for (; $last_part < $parts_count; ++$last_part) {
                $length += strlen($parts[$last_part]);
                if ($length > $limit) {
                    break;
                }
            }

            return implode(array_slice($parts, 0, $last_part)) . $suffix;
        }
        return $string;
    }
}

if (!function_exists('ilio_log')) {
    function ilio_log($type = 'default', $message) {
        require_once ILIO_THEME_CLASSES_DIR . '/class-log.php';
        $ilio_log = new Ilio_Log();
        return $ilio_log->add_log($type, $message);
    }
}

