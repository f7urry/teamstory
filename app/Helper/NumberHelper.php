<?php

namespace App\Helper;

class NumberHelper{
    public static function toValue($string){
        return str_replace(",","",$string);
    }
}