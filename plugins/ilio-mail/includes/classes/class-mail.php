<?php

/**
 * Class manager mail
 */
class Mail_Manager {
    private static $_instance = NULL;

    function __construct() {
    }

    public static function get_instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Mail_Manager();
        }

        return self::$_instance;
    }

    /**
     * Send an email to $to address
     *
     * @param string $to Email recipient
     * @param string $subject Email subject
     * @param string $body Email content
     * @param array $attachments Email attachments
     * @param string $template Email template
     * @return bool
     */
    public function send_mail($to = '', $subject = '', $body = '', $attachments = array(), $template = 'body.php') {
        // Check if the email has recipient
        if ($to == '' || $subject == '' || $body = '') {
            return FALSE;
        }

        $fromName = get_option('ilio_email_settings_name') ?: get_bloginfo('name');
        $fromEmail = get_option('ilio_email_settings_email') ?: get_bloginfo('admin_email');

        $headers[] = 'From: ' . $fromName . ' <' . $fromEmail . '>';
        $headers[] = 'Content-Type: text/html; charset=UTF-8';

        ob_start();
        include(ILIO_MAIL_FRONTEND_DIR . '/views/' . $template);
        $message = ob_get_contents();
        ob_end_clean();

        wp_mail($to, $subject, $message, $headers, $attachments);

        return TRUE;
    }


}
