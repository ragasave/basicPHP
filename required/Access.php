<?php

require_once (__DIR__. '/RequestMethod.php');


/**
 * RouteAccess
 */
class Access
{
	
	public static function via()
	{
        return new RequestMethod;
	}

	public function requiredParams()
	{
		# code...
	}
}

?>