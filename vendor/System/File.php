<?php

namespace System;

class File
{
	/**
	 * directory separator
	 *
	 * @const DS
	 */
	const DS = DIRECTORY_SEPARATOR;

	/**
	 * root path
	 * 
	 * @var string
	 */
	private $root;

	/**
	 * setting up
	 *
	 * @param string $root
	 * @return void
	 */
	public function __construct($root)
	{
		$this->root = $root;
	}

	/**
	 * state whether the file exists or not
	 *
	 * @param string $file
	 * @return bool
	 */
	public function exists($file)
	{
		return file_exists($file);
	}

	/**
	 * requiring the file
	 *
	 * @param string $file
	 * @return void
	 */
	public function require($file)
	{
		require $file;
	}

	/**
	 * get the full path
	 *
	 * @param string $path
	 * @return string
	 */
	public function to($path)
	{
		return $this->root . static::DS .  str_replace(['/', '\\'], static::DS, $path);
	}

	/**
	 * get the file in the vendor directory
	 *
	 * @param string $file
	 * @return string
	 */
	public function toVendor($file)
	{
		return $this->to('vendor/'.$file);
	}
}
