<?php

namespace App\Http\Controllers\Inventory;

use App\Helper\CodeGenerator;
use App\Helper\DatatableHelper;
use App\Http\Controllers\Controller;
use App\Http\Service\Inventory\StockService;
use App\Models\Core\TableType;
use App\Models\Inventory\GoodsIssue;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Item;
use App\Models\Inventory\Report\LedgerDetail;
use App\Models\Inventory\Stock;
use App\Models\Inventory\Warehouse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GoodsIssueController extends Controller
{
    public function __construct() {
        $this->stockService=new StockService();
    }
    public function index()
    {
        return view("pages.inventory.goods-issue.index");
    }

    public function list($var = null) {
        $qry = GoodsIssue::query();
        return DatatableHelper::generate($var, $qry->get(), "goodsissue", array("show"=>true,"delete"=>true))->make(true);
    }

    public function create()
    {
        $map['uoms']=Uom::all();
        $map['items']=Item::where("is_variant","!=",1)->get();
        $map['warehouses']=Warehouse::all();
        return view("pages.inventory.goods-issue.create", $map);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $goodsissue = GoodsIssue::create($request->all());
        $goodsissue->code=CodeGenerator::generate("GI");
        if(isset($request->quantity) && count($request->quantity) > 0){
            $goodsissue->goodsIssueItems()->createMany(
                collect($request->quantity)->map(function($quantity, $key) {
                    return [
                        'item_id' => request('item_id')[$key],
                        'quantity' => $quantity,
                        'uom_id' => request('uom_id')[$key],
                        'barcode' => request('barcode')[$key],
                    ];
                })->toArray()
            );
        }

        if($goodsissue->save()){
            foreach ($goodsissue->goodsIssueItems as $issueItem) {
                $stock=new Stock();
                $stock->warehouse_id=$goodsissue->warehouse_id;
                $stock->barcode=$issueItem->barcode;
                $stock->item_id=$issueItem->item_id;
                $stock->qty=$issueItem->quantity;
                $stock->grid_code=$goodsissue->grid_code;

                $ledger=new LedgerDetail();
                $ledger->date=$goodsissue->date;
                $ledger->reference_id=$goodsissue->id;
                $ledger->reference_no=$goodsissue->code;
                $ledger->reference_type=TableType::GOODS_ISSUE;
                $this->stockService->stockOut($stock,$ledger);
            }
            DB::commit();
            return redirect(url("/goodsissue/".$goodsissue->id))->with(["message"=>"Success: Goods Issue has been saved"]);
        }
        DB::rollback();
        return redirect()->back()->with(["error"=>"Process Fail: Goods Issue fail to save"]);
    }

    public function show(GoodsIssue $goodsissue)
    {
        $map['goodsIssue'] = $goodsissue;
        return view("pages.inventory.goods-issue.edit", $map);
    }

    public function edit(GoodsIssue $goodsissue)
    {
        $map['goodsIssue'] = $goodsissue;
        return view("pages.inventory.goods-issue.edit", $map);
    }

    public function update(Request $request, $id)
    {
        return redirect(url("/goodsissue/".$id))->with(["message"=>"Success: Goods Issue has been updated"]);
    }

    public function destroy(GoodsIssue $goodsissue)
    {
        $goodsissue->goodsIssueItems()->delete();
        $goodsissue->delete();
        return redirect("/goodsissue/")->with(["message"=>"Success: Goods Issue has been deleted"]);
    }
    public function print(GoodsIssue $goodsissue)
    {
        $map['goodsIssue'] = $goodsissue;
        return view("pages.inventory.goods-issue.print", $map);
    }
}
