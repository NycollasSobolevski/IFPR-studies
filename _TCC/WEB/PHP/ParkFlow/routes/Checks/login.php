<?php
class PageCheck
{
    public static function CheckLogin () {
        if(session_status() === PHP_SESSION_NONE){
            return false;
        }
        if(!isset($_SESSION['token'])){
            return false;
        }
        return true;
    }
}


?>