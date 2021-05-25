<?php

namespace App\Http\Service\Inventory;

use App\Models\Inventory\Report\LedgerDetail;
use App\Models\Inventory\Report\LedgerSummary;
use App\Models\Inventory\Stock;
use App\Models\Inventory\Warehouse;
use Illuminate\Support\Facades\DB;

class StockService {
    public function stockIn(Stock $stock,LedgerDetail $ledger){
        $exist=Stock::query();
        $exist=$exist->where("barcode",$stock->barcode);
        $exist=$exist->where("item_id",$stock->item_id);
        if($stock->grid_code!=null)
            $exist=$exist->where("grid_code",$stock->grid_code);
        if($stock->warehouse_id!=null)
            $exist=$exist->where("warehouse_id",$stock->warehouse_id);
        $exist=$exist->first();

        if ($exist!=null) {
            $exist->qty+=$stock->qty;
            $exist->grid_code=$stock->grid_code;
            $exist->warehouse_id=$stock->warehouse_id;
            $exist->update();

            $stock->qty_in=$stock->qty;
        }else{
            $stock->save();
        }

        $ledger->warehouse_id=$stock->warehouse_id;
        $ledger->barcode=$stock->barcode;
        $ledger->item_id=$stock->item_id;
        $ledger->qty_in=$stock->qty;
        $ledger->grid_code=$stock->grid_code;
        $this->ledgerAppend($ledger);
    }
    public function stockOut(Stock $stock,LedgerDetail $ledger){
        $exist=Stock::query();
        $exist=$exist->where("barcode",$stock->barcode);
        $exist=$exist->where("item_id",$stock->item_id);
        if($stock->grid_code!=null)
            $exist=$exist->where("grid_code",$stock->grid_code);
        if($stock->warehouse_id!=null)
            $exist=$exist->where("warehouse_id",$stock->warehouse_id);
        $exist=$exist->first();

        echo $exist;
        if ($exist!=null) {
            $exist->qty-=$stock->qty;
            $exist->grid_code=$stock->grid_code;
            $exist->warehouse_id=$stock->warehouse_id;
            $exist->update();

            $stock->qty_out=$stock->qty;
        }else{
            $stock->save();
        }

        $ledger->warehouse_id=$stock->warehouse_id;
        $ledger->barcode=$stock->barcode;
        $ledger->item_id=$stock->item_id;
        $ledger->qty_out=$stock->qty;
        $ledger->grid_code=$stock->grid_code;
        $this->ledgerAppend($ledger);
    }
    private function ledgerAppend($stock){
        $exist=LedgerSummary::query()
                ->where("barcode",$stock->barcode)
                ->where("month",intval(date("m",strtotime($stock->date))))
                ->where("year",date("Y",strtotime($stock->date)))
                ->where("warehouse_id",$stock->warehouse_id)
                ->where("grid_code",$stock->grid_code)
                ->where("item_id",$stock->item_id);
        $exist=$exist->get()->first();
        if ($exist!=null) {
            $exist->qty_in+=$stock->qty_in;
            $exist->qty_out+=$stock->qty_out;
            $exist->update();
        }else{
            $ledger=new LedgerSummary();
            $ledger->month=date("m",strtotime($stock->date));
            $ledger->year=date("Y",strtotime($stock->date));
            $ledger->barcode=$stock->barcode;
            $ledger->item_id=$stock->item_id;
            $ledger->item_name=$stock->item->item_name;
            $ledger->warehouse_id=$stock->warehouse_id;
            $ledger->warehouse_name=Warehouse::find($stock->warehouse_id)->name;
            $ledger->grid_code=$stock->grid_code;
            $ledger->qty_in=$stock->qty_in;
            $ledger->qty_out=$stock->qty_out;
            $ledger->save();
        }
        $this->ledgerDetailAppend($stock);
    }
    private function ledgerDetailAppend($stock){
        $ledger=new LedgerDetail();
        $ledger->date=$stock->date;
        $ledger->barcode=$stock->barcode;
        $ledger->reference_id=$stock->reference_id;
        $ledger->reference_no=$stock->reference_no;
        $ledger->reference_type=$stock->reference_type;
        $ledger->item_id=$stock->item_id;
        $ledger->item_name=$stock->item->item_name;
        $ledger->warehouse_id=$stock->warehouse_id;
        $ledger->warehouse_name=Warehouse::find($stock->warehouse_id)->name;
        $ledger->grid_code=$stock->grid_code;
        $ledger->qty_in=$stock->qty_in;
        $ledger->qty_out=$stock->qty_out;
        $ledger->save();
    }
}