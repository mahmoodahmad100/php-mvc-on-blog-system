<?php

namespace System;

class File
{
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
}
