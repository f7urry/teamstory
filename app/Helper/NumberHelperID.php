<?php 

namespace App\Helper;

class NumberHelperID {
    public static function penyebut($nilai) {
        
        $nilai = round(abs($nilai));
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } elseif ($nilai <20) {
            $temp = self::penyebut($nilai - 10). " belas";
        } elseif ($nilai < 100) {
            $temp = self::penyebut($nilai/10)." puluh". self::penyebut($nilai % 10);
        } elseif ($nilai < 200) {
            $temp = " seratus" . self::penyebut($nilai - 100);
        } elseif ($nilai < 1000) {
            $temp = self::penyebut($nilai/100) . " ratus" . self::penyebut($nilai % 100);
        } elseif ($nilai < 2000) {
            $temp = " seribu" . self::penyebut($nilai - 1000);
        } elseif ($nilai < 1000000) {
            $temp = self::penyebut($nilai/1000) . " ribu" . self::penyebut($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            $temp = self::penyebut($nilai/1000000) . " juta" . self::penyebut($nilai % 1000000);
        } elseif ($nilai < 1000000000000) {
            $temp = self::penyebut($nilai/1000000000) . " milyar" . self::penyebut(fmod($nilai, 1000000000));
        } elseif ($nilai < 1000000000000000) {
            $temp = self::penyebut($nilai/1000000000000) . " trilyun" . self::penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public static function terbilang($nilai) {
        if ($nilai<0) {
            $hasil = "minus ". trim(self::penyebut($nilai));
        } else {
            $hasil = trim(self::penyebut($nilai));
        }
        return $hasil;
    }
}