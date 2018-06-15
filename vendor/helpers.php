<?php

if(!function_exists('pre'))
{
	/**
	 * pre function
	 *
	 * @var mixed $var
	 * @return void
	 */
	function pre($var)
	{
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}
}

if(!function_exists('get_array'))
{
	/**
	 * get a value from the given array by providing the index($key) for this array
	 *
	 * @param array          $array
	 * @param string|integer $key
	 * @param mixed          $default
	 * @return mixed
	 */
	get_array($array, $key, $default = null)
	{
		return isset($array[$key]) ? $array[$key] : $default;
	}
}