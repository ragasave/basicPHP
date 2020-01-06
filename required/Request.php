<?php

    require_once __DIR__. '/RequestFile.php';
    require_once (__DIR__. '/RequestMethod.php');

    class Request
    {
        function __construct()
        {
                
        }
        
        public static function create(array $data)
        {
            $_REQUEST = $data;
        }

        public static function put(string $key, $value)
        {
            $_REQUEST[$key] = $value;
        }

        public static function all()
        {
            return (object) $_REQUEST;
        }
        public static function get(string $key)
        {
            return $_REQUEST[$key] ?? null;
        }
        public static function has(string $key)
        {
            return array_key_exists($key, $_REQUEST);
        }
        public static function hasFile(string $key)
        {
            return array_key_exists($key, $_FILES);
        }
        public static function file(string $key) :RequestFile
        {
            return new RequestFile($key);
            // return $_FILES[$key] ?? null;

        }

        public static function via() :RequestMethod
        {
            return new RequestMethod;
            // return $_FILES[$key] ?? null;

        }

        public function require(string $params)
        {
            
        }


        public function captcha()
        {
            
        }

        public static function validate(array $params )
        {
            $errors = [];
            foreach ($params as $key => $value) {
                $v = self::get($key);
                if($v == null){
                    $errors[$key] = 'The '.$key.' field is required.';
                    continue;
                }
                if(in_array('email', $value)&& !is_email($v)){
                    $errors[$key] = 'The '.$key.' must be a valid email address.';
                    continue;
                }
                if(in_array('digit', $value)&& !is_numeric($v)){
                    $errors[$key] = 'The '.$key.' must be a number.';
                    continue;
                }
                // response(isset($value['minlen']));
                // exit;
                if(isset($value['minlen']) && strlen($v) < $value['minlen']){
                    $errors[$key] = 'The '.$key.' must be at least '.$value['minlen'].'.';
                    continue;
                }
                if(isset($value['maxlen']) && strlen($v) > $value['maxlen']){
                    $errors[$key] = 'The '.$key.' may not be greater than '.$value['maxlen'].'.';
                    continue;
                }
            }
            return $errors;
        }

        public static function validateCaptcha($key)
        {
            if(self::has('g-recaptcha-response')){
                $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.self::get('g-recaptcha-response'));
                $response = json_decode($response); 
                return $response->success;  
            }
            return false;
        }

        public static function isAjax()
        {
            return IS_AJAX;
        }

    }

?>