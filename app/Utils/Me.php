<?php
namespace App\Utils;

class Me
{
    public static function print($var, $die = true)
    {
        echo '<pre>';
        print_r($var);
        $die ? die(): '';
    }
}