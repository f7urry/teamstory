<?php
namespace App\Http\Controllers\Inventory;

use App\Helper\CodeGenerator;
use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Http\Service\Inventory\StockService;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemGroup;
use App\Models\Inventory\ItemRegister;
use App\Models\Inventory\ItemRegisterDetail;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\Stock;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemRegisterController extends Controller {

     public function __construct() {
        $this->stockService=new StockService();
    }
    public function index() {
        return view("pages.inventory.item-register.index");
    }
     public function list($var = null) {
        $qry = ItemRegister::query();
        return DatatableHelper::generate($var, $qry->get(), "itemregisters", array("show"=>true))->make(true);
    }
    public function create(){
        $map['items']=Item::where("is_variant","!=",1)->get();
        return view("pages.inventory.item-register.create",$map);
    }
    public function store(Request $request) {
        DB::beginTransaction();
        $itemregister=new ItemRegister();
        $itemregister->code=CodeGenerator::generate("ITR");
        $itemregister->date=$request->date;
        if ($itemregister->save()) {
            $itx=0;
            foreach ($request->item_id as $i=>$item) {
                for ($idx=0;$idx<$request->quantity[$i];$idx++) {
                    $itx++;
                    $stock=new ItemRegisterDetail();
                    $stock->barcode=CodeGenerator::createBarcode($itx);
                    $stock->item_id=$item;
                    $stock->item_register_id=$itemregister->id;
                    $stock->save();
                }
            }
            DB::commit();
        }else{
            DB::rollback();
        }
        return redirect(url("/itemregisters/".$itemregister->id));
    }
    public function destroy(Stock $itembarcode) {
        $p = Stock::find($itembarcode->id);
        $p->delete();
        return redirect("/itemregisters/")->with(["message"=>"Success: Data telah dihapus"]);
    }
    public function show(ItemRegister $itemregister) {
         $map['itemregister'] = $itemregister;
        return view("pages.inventory.item-register.print", $map);
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