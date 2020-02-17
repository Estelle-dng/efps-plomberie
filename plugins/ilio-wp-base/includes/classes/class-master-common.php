<?php

/**
 * Master class
 *
 * @package WordPress
 * @subpackage Infinite Loop BASE - @Plugin Principal
 * @since 1.0
 * @author Infinit Loop
 */
class Master_Common {

    private static $_instance = array();

    /**
     * Magic function :
     *     Exemple : Display my.template.php if method displayMyTemplate() is call
     */
    public function __call($name, $arguments = array()) {
        $function = explode(' ', trim(preg_replace('#([A-Z])#', ' $1', $name)));
        if ($function[0] == 'display') {
            unset($function[0]);
            $templateName = strtolower(implode('.', $function));
            $this->display_template($templateName, $arguments);
        }
    }

    /**
     * Return Stored Global Message In Session
     *
     * @return string|array
     */
    public function get_global_message() {
        if (isset($_SESSION['ilio_global_messages'])) {
            $messages = $_SESSION['ilio_global_messages'];
            unset($_SESSION['ilio_global_messages']);

            return $messages;
        }

        return FALSE;
    }

    /**
     * Store Global Message In Session
     * @param  array $config , string $message, string $type
     */
    public function set_global_message($title = '', $message = '', $type = 'error') {
        $_SESSION['ilio_global_messages']['title'] = $title;
        $_SESSION['ilio_global_messages']['message'] = $message;
        $_SESSION['ilio_global_messages']['type'] = $type;
    }

    /**
     * Method singleton
     * @param void
     * @return Singleton
     */
    public static function get_instance() {
        $class = get_called_class();

        if (!isset(self::$_instance[$class])) {
            self::$_instance[$class] = new static();
        }

        return self::$_instance[$class];
    }

    /**
     * Get plugin directory of child class
     * @return [string] Full path or directory
     */
    protected function get_child_plugin($plugin_name = FALSE) {
        $reflector = new ReflectionClass($this);
        $fn = $reflector->getFileName();

        if ($plugin_name) {
            return dirname(plugin_basename($fn));
        }

        return plugin_dir_path($fn);
    }

    /**
     * Display template $name.php from current_theme/plugins/plugin/views/
     * if not exist, search this template on current plugin
     * @param  [string] $name [Template name]
     */
    public function display_template($name, $vars = array()) {
        $plugin_path = $this->get_child_plugin();
        $plugin_name = $this->get_child_plugin(TRUE);

        extract($vars);

        $theme_file = locate_template('plugins/' . $plugin_name . '/views/' . $name . '.php');
        $template_file = $theme_file ? $theme_file : $plugin_path . 'views/' . $name . '.php';

        require($template_file);
    }
}
