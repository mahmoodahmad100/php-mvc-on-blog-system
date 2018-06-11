<?php

namespace System;

class Application
{
	/**
	 * container
	 *
	 * @var array $container
	 */
	private $container = [];

	/**
	 * setting up
	 *
	 * @param \System\File $file
	 * @return void
	 */
	public function __construct(File $file)
	{
		$this->share('file', $file);
	}

	/**
	 * set a new item to the container
	 *
	 * @param string $key
	 * @param mixid $value
	 * @return void
	 */
	public function share($key, $value)
	{	
		$this->container[$key] = $value;
	}
}
