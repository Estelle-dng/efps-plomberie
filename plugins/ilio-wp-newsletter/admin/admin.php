<?php
/**
 * Admin Plugin Init
 *
 * @package WordPress
 * @subpackage Infinite Loop - Newsletter
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_NL_VERSION')) exit;

/**
 * @since 1.0
 */
class Ilio_Newsletter_Admin_Init extends Master_Common {
    function __construct() {
        /* Admin menu */
        $this->_add_acf_menu_option();

		/* Admin Main Menu */
		add_action( 'admin_init', array( &$this, 'ilio_admin_redirect' ) );

		/* Admin Main Menu */
		add_action( 'admin_menu', array( &$this, 'ilio_admin_menu' ) );

        add_action('admin_head', array($this, 'add_css'));
    }

    function add_css() {
        echo '<style type="text/css">
            #toplevel_page_newsletter-settings { display:none; }
            </style>';
    }

    function ilio_admin_redirect() {
        if (isset($_POST['export']['newsletter'])) {
            $date = $_POST['export']['newsletter']['date_start'];

            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=newsletters.csv');

            // create a file pointer connected to the output stream
            $output = fopen('php://output', 'w');

            global $wpdb;
            $sql = "SELECT firstname, lastname, email, lang FROM " . $wpdb->prefix . "ilio_newsletter n";
            if ($date) {

                $date = Datetime::createFromFormat('d/m/Y', $date);
                $sql .= " WHERE n.created_at > '" . $date->format('Y-m-d 00:00:00') . "'";
            }

            $newsletters = $wpdb->get_results( $sql );

            // output the column headings
            $header = array('Firstname', 'Lastname', 'Lang', 'Email');

            fputcsv($output, $header, ';');

            if ($newsletters) {
                foreach ($newsletters as $newsletter) {
                    $toput = array(
                        $newsletter->firstname,
                        $newsletter->lastname,
                        $newsletter->email,
                        $newsletter->lang,
                    );

                    fputcsv($output, $toput, ';');
                }
            }
            die;
        }
    }

	/**
	 * Newsletter Export
	 *
	 * @since 1.0
	 */
	public function ilio_admin_export() {
        $this->display_template('export', array());
	}

	/**
	 * Register WP Admin Menu
	 *
	 * @since 0.0
	 */
	function ilio_admin_menu() {
        add_menu_page( 'Export-newsletter', 'Export-newsletter', 'manage_options', 'newsletter-settings', array(&$this, 'ilio_admin_export'));
	}

    protected function _add_acf_menu_option() {
        acf_add_options_page(array(
            'page_title'    => __('Newsletter Option'),
            'menu_title'    => __('Newsletter'),
            'menu_slug'     => 'newsletter-settings',
            'capability'    => 'edit_posts',
            'parent_slug'   => 'theme-general-settings',
            'autoload'      => false,
        ));
    }
}

new Ilio_Newsletter_Admin_Init();
