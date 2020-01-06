<?php

/**
 * Redirect
 */
class Redirect
{
	
	function __construct()
	{
		
	}

	public static function to($url = null)
	{
		if($url != null) {
			header('location:'.$url);
			exit;
		}
		return new static;
	}

	public function back()
	{
		header('location:'.$_SERVER['HTTP_REFERER']);
		exit;		
	}

	public function with(array $data)
	{
		$_SESSION['flash'] = $data;
	}
}
?>