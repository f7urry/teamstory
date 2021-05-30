<?php
namespace App\Http\Controllers\Inventory;

use App\DTO\StockDTO;
use App\Helper\CodeGenerator;
use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Http\Service\Inventory\StockService;
use App\Models\Core\TableType;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemGroup;
use App\Models\Inventory\StockAdjustment;
use App\Models\Inventory\StockAdjustmentDetail;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\Stock;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockAdjustmentController extends Controller {

    public function __construct() {
        $this->stockService=new StockService();
    }
    public function index() {
        return view("pages.inventory.stock-adjustment.index");
    }
     public function list($var = null) {
        $qry = StockAdjustment::query();
        return DatatableHelper::generate($var, $qry->get(), "stockadjustment", array("show"=>true))->make(true);
    }
    public function create(){
        $map['items']=Item::where("is_variant","!=",1)->get();
        $map['warehouses']=Warehouse::all();
        return view("pages.inventory.stock-adjustment.create",$map);
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
        return view("pages.inventory.stock-adjustment.edit", $map);
    }
    public function update(Request $request, Item $item) {
    }
    public function options(Request $request) {
    }
    public function get($param){
        $map['stock']=ItemRegisterDetail::where("barcode",$param)->with("item")->first();
        return response()->json($map);
    }

}