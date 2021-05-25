<?php
namespace App\Helper;

use App\Service\Core\CodeSequenceService;

class CodeGenerator{
    public static function generate($prefix){
        $codeGen=new CodeSequenceService();
        return $codeGen->generate($prefix);
    }
    public static function createBarcode($id){

        if($id<10)
            $id="00000".$id;
        else if ($id<100 && $id>=10)
            $id="0000".$id;
        else if ($id<1000 && $id>=100)
            $id="000".$id;
        else if ($id<10000 && $id>=1000)
            $id="00".$id;
        else if ($id<100000 && $id>=10000)
            $id="0".$id;
        return "S".date("ymdHis").$id;
    }
}