<?php

define('IS_AJAX', (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'));

function compressImage($source, $destination, $quality) {

    $info = getimagesize($source);
  
    if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);
  
    elseif ($info['mime'] == 'image/gif') 
      $image = imagecreatefromgif($source);
  
    elseif ($info['mime'] == 'image/png') 
      $image = imagecreatefrompng($source);  
    imagejpeg($image, $destination, $quality);
    
  }

  function storage_path($path = "")
  {
    return dirname(__DIR__).'/storage'.$path;
  }
  function public_path($path = "")
  {
    return dirname(__DIR__).'\\'.(PUBLIC_DIR).$path;
  }


  function is_email(string $str)
  {
    return filter_var($str, FILTER_VALIDATE_EMAIL);
  }


function response($data, $status = 200)
{
	return new Response($data, $status);
}


?>