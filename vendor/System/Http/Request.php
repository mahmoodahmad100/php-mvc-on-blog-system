<?php

namespace System\Http;
use System\Application;

class Request
{
	/**
	 * the application object
	 *
	 * @var object
	 */
	private $app;

	/**
	 * url 
	 * 
	 * @var string
	 */
	private $url;

	/**
	 * setting up
	 *
	 * @param \System\Application $app
	 * @return void
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * prepare the URL
	 *
	 * @return void
	 */
	public function prepareUrl()
	{
		pre($_SERVER);
	}

	/**
	 * get the value from $_GET
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function get($key)
	{
		return get_array($_GET, $key);
	}

	/**
	 * get the value from $_POST
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function post($key)
	{
		return get_array($_POST, $key);
	}

	/**
	 * get the value from $_SERVER
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function server($key)
	{
		return get_array($_SERVER, $key);
	}


}
