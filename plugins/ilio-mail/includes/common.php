<?php

if (!function_exists('ilio_mail')) {
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
    function ilio_mail($to = '', $subject = '', $body = '', $attachments = array(), $template = 'body.php') {
        $mail_manager = Mail_Manager::get_instance();
        $sendMail = $mail_manager->send_mail($to, $data, $attachments, $template);
        return $sendMail;
    }
}