<?php

namespace App\Http\Controllers\Inventory;

use App\Helper\CodeGenerator;
use App\Models\Inventory\GoodsReceipt;
use App\Models\Inventory\Item;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use App\Helper\DatatableHelper;
use App\Http\Controllers\Controller;
use App\Http\Service\Inventory\StockService;
use App\Models\Core\TableType;
use App\Models\Inventory\Report\LedgerDetail;
use App\Models\Inventory\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GoodsReceiptController extends Controller {

    public function __construct() {
        $this->stockService=new StockService();
    }
    public function index()
    {
        return view("pages.inventory.goods-receipt.index");
    }

    public function list($var = null) {
        $qry = GoodsReceipt::query();
        return DatatableHelper::generate($var, $qry->get(), "goodsreceipt", array("show"=>true,"delete"=>true))->make(true);
    }

    public function create()
    {
        $map['uoms']=Uom::all();
        $map['items']=Item::where("is_variant","!=",1)->get();
        $map['warehouses']=Warehouse::all();
        return view("pages.inventory.goods-receipt.create", $map);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $goodsReceipt = GoodsReceipt::create($request->all());
        $goodsReceipt->code=CodeGenerator::generate("GR");
        if(isset($request->quantity) && count($request->quantity) > 0){
            $goodsReceipt->goodsReceiptItems()->createMany(
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
        if($goodsReceipt->save()){
            foreach ($goodsReceipt->goodsReceiptItems as $receiptItem) {
                $stock=new Stock();
                $stock->warehouse_id=$goodsReceipt->warehouse_id;
                $stock->barcode=$receiptItem->barcode;
                $stock->item_id=$receiptItem->item_id;
                $stock->qty=$receiptItem->quantity;
                $stock->grid_code=$goodsReceipt->grid_code;
                
                $ledger=new LedgerDetail();
                $ledger->date=$goodsReceipt->date;
                $ledger->reference_id=$goodsReceipt->id;
                $ledger->reference_no=$goodsReceipt->code;
                $ledger->reference_type=TableType::GOODS_RECEIPT;
                $this->stockService->stockIn($stock,$ledger);
            }
            DB::commit();
            return redirect(url("/goodsreceipt/".$goodsReceipt->id))->with(["message"=>"Success: Data berhasil disimpan"]);
        }
        DB::rollback();
        return redirect()->back()->with(["error"=>"Process Fail: Data gagal disimpan"]);
    }

    public function show(GoodsReceipt $goodsreceipt)
    {
        $map['goodsReceipt'] = $goodsreceipt;
        return view("pages.inventory.goods-receipt.edit", $map);
    }

    public function edit(GoodsReceipt $goodsreceipt)
    {
        $map['goodsReceipt'] = $goodsreceipt;
        return view("pages.inventory.goods-receipt.edit", $map);
    }

    public function update(Request $request, $id)
    {
        return redirect(url("/goodsreceipt/".$id))->with(["message"=>"Success: Data berhasil disimpan"]);
    }

    public function destroy(GoodsReceipt $goodsreceipt)
    {
        $goodsreceipt->goodsReceiptItems()->delete();
        $goodsreceipt->delete();
        return redirect("/goodsreceipt/")->with(["message"=>"Success: Data telah dihapus"]);
    }
    public function print(GoodsReceipt $goodsreceipt)
    {
        $map['goodsReceipt'] = $goodsreceipt;
        return view("pages.inventory.goods-receipt.print", $map);
    }
}
