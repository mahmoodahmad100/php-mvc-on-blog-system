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
		
	}
}
