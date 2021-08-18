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
use App\Models\Inventory\GoodsIssue;
use App\Models\Inventory\GoodsIssueItem;
use App\Models\Inventory\Report\LedgerDetail;
use App\Models\Inventory\Stock;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\SalesOrder;
use App\Models\Sales\SalesOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesOrderController extends Controller {

    public function index() {
        return view("pages.sales.sales-order.index");
    }
     public function list($var = null) {
        $qry = SalesOrder::query();
        $qry->with("party");
        return DatatableHelper::generate($var, $qry->get(), "salesorder", array("show"=>true))->make(true);
    }
    public function create(){
        return view("pages.sales.sales-order.create");
    }
    public function store(Request $request) {
        DB::beginTransaction();
        $so=new SalesOrder();
        $so->code=CodeGenerator::generate("SSO");
        $so->invoice_code=CodeGenerator::generate("INV");
        $so->date=$request->date;
        $so->due_date=$request->due_date;
        $so->tax=NumberHelper::toValue($request->tax);
        $so->amount=NumberHelper::toValue($request->subtotal);
        $so->unpaid_amount=NumberHelper::toValue($request->subtotal)+NumberHelper::toValue($request->tax);
        $so->reference=$request->reference;
        $so->note=$request->note;
        $so->party_id=$request->party_id;
        $so->status=SalesOrder::STATUS_UNPAID;
        $so->sales_status=SalesOrder::STATUS_IN_PROCESS;
        $so->currency=$request->currency;
        $so->shipping_cost=NumberHelper::toValue($request->shipping_cost);
        $so->shipping_address_id=$request->shipping_address;
        $so->created_by=Auth::user()->id;

        if ($so->save()) {
            foreach ($request->item_id as $i=>$item) {
                $item=new SalesOrderItem();
                $item->qty=NumberHelper::toValue($request->quantity[$i]);
                $item->free_qty=$request->free_qty[$i];
                $item->item_id=$request->item_id[$i];
                $item->custom_price_id=NumberHelper::toValue($request->custom_price_id[$i]);
                $item->qty=NumberHelper::toValue($request->quantity[$i]);
                $item->price=NumberHelper::toValue($request->price[$i]);
                $item->discount=NumberHelper::toValue($request->discount[$i]);
                $item->total=NumberHelper::toValue($request->total[$i]);
                $item->sales_order_id=$so->id;
                $item->created_by=Auth::user()->id;
                $item->save();
            }

            $issued=new GoodsIssue();
            $issued->code=CodeGenerator::generate("GI");
            $issued->date=$request->date;
            $issued->warehouse_id=1;
            $issued->reference_type="SALES ORDER";
            $issued->reference_no=$so->code;
            $issued->save();
            foreach($so->items as $soi){
                $issuedItem=new GoodsIssueItem();
                $issuedItem->quantity=$soi->qty+$soi->free_qty;
                $issuedItem->item_id=$soi->item_id;
                $issuedItem->uom_id=$soi->item->uom_id;
                $issuedItem->goods_issue_id=$issued->id;
                $issuedItem->save();
            }
            $stockService=new StockService();
            foreach ($issued->goodsIssueItems as $issueItem) {
                $stock=new Stock();
                $stock->warehouse_id=$issued->warehouse_id;
                $stock->barcode=$issueItem->barcode;
                $stock->item_id=$issueItem->item_id;
                $stock->qty=$issueItem->quantity;
                $stock->grid_code=$issued->grid_code;

                $ledger=new LedgerDetail();
                $ledger->date=$issued->date;
                $ledger->reference_id=$issued->id;
                $ledger->reference_no=$issued->code;
                $ledger->reference_type=TableType::GOODS_ISSUE;
                $stockService->stockOut($stock,$ledger);
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
        return redirect("/salesorder/")->with(["message"=>"Success: Sales Order has been deleted"]);
    }
    public function show(SalesOrder $salesorder) {
        $map['so'] = $salesorder;
        return view("pages.sales.sales-order.edit", $map);
    }
    public function update(Request $request, SalesOrder $salesorder) {
        $salesorder=SalesOrder::find($salesorder->id);
        $gtotal=0;
        foreach($request->soi as $i=>$soi){
            $soi=SalesOrderItem::find($soi);
            $soi->qty=NumberHelper::toValue($request->qty[$i]);
            $soi->free_qty=NumberHelper::toValue($request->free_qty[$i]);
            $soi->discount=NumberHelper::toValue($request->discount[$i]);
            
            $total=($soi->price*$soi->qty);
            $soi->total=$total-($total*$soi->discount/100);
            $soi->update();
            
            $gtotal+=$soi->total;
        }
        $salesorder->amount=$gtotal;
        $salesorder->tax=$gtotal*10/100;
        $salesorder->unpaid_amount=NumberHelper::toValue($gtotal)+NumberHelper::toValue($salesorder->tax);
        $salesorder->update();
        return redirect("/salesorder/".$salesorder->id)->with(["message"=>"Success: Sales Order has been updated"]);
    }
    public function print(SalesOrder $salesorder) {
        $map['so'] = SalesOrder::with("party")->with("shipping_address")->find($salesorder->id);
        return view("pages.sales.sales-order.print", $map);
    }
    public function process(SalesOrder $salesorder) {
        $salesorder=SalesOrder::find($salesorder->id);
        $salesorder->sales_status=SalesOrder::STATUS_IN_PROCESS;
        $salesorder->update();

        $issued=new GoodsIssue();
        $issued->code=CodeGenerator::generate("GI");
        $issued->date=$salesorder->date;
        $issued->warehouse_id=1;
        $issued->reference_type="SALES ORDER";
        $issued->reference_no=$salesorder->code;
        $issued->save();

        foreach($salesorder->items as $soi){
            $issuedItem=new GoodsIssueItem();
            $issuedItem->quantity=$soi->qty;
            $issuedItem->item_id=$soi->item_id;
            $issuedItem->uom_id=$soi->item->uom_id;
            $issuedItem->goods_issue_id=$issued->id;
            $issuedItem->save();
        }

        $stockService=new StockService();
        foreach ($issued->goodsIssueItems as $issueItem) {
            $stock=new Stock();
            $stock->warehouse_id=$issued->warehouse_id;
            $stock->barcode=$issueItem->barcode;
            $stock->item_id=$issueItem->item_id;
            $stock->qty=$issueItem->quantity;
            $stock->grid_code=$issued->grid_code;

            $ledger=new LedgerDetail();
            $ledger->date=$issued->date;
            $ledger->reference_id=$issued->id;
            $ledger->reference_no=$issued->code;
            $ledger->reference_type=TableType::GOODS_ISSUE;
            $stockService->stockOut($stock,$ledger);
        }
        return redirect(url("/salesorder/".$salesorder->id))->with(["message"=>"Success: Sales Order has been processed"]);
    }
    public function make_delivery(Request $request,SalesOrder $salesorder){
        $salesorder=SalesOrder::find($salesorder->id);
        $salesorder->sales_status=SalesOrder::STATUS_ON_DELIVERY;
        $salesorder->update();
        return redirect(url("/salesorder/".$salesorder->id))->with(["message"=>"Success: Sales Order now on delivery"]);;
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