<?php defined('SYSPATH') OR die('No direct script access.');
/**
* FrontlineCloud HTTP Post Controller
* Gets HTTP Post data from a frontlinecloud Installation
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Ushahidi Team <team@ushahidi.com>
 * @package	   Ushahidi - http://source.ushahididev.com
 * @module	   FrontlineCloud Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license	   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
*/

class Frontlinecloud_Controller extends Controller
{
	function index()
	{
		if (isset($_GET['key']))
		{
			$frontlinecloud_key = $_GET['key'];
		}

		if (isset($_GET['s']))
		{
			$message_from = $_GET['s'];
			// Remove non-numeric characters from string
			$message_from = preg_replace('#[^0-9]#', '', $message_from);
		}

		if (isset($_GET['m']))
		{
			$message_description = $_GET['m'];
		}

		if ( ! empty($frontlinecloud_key) AND ! empty($message_from) AND ! empty($message_description))
		{

			// Is this a valid frontlinecloud Key?
			$keycheck = ORM::factory('frontlinecloud')
				->where('frontlinecloud_key', $frontlinecloud_key)
				->find(1);

			if ($keycheck->loaded == TRUE)
			{
					sms::add($message_from, $message_description);
			}
		}
	}
}
