<?php
/**
 * Frontend Plugin Init
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
class Ilio_Newsletter_Front_Init extends Master_common {

	/**
	 * PHP5 constructor method.
	 *
	 * @since 1.0
	 */
	function __construct() {
		add_action('wp_enqueue_scripts', array( &$this, 'ilio_nl_enqueue_scripts' ) );
		add_action( 'template_redirect', array(&$this, 'check_post_newsletter') );
	}

	/**
     * Enqueue the frontend scripts
     */
    function ilio_nl_enqueue_scripts() {
        wp_enqueue_script('ilio_nlewsletter', ILIO_NL_PLUGIN_URL . '/js/ilio-newsletter.js', array('jquery'), NULL, true);
        wp_enqueue_script('max_length_plugin', ILIO_NL_PLUGIN_URL . '/js/maxlength.js', array('jquery'), null, true);
        wp_localize_script('ilio_nlewsletter', 'lpkru_l10n', $this->pkru_admin_l10n() );
    }

    function pkru_admin_l10n($key = false) {
        $data = array(
            'admin_ajax_uri'        => admin_url("admin-ajax.php"),
            'main_url'              => home_url( '/' ),
            'anonce'                => wp_create_nonce("ajax_ilio_protect_w3b"),
            'error_ajax'            => __('Une erreur est survenue lors de l\'enregistrement.', 'ilio_nl'),
        );

        if($key && array_key_exists($key, $data))
            return $data[$key];
        $params = array( 'l10n_print_after' => 'lpkru_l10n = ' . json_encode($data) . ';' );
        return $params;
    }

	/**
	 * Redirect Non Authorized Users
	 *
	 * @since 1.0
	 */
	function check_post_newsletter() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_POST['subscribe_newsletter'])) {
				if (isset($_POST['subscribe_newsletter_nonce']) && wp_verify_nonce($_POST['subscribe_newsletter_nonce'], 'subscribe_newsletter')) {
					$ilionl = new Ilio_Newsletter();
					$email = sanitize_email($_POST['email']);
					if ($email == "") {
						$title = pll__("Attention !");
						$message = pll__( "Un ou plusieurs champs n'ont pas été saisis." );
						$this->set_global_message( $title, $message, 'warning' );
						return false;
					}
					//It seems that FILTER_VALIDATE_EMAIL does not recognize correct email address
//					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//						$title = pll__("Attention !");
//						$message = pll__( "Veuillez saisir une adresse correcte." );
//						$this->set_global_message( $title, $message, 'warning' );
//						return false;
//					}
					$insert = $ilionl->insert_newsletter($email);
					$_POST = '';

					if ($insert == true) {
						if (fo('form_next') == 1) {
							$protect_email = base64_encode($email);
							$newsletter_form_page = fo('newsletter_form_page') . '?nltoken=' . $protect_email;
							wp_redirect($newsletter_form_page);
						}
					}
				}
			}
			if (isset($_POST['subscribe_newsletter_next'])) {
				if (isset($_POST['subscribe_newsletter_next_nonce']) && wp_verify_nonce($_POST['subscribe_newsletter_next_nonce'], 'subscribe_newsletter_next')) {
					$ilionl = new Ilio_Newsletter();
					$post = $_POST;
					if ($post['firstname'] == "" ||
						$post['lastname'] == ""
						) {
						$title = pll__("Attention !");
						$message = pll__( "Un ou plusieurs champs n'ont pas été saisis." );
						$this->set_global_message( $title, $message, 'warning' );
						return false;
					}
					$fields = array();
					$fields['firstname'] = sanitize_text_field($post['firstname']);
					$fields['lastname'] = sanitize_text_field($post['lastname']);
					$email = sanitize_email(base64_decode(sanitize_text_field($post['nltoken'])));
					$_POST = '';
					$insert = $ilionl->insert_newsletter_next($email, $fields);
				}
				else {
					wp_redirect(get_home_url());
				}
			}
		}
	}

	function display_newsletter_form_page() {
		$args = array(
				'hide_empty'        => false,
				'parent'            => '0',
		);
		$domains = get_terms('sheet-domain', $args);
		if (fo('form_next') == 1) {
			$token = $_GET['nltoken'] ? $_GET['nltoken'] : 'error';
		}
		else {
			$token = '';
		}
		$this->display_template('newsletter.form', array('domains' => $domains, 'token' => $token));
	}
}

new Ilio_Newsletter_Front_Init();
