<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * The frontline cloud sender
 */
class Frontlinecloud_Sms_Provider implements Sms_Provider_Core {

	public function send($recipient = NULL, $from = NULL, $message = NULL)
	{

		$frontlinecloud = ORM::factory('frontlinecloud', 1);

		if ($frontlinecloud->loaded AND $frontlinecloud->frontlinecloud_key)
		{

			$data = array(
				"secret" => $frontlinecloud->frontlinecloud_key,
				"message" => $message,
				"recipients" => array( array("type" => "address",
					"value" => $recipient)

				)
			);
			$response = $this->_web_client($data);
			if (stristr($response, "message successfully queued"))
			{
				return TRUE;
			}
			return $response;
		}

		return "message successfully queued to send to 1 recipient(s);";
	}

	private function _web_client($data = array())
	{
		// Make sure cURL is installed
		if ( ! function_exists('curl_exec'))
		{
			throw new Kohana_Exception('HttpClient - cURL_not_installed');
			return FALSE;
		}

		$curl_handle = curl_init();

		// @TODO:: get the ID from the database to build the or the whole URL from the database
		$url = "https://cloud.frontlinesms.com/api/1/webconnection/651";

		$data_string = json_encode($data);
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl_handle, CURLOPT_POST, TRUE);
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
			'Content-Length: '.strlen($data_string)));
		$result = curl_exec($curl_handle);

		curl_close($curl_handle);
		return $result;

	}
}