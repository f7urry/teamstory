<?php
namespace App\Http\Controllers\Sales\Report;

use App\Http\Controllers\Controller;
use App\Models\Sales\SalesOrder;
use Illuminate\Support\Facades\DB;

class SalesOrderController extends Controller {

    public function yearlyAmount(){
        $map=array();
        for($i=1;$i<=12;$i++){
            $amount=SalesOrder::query()->whereMonth("date",$i)->select(DB::raw("sum(amount) as 'amount'"))->first()->amount;
            $map[]=($amount!=null)?$amount:0;
        }
        return ["amount"=>$map];
    }

}