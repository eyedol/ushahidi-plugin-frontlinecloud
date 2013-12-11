<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * FrontlineCloud Settings Controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi - http://source.ushahididev.com
 * @module	   FrontlineCloud Settings Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
*
*/

class Frontlinecloud_Settings_Controller extends Admin_Controller {
	public function index()
	{
		$this->template->this_page = 'addons';

		// Standard Settings View
		$this->template->content = new View("admin/addons/plugin_settings");
		$this->template->content->title = "FrontlineCloud Settings";

		// Settings Form View
		$this->template->content->settings_form = new View("frontlinecloud/admin/frontlinecloud_settings");

		// Do we have a frontlinecloud Key? If not create and save one on the fly
		$frontlinecloud = ORM::factory('frontlinecloud', 1);

		if ($frontlinecloud->loaded AND $frontlinecloud->frontlinecloud_key)
		{
			$frontlinecloud_key = $frontlinecloud->frontlinecloud_key;
		}
		else
		{
			$frontlinecloud_key = strtoupper(text::random('alnum',8));
			$frontlinecloud->frontlinecloud_key = $frontlinecloud_key;
			$frontlinecloud->save();
		}

		$this->template->content->settings_form->frontlinecloud_key = $frontlinecloud_key;
		$this->template->content->settings_form->frontlinecloud_link = url::site()."frontlinecloud/?key=".$frontlinecloud_key."&s=\${sender_number}&m=\${message_content}";
	}
}