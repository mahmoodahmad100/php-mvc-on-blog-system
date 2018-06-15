<?php

namespace System;

class Session
{

	/**
	 * the application object
	 *
	 * @var object
	 */
	private $app;

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
	 * start the session
	 *
	 * @return void
	 */
	public function start()
	{
		ini_set('session.use_only_cookies', 1);
		if(!session_id())
			session_start();
	}

}