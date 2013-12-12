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
		$this->template->content->settings_form->frontlinecloud_link = url::site()."frontlinecloud";
		$this->template->content->settings_form->frontlinecloud_sender = "\${sender_number}";
		$this->template->content->settings_form->frontlinecloud_message = "\${message_content}";
		// setup and initialize form field names
		$form = array
		(
			'frontlinecloud_api_url' => ''
		);
		//  Copy the form as errors, so the errors will be stored with keys
		//  corresponding to the form field names
		$errors = $form;
		$form_error = FALSE;
		$form_saved = FALSE;

		// check, has the form been submitted, if so, setup validation
		if ($_POST)
		{
			// Instantiate Validation, use $post, so we don't overwrite $_POST
			// fields with our own things
			$post = new Validation($_POST);

			// Add some filters
			$post->pre_filter('trim', TRUE);

			// Add some rules, the input field, followed by a list of checks, carried out in order
			$post->add_rules('frontlinecloud_api_url', 'required', 'url');

			// Test to see if things passed the rule checks
			if ($post->validate())
			{
				// Yes! everything is valid
				$frontlinecloud->frontlinecloud_api_url = $post->frontlinecloud_api_url;
				$frontlinecloud->save();

				// Everything is A-Okay!
				$form_saved = TRUE;

				// repopulate the form fields
				$form = arr::overwrite($form, $post->as_array());
			}

			// No! We have validation errors, we need to show the form again,
			// with the errors
			else
			{
				// repopulate the form fields
				$form = arr::overwrite($form, $post->as_array());

				// populate the error fields, if any
				$errors = arr::overwrite($errors, $post->errors('frontlinecloud'));
				$form_error = TRUE;
			}
		}
		else
		{

			$form = array
			(
				'frontlinecloud_api_url' => $frontlinecloud->frontlinecloud_api_url
			);
		}

		// Pass the $form on to the settings_form variable in the view
		$this->template->content->settings_form->form = $form;

		// Other variables
		$this->template->content->errors = $errors;
		$this->template->content->form_error = $form_error;
		$this->template->content->form_saved = $form_saved;

	}
}