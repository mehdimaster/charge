<?php namespace App;
class HelpMethod
{
    public static function random($length = 16)
    {
        $pool = '0123456789';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}