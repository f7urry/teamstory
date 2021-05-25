<?php
namespace App\Service\Core;

use App\Models\Core\CodeSequence;

class CodeSequenceService {

    public function generate($prefix) {
        $year = date("Y");
        $month = date("m");
        $code = CodeSequence::where("year", $year)->where("month",$month)->where("prefix", $prefix)->first();
        if ($code == null) {
            $code = new CodeSequence();
            $code->year = $year;
            $code->month=$month;
            $code->prefix = $prefix;
            $code->seq_number = 0;
            $code->save();
        }
        $newcode = $prefix ."-". $year ."".$month."-". $this->__filler($prefix, ($code->seq_number + 1));
        $code->seq_number = $code->seq_number + 1;
        $code->update();
        return $newcode;
    }

   private function __filler($prefix, $num) {
        $filler = intval(CodeSequence::where("year", 0)->where("month",0)->where("prefix", "FILLER")->first()->seq_number);
        $filler = ($filler - strlen($num . ""));
        if ($filler < 0)
            abort(500, "CODE WITH PREFIX " . $prefix . " ALREADY EXCEED");
        $zero = "0";
        for ($i = 0; $i < $filler; $i ++)
            $zero .= "0";
        return $zero . $num;
    }
}
