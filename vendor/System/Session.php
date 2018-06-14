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

}