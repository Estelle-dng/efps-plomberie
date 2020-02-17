<?php
/**
 * Database Tables Creation Class For Our Plugin
 *
 * @package WordPress
 * @subpackage Infinite Loop - Newsletter
 * @since 1.0
 * @author Infinit Loop
 */

class Ilio_Newsletter_Install {

	private $_charset = '';

	/**
	 * PHP5 constructor method.
	 *
	 * @since 2.0
	 */
	function __construct() {

		global $wpdb;

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		if (!empty($wpdb->charset)) {
			$this->_charset .= "DEFAULT CHARACTER SET $wpdb->charset";
		}

		if (!empty($wpdb->collate)) {
			$this->_charset .= " COLLATE $wpdb->collate";
		}
	}

	public function create_newsletter_table() {
		global $wpdb;

		$table = $wpdb->prefix . 'ilio_newsletter';

		$sql = "CREATE TABLE IF NOT EXISTS $table (
			id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			firstname VARCHAR(150) NOT NULL DEFAULT '',
			lastname VARCHAR(150) NOT NULL DEFAULT '',
			email VARCHAR(155) NOT NULL DEFAULT '',
			created_at DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
			lang VARCHAR(10) NOT NULL DEFAULT '',
			active SMALLINT(1) NOT NULL DEFAULT '1',
			UNIQUE KEY id (id),
			UNIQUE KEY email (email))
		" . $this->_charset . ";";
		dbDelta($sql);
	}

}
