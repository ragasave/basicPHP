<?php

/**
 * Response
 */
class Response
{
	private $data;
	function __construct($data, $code = 200)
	{
		$this->data = $data;
		http_response_code($code);
		$json = json_encode($this->data);
		if($json != null){
			echo($json);
			$this->json();
		}else{
			echo($data);
		}
	}

	public function json()
	{
		header('Content-Type: application/json;charset=UTF-8');
	}
}
?>