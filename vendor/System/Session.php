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

	/**
	 * create new session
	 * 
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	/**
	 * get a session
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function get($key)
	{
		return $_SESSION[$key];
	}

	/**
	 * checkout whether the session exists or not
	 *
	 * @param string $key
	 * @return bool
	 */
	public function has($key)
	{
		return isset($_SESSION[$key]);
	}

	/**
	 * remove a session
	 *
	 * @param string $key
	 * @return void
	 */
	public function remove($key)
	{
		unset($_SESSION[$key]);
	}

	/**
	 * get the value from the session and  then unset the session
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function pull($key)
	{
		$value = $this->get($key);
		$this->remove($key);
		return $value;
	}

	/**
	 * get all sessions
	 *
	 * @return array
	 */
	public function all()
	{
		return $_SESSION;;
	}

	/**
	 * remove all sessions
	 *
	 * @return void
	 */
	public function destroy()
	{
		session_destroy();
	}

}