<?php
//Session
session_start();

class Session
{
    private static $flash = null;
    public static function clearFlash()
    {
        self::$flash = $_SESSION['flash']?? null;
        if(isset($_SESSION['flash'])){
            unset($_SESSION['flash']);
        } 
    }
    
    public static function getFlash()
    {

        return self::$flash;
    }

    public static function createFlash($data)
    {
        $_SESSION['flash'] = $data;
        self::$flash = $_SESSION['flash'];
    }
    public static function putFlash($key, $val)
    {
        if(isset($_SESSION['flash'])){
            $_SESSION['flash'][$key] = $val;
        }else{
            self::createFlash([$key => $val]);
        }
        self::$flash = $_SESSION['flash'];
    }
}
Session::clearFlash();

?>