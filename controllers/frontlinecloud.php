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
	private $request = array();

	public function __construct()
	{
		$this->request = ($_SERVER['REQUEST_METHOD'] == 'POST')
			? $_POST
			: $_GET;
	}

	function index()
	{
		if (isset($this->request['key']))
		{
			$frontlinecloud_key = $this->request['key'];
		}

		if (isset($this->request['s']))
		{
			$message_from = $this->request['s'];
			// Remove non-numeric characters from string
			$message_from = preg_replace('#[^0-9]#', '', $message_from);
		}

		if (isset($this->request['m']))
		{
			$message_description = $this->request['m'];
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
