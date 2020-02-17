<?php
/**
 * Common Functions
 *
 * @package WordPress
 * @subpackage Infinite Loop - Newsletter
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_NL_VERSION')) exit;

/**
 * Display Form newsletter template
 *
 */
if(!function_exists('display_newsletter_form_page')) {
    function display_newsletter_form_page() {
        $front_newsletter_display = Ilio_Newsletter_Front_Init::get_instance();
        $front_newsletter_display->display_newsletter_form_page();
    }
}

/**
 * Add email to newsletter
 *
 * @return json
 */
add_action( 'wp_ajax_nopriv_pkr_newsletter_insert', 'pkr_newsletter_insert' );
add_action( 'wp_ajax_pkr_newsletter_insert', 'pkr_newsletter_insert' );
function pkr_newsletter_insert() {

    $email = $_POST['email'];

    if ($email) {
        $ilionl = new Ilio_Newsletter();
        $email = sanitize_email($email);
        $ret = $ilionl->insert_newsletter($email);
        if (!$ret) {
            $result['error'] = true;
            $result['msg']   = pll__( 'Erreur lors de la sauvegarde.', 'ilio' );
        } else {
            $result['error'] = false;
            $result['msg']   = pll__('votre email a bien été enregistré.', 'ilio');

            if (get_option('newsletter-email', 0)) {
                $ilionl->send_mail_newsletter($email);
            }
        }
    }

    echo json_encode($result);
    die();
}
