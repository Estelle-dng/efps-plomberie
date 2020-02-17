<?php

/**
 * Upload Class
 *
 * @package WordPress
 * @subpackage Infinite Loop BASE - @Plugin Principal
 * @since 1.0
 * @author Infinit Loop
 */
class Ilio_Upload {

    protected $_upload_path;


    public function __construct() {
        // Detect & create temp folder
        $this->_upload_path = ILIO_BASE_TMP_DIR;
        if (!file_exists($this->_upload_path)) {
            mkdir($this->_upload_path, 0755, TRUE);
        }
    }

    public function upload($file, $file_types = FALSE, $ext = FALSE, $max_size = FALSE, $upath = FALSE) {
        // A list of permitted file extensions
        $allowed = $file_types ? array_map('trim', explode(',', $file_types)) : array(
            'png',
            'jpg',
            'gif',
            'csv',
            'pdf',
            'doc',
            'docx',
            'xls',
            'xlsx'
        );
        if ($ext) {
            $allowed = array($ext);
        }
        // Init result
        $result['errors'] = FALSE;
        $result['success'] = FALSE;

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Check if allowed extension
        if (!in_array(strtolower($extension), $allowed)) {
            $result['errors'] = array(
                'type' => 'file_type',
                'name' => $file['name']
            );
            return $result;
        }
        // Check filesize
        $default_size = 2048;
        $max_size = $max_size ? (int) $max_size : $default_size;
        $max_size = $max_size > 1000 ? ($max_size / 1000) : $max_size;
        $max_size = ($max_size * 1024) * 1024; // MO TO KO
        if ((int) $file['size'] > (int) $max_size) {
            $result['errors'] = array(
                'type' => 'max_size',
                'name' => $file['name']
            );
            return $result;
        }

        // Move to upload dir
        $uid = uniqid();
        if ($upath) {
            $this->_upload_path = $upath;
        }

        if (move_uploaded_file($file['tmp_name'], $this->_upload_path . '/' . $uid . '_' . $file['name'])) {
            // Return filename
            $result['success'] = array(
                'id' => $uid,
                'name' => $file['name'],
                'file' => $this->_upload_path . '/' . $uid . '_' . $file['name']
            );
            return $result;
        }
        $result['errors'] = 'general';
        return $result;
    }

    public function delete($files) {

        if ($files && $files != "") {
            foreach ((array) $files as $_file) {
                if (file_exists($_file)) {
                    unlink($_file);
                }
            }
        }
    }

}