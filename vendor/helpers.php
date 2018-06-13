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