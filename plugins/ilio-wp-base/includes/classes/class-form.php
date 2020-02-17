<?php

/**
 * @package WordPress
 * @subpackage Infinite Loop BASE - @Plugin Principal
 * @since 1.0
 * @author Infinit Loop
 */
class Ilio_Form extends Master_Common {

    private static $_instance = array();

    public $_name = NULL;

    private $_fields;

    private $_gRecaptchaKey = NULL;

    private $_uploadFolder;

    private $_values;

    private $_errors = array();

    private $_files;

    /**
     * Method forge
     * @param void
     * @return Singleton
     */
    public static function forge($name) {

        if (!isset(self::$_instance[$name])) {
            self::$_instance[$name] = new static($name);
        }

        return self::$_instance[$name];
    }

    /**
     * Construct
     */
    function __construct($name = NULL) {
        $this->_name = $name;
    }

    /**
     * Set all values submited
     */
    public function set_values($values = array()) {
        $this->_values = $values;
    }

    /**
     * Set all waiting fields
     */
    public function set_fields($fields = array()) {
        $this->_fields = $fields;
    }

    /**
     * Get value for one field inside datas sended
     */
    public function get_field_value($field) {
        if (isset($values[$field])) {
            return $values[$field];
        }

        return NULL;
    }

    /**
     * Set recaptcha Google
     */
    public function set_google_recaptcha($key) {
        $this->_gRecaptchaKey = $key;
    }

    private function hasGRecaptcha() {
        if ($this->_gRecaptchaKey) {
            return TRUE;
        }

        return FALSE;
    }

    public function set_files($files = array()) {
        $this->_files = $files;
    }

    public function hasFile() {
        if ($this->_files) {
            return TRUE;
        }

        return FALSE;
    }

    public function set_error($error) {
        $this->_errors[] = $error;
    }

    public function get_errors() {
        return $this->_errors;
    }

    public function set_upload_folder($folder) {
        $this->_uploadFolder = $folder;
    }

    /**
     * Submit all fields
     */
    public function check_submit() {
        $verified = TRUE;
        $fields = $this->_fields; // required fields
        $values = $this->_values; // all values send

        if ($this->hasGRecaptcha()) {
            $recaptcha = recaptcha_init($this->_gRecaptchaKey);
            $sended = $_POST["g-recaptcha-response"];
            $response = $recaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $sended);

            if (!$response || !$response->success) {
                $this->set_error('Recaptcha false');
                $verified = FALSE;
            }
        }

        // foreach required fields
        foreach ($fields as $field) {
            // if this field is required
            if (isset($field['required']) && $field['required']) {
                if (!isset($values[$field['name']]) || $values[$field['name']] == '') {
                    $this->set_error('Field ' . $field['name'] . ' empty');
                    $verified = FALSE;
                }
                if ($field['name'] == 'mail' && !is_email($values[$field['name']])) {
                    $this->set_error('Field ' . $field['name'] . ' incorrect (required format: name@host.com)');
                    $verified = FALSE;
                }
            }
        }

        return $verified;
    }

    public function upload_files() {
        // Check file upload
        if ($this->hasFile()) {
            if ($_FILES) {
                $files = $_FILES["file"];
                $post_files = array();
                foreach ($files['name'] as $key => $value) {
                    if ($files['name'][$key]) {
                        // Reformat the file array
                        $file = array(
                            'name' => $files['name'][$key],
                            'type' => $files['type'][$key],
                            'tmp_name' => $files['tmp_name'][$key],
                            'error' => $files['error'][$key],
                            'size' => $files['size'][$key]
                        );
                        $_FILES = array("file" => $file);
                        foreach ($_FILES as $file => $array) {
                            $_file = $this->check_get_upload_link($_FILES);
                            if ($_file != FALSE) {
                                $post_files[] = $_file;
                            }
                        }
                    }
                }
                return $post_files;
            }
        }
        return FALSE;
    }

    private function upload_change_path($upload) {
        $upload["subdir"] = '/' . $this->_uploadFolder . '/' . $upload["subdir"];
        $upload["path"] = $upload["basedir"] . $upload["subdir"];
        $upload["url"] = $upload["baseurl"] . $upload["subdir"];

        return $upload;
    }

    /**
     * Launch all error on global session
     */
    public function send_global_errors() {
        foreach ($this->_errors as $error) {
            $this->set_global_message(
                pll__('Attention !'),
                $error,
                'error'
            );
        }
    }

    /**
     *
     * UPLOAD FUNCTIONS
     *
     */

    /**
     * Generate a random string for the filename
     * @param $length
     * @return string
     */
    public function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    /**
     * Temporary directory
     *
     * @since 1.0
     */
    public function wpse_183246_upload_dir($dirs) {
        //change the upload directory while the filter is active
        $dirs['subdir'] = '/recrutement';
        $dirs['path'] = $dirs['basedir'] . '/recrutement';
        $dirs['url'] = $dirs['baseurl'] . '/recrutement';

        return $dirs;
    }

    /**
     * Return uploaded file link
     * @param $files
     * @param int $post_id
     * @return bool|false|string
     */
    public function get_upload_link($files, $post_id = 0) {
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        //$post_id = 0 associates the media with nothing, otherwise, link the media with the $post_id
        add_filter('upload_dir', array(&$this, 'wpse_183246_upload_dir'));
        $attachment_id = media_handle_upload($files, $post_id);
        if (is_wp_error($attachment_id)) {
            remove_filter('upload_dir', array(
                &$this,
                'wpse_183246_upload_dir'
            ));

            return FALSE;
        }
        $attachment_url = get_attached_file($attachment_id);
        remove_filter('upload_dir', array(&$this, 'wpse_183246_upload_dir'));

        return $attachment_url;
    }

    /**
     * Check upload files
     * @param $files
     * @return bool
     */
    public function check_get_upload_link($files) {
        $validMime = array(
            'pdf' => 'application/pdf',
            //.pdf
            'doc' => 'application/msword',
            //.doc
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            //.docx
            'odt' => 'application/vnd.oasis.opendocument.text',
            //.odt
            'jpg' => 'image/jpeg',
            //.jpg
            'jpeg' => 'image/jpeg',
            'png' => 'image/png'

        );
        foreach ($files as $field => $file) {
            if ($file['error'] !== UPLOAD_ERR_OK) {
                //If the file cannot be uploaded
                $this->set_error("Erreur d'upload");
                return FALSE;
            }
            else {
                // $validation = get extension and mime-type of the file
                $validation = wp_check_filetype($file['name']);
                if (!array_key_exists($validation['ext'], $validMime)
                    || $validation['type'] != $validMime[$validation['ext']]
                ) {
                    // If the file extension is not in $validMime or the file mime-type is not in $validMime at the key "ext"
                    $this->set_error("Le fichier doit être au format .pdf, .doc, .docx ou .odt");
                    return FALSE;
                }
                else {
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    require_once(ABSPATH . 'wp-admin/includes/media.php');
                    $upload = $this->get_upload_link($field);
                    if ($upload !== FALSE) {
                        return $upload;
                    }
                    else {
                        $this->set_error("Erreur d'upload");

                        return FALSE;
                    }
                }
            }
        }
    }
}
