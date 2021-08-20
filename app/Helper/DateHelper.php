<?php
namespace App\Helper;

use Illuminate\Support\Carbon;

class DateHelper{
    public static function monthList(){
        return array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    }
    public static function format($date){
        return date("d-m-Y",strtotime($date));
    }
    public static function formatDatetime($date){
        return date("d-m-Y H:i:s",strtotime($date));
    }
    public static function getDayname($date){
	    Carbon::now("Asia/Jakarta");
	    Carbon::setLocale('id');
        return Carbon::parse(strtotime($date))->translatedFormat("l, d F Y H:i");
    }
}