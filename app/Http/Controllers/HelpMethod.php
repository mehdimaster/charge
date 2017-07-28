<?php namespace App\Http\Controllers;
class HelpMethod
{
    public static function random($length = 16)
    {
        $pool = '0123456789';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public static function checkAmount($amount)
    {
        if($amount >= 1000){
            if(($amount % 2 == 0 ) || ( $amount % 5 == 0 ) || $amount == 1000){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
}