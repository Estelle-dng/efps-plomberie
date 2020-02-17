<?php
/**
 * Admin Plugin Init
 *
 * @package WordPress
 * @subpackage Plugin Infinit Loop - Mail.
 * @since 1.0
 * @author Philippe BARTOLESCHI - Infinit Loop
 */

if (!defined('ILIO_MAIL_VERSION')) {
    exit;
}

/**
 * @since 1.0
 */
class Ilio_Mail_Admin extends Master_Common {

    /**
     * PHP5 constructor method.
     *
     * @since 1.0
     */
    public function __construct() {
        /* Admin Email Menu */
        add_action('admin_menu', array(&$this, 'ilio_email_menu'));
    }

    /**
     * Create email settings menu
     *
     * @since 1.0
     */
    public function ilio_email_menu() {
        /* Mail manager */
        $current_user = wp_get_current_user();
        if (sizeof($current_user->roles) > 0) {
            if ($current_user->roles[0] == "administrator") {

                add_menu_page(
                    __('Mails'),
                    __('Mails'),
                    'edit_posts',
                    'ilio_mail',
                    array(&$this, 'email_action'),
                    'dashicons-email-alt'
                );
            }
        }
    }

    /**
     * Emails Settings Save Action
     *
     * @since 1.0
     */
    public function email_action() {
        if (isset($_POST['ilio_email_settings'])) {
            $fields = ['email', 'name'];

            foreach ($fields as $f) {
                if (isset($_POST['ilio_email_settings'][$f]) && $_POST['ilio_email_settings'][$f] != '') {
                    update_option('ilio_email_settings_' . $f, $_POST['ilio_email_settings'][$f]);
                }
            }
        }

        $this->display_template('settings_emails', array());
    }
}

$ilio_mail_admin = new Ilio_Mail_Admin();
