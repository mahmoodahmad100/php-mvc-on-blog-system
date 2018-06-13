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
		$this->loadHelpers();
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
		if(strpos($class, "App") === 0)
		{
			$file = $this->file->to($class . '.php');
		}
		else
		{
			$file = $this->file->toVendor($class . '.php');
		}

		if($this->file->exists($file))
			$this->file->require($file);
	}

	/**
	 * loading the helpers
	 * 
	 * @return void
	 */
	private function loadHelpers()
	{
		$this->file->require($this->file->toVendor('helpers.php'));
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

	/**
	 * get an item from the container
	 * 
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->get($key);
	}

	/**
	 * get an item from the container
	 * 
	 * @param string $key
	 * @return mixed
	 */
	public function get($key)
	{
		return isset($this->container[$key]) ? $this->container[$key] : null;
	}

}
