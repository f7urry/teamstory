<?php
namespace App\Http\Controllers\Sales\Report;

use App\Http\Controllers\Controller;
use App\Models\Sales\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesOrderController extends Controller {

    public function yearlyAmount(Request $request){
        $map=array();
        for($i=1;$i<=12;$i++){
            $amount=SalesOrder::query();
            if($request->user!=null)
                $amount=$amount->where("created_by", Auth::user()->id);
            $amount=$amount->whereMonth("date",$i)
                ->select(DB::raw("sum(amount) as 'amount'"))
                ->first()
                ->amount;
            $map[]=($amount!=null)?$amount:0;
        }
        return ["amount"=>$map];
    }
    public function quotation_count(Request $request){
        $map=array();
        $amount=SalesOrder::query();
        if($request->user!=null)
                $amount=$amount->where("created_by", Auth::user()->id);
        $amount=$amount->whereMonth("date",date("m"))
            ->where("sales_status",SalesOrder::STATUS_WAITING)
            ->select(DB::raw("count(*) as 'amount'"))
            ->first()
            ->amount;
        return response()->json(["amount"=>$amount]);
    }
    public function invoice_count(Request $request){
        $map=array();
        $amount=SalesOrder::query();
        if($request->user!=null)
                $amount=$amount->where("created_by", Auth::user()->id);
        $amount=$amount->where("date",date("Y-m-d"))
            ->where("sales_status",SalesOrder::STATUS_IN_PROCESS)
            ->select(DB::raw("count(*) as 'amount'"))
            ->first()
            ->amount;
        return ["amount"=>$amount];
    }
    public function monthly_invoice(Request $request){
        $map=array();
        $amount=SalesOrder::query();
        if($request->user!=null)
                $amount=$amount->where("created_by", Auth::user()->id);
        $amount=$amount->where("status",SalesOrder::STATUS_PAID)
            ->whereMonth("date",date("m"))
            ->select(DB::raw("sum(amount) as 'amount'"))
            ->first()
        ->amount;
        $map[]=($amount!=null)?$amount:0;
        return ["amount"=>$map];
    }
    public function unpaid_invoice(Request $request){
        $map=array();
        $amount=SalesOrder::query();
        if($request->user!=null)
                $amount=$amount->where("created_by", Auth::user()->id);
        $amount=$amount->where("status",SalesOrder::STATUS_UNPAID)
            ->whereMonth("date",date("m"))
            ->select(DB::raw("sum(amount) as 'amount'"))
            ->first()
            ->amount;
        $map[]=($amount!=null)?$amount:0;
        return ["amount"=>$map];
    }
    public function best_customer(){
        $map=array();
        $amount=DB::select(DB::raw("SELECT p.party_name, sum(s.amount) as 'amount' FROM t_sales_order s JOIN m_party p ON s.party_id=p.id WHERE MONTH(s.date)=".intval(date("m"))." GROUP BY s.party_id"));
        return ["data"=>$amount];
    }

}