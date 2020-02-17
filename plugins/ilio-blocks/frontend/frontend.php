<?php
/**
 * Frontend Class
 *
 * @package WordPress
 * @subpackage Infinit Loop : Blocks
 * @since 1.0
 * @author Infinit Loop
 */

if (!defined('ILIO_BLOCKS_VERSION')) exit;

/**
 * @since 1.0
 */
class Ilio_Blocks_Frontend extends Master_Common {

    /**
     * PHP5 constructor method.
     *
     * @since 1.0
     */
    function __construct() {
        /* Main Frontend Init */
        add_action('template_redirect', array( &$this, 'blocks_init_front' ) );
    }

    function blocks_init_front() {
        if (isset($_POST["contact"])) {
            $class_form = Ilio_FORM::forge("contact");

            $class_form->set_upload_folder('contact');

            $class_form->set_fields(array(
                array('name' => 'firstname', 'required' => 'true'),
                array('name' => 'lastname', 'required' => 'true'),
                array('name' => 'country', 'required' => 'true'),
                array('name' => 'city'),
                array('name' => 'phone'),
                array('name' => 'mail', 'required' => 'true'),
                array('name' => 'message'),
            ));

            $class_form->set_files(array(
                array('name' => 'file'),
            ));

            $class_form->set_values($_POST["contact"]);
            $verified = $class_form->check_submit();
            $class_form->upload_files();
        }
    }

    function display_list_blocks() {
        $blocks = get_field('ilio_blocs');

        $this->display_template('list.blocks', array(
                'blocks' => $blocks
            )
        );
    }

    function display_block($slug, $post) {
        $this->display_template('blocks/' . $slug, array(
                'block' => $post
            )
        );
    }

    function get_link_url($button) {
        if ($button["type"] == 'internal') {
            return $button["link_internal"];
        } else if ($button["type"] == 'external') {
            return $button["link_external"];
        }
    }

}
