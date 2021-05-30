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
        $map['warehouses']=Warehouse::all();
        return view("pages.sales.sales-order.create",$map);
    }
    public function store(Request $request) {
        DB::beginTransaction();
        $adjustment=new StockAdjustment();
        $adjustment->code=CodeGenerator::generate("SKA");
        $adjustment->date=$request->date;
        $adjustment->warehouse_id=$request->warehouse_id;

        if ($adjustment->save()) {
            foreach ($request->item_id as $i=>$item) {
                $stock=new StockAdjustmentDetail();
                $stock->qty=$request->quantity[$i];
                $stock->barcode=$request->barcode[$i];
                $stock->item_id=$item;
                $stock->stock_adjustment_id=$adjustment->id;
                $stock->save();

                $dto=new StockDTO();
                $dto->warehouse_id=$adjustment->warehouse_id;
                $dto->barcode=$stock->barcode;
                $dto->qty=$stock->qty;
                $dto->item_id=$stock->item_id;
                $dto->date=$adjustment->date;
                $dto->reference_id=$adjustment->id;
                $dto->reference_code=$adjustment->code;
                $dto->reference_type=TableType::STOCK_ADJUSTMENT;
                $this->stockService->parse($dto);
            }
            DB::commit();
        }else{
            DB::rollback();
        }
        return redirect(url("/stockadjustment/".$adjustment->id));
    }
    public function destroy(Stock $itembarcode) {
        $p = Stock::find($itembarcode->id);
        $p->delete();
        return redirect("/stockadjustment/")->with(["message"=>"Success: Data telah dihapus"]);
    }
    public function show(StockAdjustment $stockadjustment) {
        $map['adjustment'] = $stockadjustment;
        return view("pages.sales.sales-order.edit", $map);
    }
    public function update(Request $request, Item $item) {
    }
    public function options(Request $request) {
        $qry = DB::table(SalesOrder::tablename()." as s");
        $qry->join(Item::tablename()." as p","s.product_id","p.id");
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
        return SelectHelper::generate($qry, "s.id", "c.party_name",true);
    }

    public function get(SalesOrder $salesorder){
        $so=SalesOrder::find($salesorder->id);
        $so->party=$so->party;
        $so->product=$so->product;
        $so->product->model=$so->product->model;
        $so->product->attr=$so->product->attr;
        return response()->json($so);
    }

}