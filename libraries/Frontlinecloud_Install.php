<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Performs install/uninstall methods for the FrontlineCloud Plugin
 *
 * @package    Ushahidi
 * @author     Ushahidi Team
 * @copyright  (c) 2008 Ushahidi Team
 * @license    http://www.ushahidi.com/license.html
 */
class Frontlinecloud_Install {

	/**
	 * Constructor to load the shared database library
	 */
	public function __construct()
	{
		$this->db =  new Database;
	}

	/**
	 * Creates the required columns for the frontlinecloud Plugin
	 */
	public function run_install()
	{

		// ****************************************
		// DATABASE STUFF
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `".Kohana::config('database.default.table_prefix')."frontlinecloud`
			(
				id int(11) unsigned NOT NULL AUTO_INCREMENT,
				frontlinecloud_key varchar(100) DEFAULT NULL,
				PRIMARY KEY (`id`)
			);
		");

	/**
	 * Drops the frontlinecloud Tables
	 */
	public function uninstall()
	{
		$this->db->query("DROP TABLE ".Kohana::config('database.default.table_prefix')."frontlinecloud;");
	}
}