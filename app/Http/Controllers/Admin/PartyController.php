<?php
namespace App\Http\Controllers\Admin;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;
use App\Models\Purchase\PurchaseOrder;
use App\Models\Sales\SalesOrder;
use Illuminate\Http\Request;

class PartyController extends Controller {

    public function get(Party $party){
        $party=Party::with("address")->find($party->id);
        return response()->json($party);
    }
    public function options(Request $request) {
        $party=Party::query();
        $party->with("address");
        if($request->role!='')
            $party->where("party_role",strtoupper($request->role));
        if($request->term=='')
            $party->orderBy("party_name","asc");
        else
            $party->where("party_name","like","%$request->term%");

        $party->limit(10);
        return SelectHelper::generate($party,"id","party_name");
    }
    
    public function get_transaction($id){
        $so=SalesOrder::where("party_id",$id);
        $sales=$so->count("*");
        $map['sales']=$sales;
        
        $po=PurchaseOrder::where("seller_id", $id);
        $purchase=$po->count("*");
        $map['purchase']=$purchase;
        
        $map['total']=$purchase+$sales;
        return $map;
    }
}