<?php
namespace App\Http\Controllers\Inventory;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemGroup;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\Stock;
use App\Models\Inventory\Uom;
use Illuminate\Http\Request;

class StockController extends Controller {

    public function index() {
    }
    
    public function list($var = null) {
    }

    public function create(){
    }
    public function store(Request $request) {
    }
    public function show(Item $item) {
    }

    public function update(Request $request, Item $item) {
    }
    public function destroy(Item $item) {
    }

    public function options(Request $request) {
        $qry = Stock::with("item")->join("m_item","t_stock.item_id","=","m_item.id");
        $qry->where("barcode", "like", "%$request->term%");
        $qry->limit(10);
        return SelectHelper::generate($qry, "t_stock.barcode", 'concat(barcode," / ",code," / ",item_name)',true);
    }
    public function get($fieldname,$param){
        $map['stock']=Stock::where($fieldname,$param)->with("item")->first();
        return response()->json($map);
    }
}