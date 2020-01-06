<?php

	/**
	 * RequestMethod
	 */
	class RequestMethod
	{
		
		function __construct()
		{
			
		}

		public function post()
		{
		    if($_SERVER['REQUEST_METHOD'] != "POST"){
		        echo $_SERVER['REQUEST_METHOD']." method not supported";
		        exit();
		    }
		}

		public function get()
		{
		    if($_SERVER['REQUEST_METHOD'] != "GET"){
		        echo $_SERVER['REQUEST_METHOD']." method not supported";
		        exit();
		    }
		}
	}

?>