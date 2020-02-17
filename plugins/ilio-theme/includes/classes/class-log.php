<?php

class Ilio_Log {
    protected $_logPath;

    public function __construct() {
        $this->_logPath = ILIO_THEME_LOGS_DIR;

        if (!file_exists($this->_logPath)) {
            mkdir($this->_logPath, 0777, TRUE);
        }
    }

    public function add_log($type = 'default', $message) {
        if (!$this->_logPath || !$type || !$message) {
            return FALSE;
        }

        $file = $this->_logPath . '/log.' . $type . '.log';

        if (!file_exists($file)) {
            $fp = fopen($file, "wb");
            fwrite($fp, '');
            fclose($fp);
        }
        $log_content = file_get_contents($file);

        $timeFormat = 'Y-m-d H:i:s';
        $currentDate = date_i18n($timeFormat);

        if (is_array($message)) {
            foreach ($message as $m) {
                $log_content .= $currentDate . ' : ' . $m . "\n";
            }
        }
        else {
            $log_content .= $currentDate . ' : ' . $message . "\n";
        }

        file_put_contents($file, $log_content);

        return TRUE;
    }
}