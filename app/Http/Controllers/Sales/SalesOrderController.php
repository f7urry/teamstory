<?php
namespace App\Http\Controllers\Sales;

use App\DTO\StockDTO;
use App\Helper\CodeGenerator;
use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Http\Service\Inventory\StockService;
use App\Models\Admin\Party;
use App\Models\Core\TableType;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\SalesOrder;
use App\Models\Sales\SalesOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesOrderController extends Controller {

    public function index() {
        return view("pages.sales.sales-order.index");
    }
     public function list($var = null) {
        $qry = SalesOrder::query();
        return DatatableHelper::generate($var, $qry->get(), "salesorder", array("show"=>true))->make(true);
    }
    public function create(){
        return view("pages.sales.sales-order.create");
    }
    public function store(Request $request) {
        DB::beginTransaction();
        $so=new SalesOrder();
        $so->code=CodeGenerator::generate("SSO");
        $so->date=$request->date;
        $so->due_date=$request->due_date;
        $so->tax=$request->tax;
        $so->amount=$request->gtotal;
        $so->unpaid_amount=$request->gtotal;
        $so->reference=$request->reference;
        $so->note=$request->note;
        $so->party_id=$request->party_id;
        $so->status=SalesOrder::STATUS_UNPAID;
        $so->currency=$request->currency;
        $so->shipping_cost=$request->shipping_cost;
        $so->shipping_address_id=$request->shipping_address;

        if ($so->save()) {
            foreach ($request->item_id as $i=>$item) {
                $item=new SalesOrderItem();
                $item->qty=$request->quantity[$i];
                $item->free_qty=$request->free_qty[$i];
                $item->item_id=$request->item_id[$i];
                $item->custom_price_id=$request->custom_price_id[$i];
                $item->qty=$request->quantity[$i];
                $item->price=$request->price[$i];
                $item->discount=$request->discount[$i];
                $item->total=$request->total[$i];
                $item->sales_order_id=$so->id;
                $item->save();
            }
            DB::commit();
        }else{
            DB::rollback();
        }
        return redirect(url("/salesorder/".$so->id))->with(["message"=>"Success: Sales Order has been saved"]);
    }
    public function destroy(SalesOrder $salesorder) {
        $p = SalesOrder::find($salesorder->id);
        $p->delete();
        return redirect("/stockadjustment/")->with(["message"=>"Success: Sales Order has been deleted"]);
    }
    public function show(SalesOrder $salesorder) {
        $map['so'] = $salesorder;
        return view("pages.sales.sales-order.edit", $map);
    }
    public function update(Request $request, Item $item) {
    }

    public function options(Request $request) {
        $qry = DB::table(SalesOrder::tablename()." as s");
        $qry->join(Party::tablename()." as c","s.party_id","c.id");
        if ($request->term == '')
            $qry->orderBy("s.code", "asc");
        else{
            $qry->where(function($q) use($request){
                $q->where("c.party_name","like", "%$request->term%");
                $q->orWhere("s.code","like", "%$request->term%");
            });
        }
        if($request->status!='')
            $qry->where("s.status",$request->status);
        $qry->limit(10);
        return SelectHelper::generate($qry, "s.id", "concat(s.code,' - ',c.party_name)",true);
    }

    public function get(SalesOrder $salesorder){
        $so=SalesOrder::find($salesorder->id);
        $so->party=$so->party;
        $so->party->address=$so->party->address;
        return response()->json($so);
    }

}