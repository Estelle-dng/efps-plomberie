<?php
/**
 * Parker et Parker functions and definitions
 *
 * @package WordPress
 * @subpackage Parker et Parker
 * @since Parker et Parker 1.0
 * @author Philippe BARTOLESCHI - Smart 7
 */

/*================================================================================== */
/* Global Theme Init =============================================================== */

/**
 * Constants Definitions
 **/
define('PATH', STYLESHEETPATH);
define('FUNCTIONS_PATH', PATH . '/library/');
define('HELPER_PATH', PATH . '/library/helpers/');
define('HELPER_URI', get_template_directory_uri().'/library/helpers/');

/**
 * Requires
 */
require_once (FUNCTIONS_PATH . 'class.base.php');

/**
 * Inits
 */
$parkerBase = new parkerBase();
$atLogin = new atLogin();

/**
 * Launch theme
 */
$parkerBase->init();
$atLogin->init();