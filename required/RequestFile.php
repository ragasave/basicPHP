<?php

/**
 *  Request File
 */
class RequestFile
{
	private $file;
	public $name;
	public $extension;
	public $basename;
	function __construct(string $key)
	{
		$file = $_FILES[$key];
		$this->file = $file;
		$this->setName($file['name']);
	}

	public function rename(string $name) :RequestFile {
		$this->setName($name);
		return $this;
	}
	public function save(string $dir, string $name = null)
	{
		if(!preg_match('/[\/\\\]$/i', $dir)){
			$dir = $dir.'/';
		}
		$dir = realpath($dir).'/';
		if(!$dir || !is_dir($dir)){
			throw new Exception("Error: ".$dir. "Not Found", 1);
			
			return false;
		}
		if($name != null){
			$this->setName($name);
		}
		//print_r($this->file);
		//exit;
		if(move_uploaded_file($this->file["tmp_name"], $dir.$this->basename)){
			return true;
		}else{
			return false;
		}
		return $this;
	}

	public function saveWithThumb(string $dir, string $name = null)
	{
		if(!preg_match('/[\/\\\]$/i', $dir)){
			$dir = $dir.'/';
		}
		$dir = realpath($dir);
		if(!$dir || !is_dir($dir)){
			echo ("Error: ".$dir. "Not Found");
			return false;
		}
		$dir .= '/'; 
		if($name != null){
			$this->setName($name);
		}
		$thumb = $dir.'thumbnail/';
		if(!realpath($thumb) || !is_dir($dir)){
			mkdir($thumb);
		}
		$thumb = realpath($thumb).'/';
		compressImage($this->file["tmp_name"], $thumb.$this->basename, 0);
		if(move_uploaded_file($this->file["tmp_name"], $dir.$this->basename)){
			return true;
		}else{
			return false;
		}
		return $this;
	}
	private function setName (string $name){

		$path = pathinfo($name);
		$this->name = $path['filename'];
		$this->extension = $path['extension'];
		$this->basename = $path['basename'];
	} 
}
?>