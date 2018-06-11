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
		$this->registerClasses();
		$this->share('file', $file);
	}

	/**
	 * register all classes
	 *
	 * @return void
	 */
	private function registerClasses()
	{
		spl_autoload_register([$this,"loadClass"]);
	}

	/**
	 * load the class
	 *
	 * @param string $class
	 * @return void
	 */
	public function loadClass($class)
	{
		
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
