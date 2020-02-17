<?php

/**
 * Users Class For Our Plugin
 *
 * @package WordPress
 * @subpackage Infinite Loop - Newsletter
 * @since 1.0
 * @author Infinit Loop
 */
class Ilio_Newsletter {

    private $table_newsletter = 'ilio_newsletter';

    /*================================================================================== */
    /* DB TABLE ACTIONS ================================================================ */

    function insert_newsletter_register($fields) {
        global $wpdb;

        $table = $this->get_newsletter_table();

        // Check if user is already in newsletter table
        $sql = $wpdb->prepare("SELECT id FROM $table WHERE email = %s", $fields['email']);
        $req = $wpdb->get_var($sql);
        if (empty($req)) {
            $data = array(
                'firstname' => $fields['firstname'],
                'lastname' => $fields['lastname'],
                'email' => $fields['email'],
                'created_at' => current_time('mysql', 1),
                'lang' => pll_current_language('slug'),
                'active' => 1
            );
            $insert = $wpdb->insert($table, $data);
            if ($insert) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        return FALSE;
    }

    /**
     * Insert new email address
     *
     */
    function insert_newsletter($email) {
        global $wpdb;
        $ilio_user = new IlioUsers();
        $table = $this->get_newsletter_table();

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = $wpdb->prepare(
                "SELECT id FROM {$table} WHERE email = %s", $email
            );
            $req = $wpdb->get_var($sql);
            if (empty($req)) {
                $datas_newsletter = array(
                    'email' => $email,
                    'created_at' => current_time('mysql', 1),
                    'lang' => pll_current_language('slug')
                );
                if ($wpdb->insert($table, $datas_newsletter)) {
                    return TRUE;
                }
                else {
                    $title = pll__("Attention !");
                    $message = pll__('Erreur lors de la sauvegarde.');
                    $ilio_user->set_global_message($title, $message, 'error');
                    return FALSE;
                }
            }
            else {
                $sql = $wpdb->prepare(
                    "SELECT active FROM {$table} WHERE email = %s", $email
                );
                $req = $wpdb->get_var($sql);
                if ($req == 0) {
                    $data = array('active' => 1);
                    $where = array('email' => $email);
                    $update = $wpdb->update($table, $data, $where);
                    return TRUE;
                }
                else {
                    $title = pll__("Attention !");
                    $message = pll__('Vous êtes déjà inscrit à la newsletter.');
                    $ilio_user->set_global_message($title, $message, 'error');
                    return FALSE;
                }
            }
        }
        else {
            $title = pll__("Attention !");
            $message = pll__('Email non valide.');
            $ilio_user->set_global_message($title, $message, 'error');
            return FALSE;
        }
    }

    /**
     * Insert new fields
     *
     */
    function insert_newsletter_next($email, $fields) {
        global $wpdb;
        $table = $this->get_newsletter_table();
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = $wpdb->prepare(
                "SELECT id FROM {$table} WHERE email = %s", $email
            );
            $req = $wpdb->get_var($sql);
            if (empty($req)) {
                $title = pll__("Attention !");
                $message = pll__('Les informations renseignées ne sont pas correctes.');
                $this->set_global_message($title, $message, 'error');
                return FALSE;
            }
            else {
                $where = array('email' => $email);
                if ($wpdb->update($table, $fields, $where)) {
                    $title = pll__('Qualification de votre profil pour la newsletter thématique');
                    $message = pll__('Vos informations complémentaires ont bien été enregistrées. Nous vous remercions pour votre confiance.');
                    $this->set_global_message($title, $message, 'success');
                    return TRUE;
                }
                else {
                    $title = pll__("Attention !");
                    $message = pll__('Erreur lors de la sauvegarde.');
                    $this->set_global_message($title, $message, 'error');
                    return FALSE;
                }
            }
        }
        else {
            $title = pll__("Attention !");
            $message = pll__('Les informations renseignées ne sont pas correctes.');
            $this->set_global_message($title, $message, 'error');
            return FALSE;
        }
    }

    /**
     * Send mail to admin
     */
    function send_mail_newsletter($email) {
        $admin_email = get_option('admin_email');
        $subject = __('INSCRIPTION NEWSLETTER', 'ilio_nl');
        $body = __('Bonjour', 'ilio_nl') . ",\n" . __('Un internaute s\'est inscrit à la newsletter', 'ilio_nl') . "\n" . __('E-mail : ', 'ilio_nl') . $email;
        $body = utf8_decode($body);
        $headers = 'From: Newsletter <' . $admin_email . '>' . "rn" . 'Reply-To: ' . $admin_email;
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";

        $valid = mail($admin_email, $subject, $body, $headers);
    }



    /*================================================================================== */
    /* DB TABLE FUNCTIONS ============================================================== */

    /**
     * Get Status table name
     * @return string
     */
    public function get_newsletter_table() {
        global $wpdb;
        return $wpdb->prefix . $this->table_newsletter;
    }
}
