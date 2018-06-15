<?php

namespace System;

class Application
{
	/**
	 * container
	 *
	 * @var array
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
		$this->registerClasses();
		$this->loadHelpers();
	}

	/**
	 * run the application
	 * 
	 * @return void
	 */
	public function run()
	{
		$this->session->start();
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
		if(!$this->isShared($key)){
			if($this->isAlias($key))
				$this->share($key,$this->createObjectFromAlias($key));
			else
				die("this class not in the aliases");
		}
		return $this->container[$key];
	}

	/**
	 * checkout that the key exists or not
	 * 
	 * @param string $key
	 * @return bool
	 */
	private function isShared($key)
	{
		return isset($this->container[$key]);
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
	 * alias classes
	 *
	 * @return array
	 */
	private function aliases()
	{
		return [
			'request'		=> 'System\\Http\\Request',
			'response'		=> 'System\\Http\\Response',
			'load'			=> 'System\\Loader',
			'session'		=> 'System\\Session',
			'cookie'		=> 'System\\Cookie',
			'html'			=> 'System\\Html',
			'db'			=> 'System\\Database',
			'view'			=> 'System\\View\\ViewFactory',
		];
	}

	/**
	 * checking whether in the aliases array or not
	 *
	 * @param string $alias
	 * @return bool
	 */
	private function isAlias($alias)
	{
		$aliases = $this->aliases();
		return isset($aliases[$alias]);
	}

	/**
	 * create object from the alias
	 *
	 * @param string $alias
	 * @return object
	 */
	private function createObjectFromAlias($alias)
	{
		$aliases = $this->aliases();
		$alias   = $aliases[$alias];
		return new $alias($this);
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

}
