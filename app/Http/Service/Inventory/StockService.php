<?php

namespace App\Http\Service\Inventory;

use App\DTO\StockDTO;
use App\Models\Inventory\Report\LedgerDetail;
use App\Models\Inventory\Report\LedgerSummary;
use App\Models\Inventory\Stock;
use App\Models\Inventory\Warehouse;
use Illuminate\Support\Facades\DB;

class StockService {
    public function parse(StockDTO $dto){
        $stock=new Stock();
        $stock->warehouse_id=$dto->warehouse_id;
        $stock->barcode=$dto->barcode;
        $stock->item_id=$dto->item_id;
        $stock->qty=$dto->qty;
        $stock->grid_code=$dto->grid_code;

        $ledger=new LedgerDetail();
        $ledger->date=$dto->date;
        $ledger->reference_id=$dto->reference_id;
        $ledger->reference_no=$dto->reference_code;
        $ledger->reference_type=$dto->reference_type;

        if($stock->qty>0)
            $this->stockIn($stock,$ledger);
        else
            $this->stockOut($stock,$ledger);
    }
    public function stockIn(Stock $stock,LedgerDetail $ledger){
        $exist=Stock::query();
        $exist=$exist->where("item_id",$stock->item_id);

        if($stock->barcode!=null)
            $exist=$exist->where("barcode",$stock->barcode);
        if($stock->grid_code!=null)
            $exist=$exist->where("grid_code",$stock->grid_code);
        if($stock->warehouse_id!=null)
            $exist=$exist->where("warehouse_id",$stock->warehouse_id);
        $exist=$exist->first();

        if ($exist!=null) {
            $exist->qty+=$stock->qty;
            $exist->warehouse_id=$stock->warehouse_id;

            if($stock->grid_code!=null)
                $exist->grid_code=$stock->grid_code;
            $exist->update();

            $stock->qty_in=$stock->qty;
        }else{
            $stock->save();
        }

        $ledger->warehouse_id=$stock->warehouse_id;
        $ledger->item_id=$stock->item_id;
        $ledger->qty_in=$stock->qty;

        if($stock->barcode!=null)
            $ledger->barcode=$stock->barcode;
        if($stock->grid_code!=null)
            $ledger->grid_code=$stock->grid_code;
        $this->ledgerAppend($ledger);
    }
    public function stockOut(Stock $stock,LedgerDetail $ledger){
        $exist=Stock::query();
        $exist=$exist->where("item_id",$stock->item_id);
        
        if($stock->barcode!=null)
            $exist=$exist->where("barcode",$stock->barcode);
        if($stock->grid_code!=null)
            $exist=$exist->where("grid_code",$stock->grid_code);
        if($stock->warehouse_id!=null)
            $exist=$exist->where("warehouse_id",$stock->warehouse_id);
        $exist=$exist->first();

        if ($exist!=null) {
            $exist->qty-=$stock->qty;
            $exist->warehouse_id=$stock->warehouse_id;

            if($stock->grid_code!=null)
                $exist->grid_code=$stock->grid_code;
            $exist->update();

            $stock->qty_out=$stock->qty;
        }else{
            $stock->save();
        }

        $ledger->warehouse_id=$stock->warehouse_id;
        $ledger->item_id=$stock->item_id;
        $ledger->qty_out=$stock->qty;

        if($stock->barcode!=null)
            $ledger->barcode=$stock->barcode;
        if($stock->grid_code!=null)
            $ledger->grid_code=$stock->grid_code;
        $this->ledgerAppend($ledger);
    }
    private function ledgerAppend($stock){
        $exist=LedgerSummary::query();
        if($stock->grid_code!=null)
            $exist=$exist->where("barcode",$stock->barcode);
        if($stock->barcode!=null)
            $exist=$exist->where("grid_code",$stock->grid_code);
            
        $exist=$exist->where("month",intval(date("m",strtotime($stock->date))))
                ->where("year",date("Y",strtotime($stock->date)))
                ->where("warehouse_id",$stock->warehouse_id)
                ->where("item_id",$stock->item_id);

        $exist=$exist->get()->first();
        if ($exist!=null) {
            $exist->qty_in+=$stock->qty_in;
            $exist->qty_out+=$stock->qty_out;
            $exist->update();
        }else{
            $ledger=new LedgerSummary();
            if($stock->barcode!=null)
                $ledger->barcode=$stock->barcode;
            if($stock->grid_code!=null)
                $ledger->grid_code=$stock->grid_code;

            $ledger->month=date("m",strtotime($stock->date));
            $ledger->year=date("Y",strtotime($stock->date));
            $ledger->item_id=$stock->item_id;
            $ledger->item_name=$stock->item->item_name;
            $ledger->warehouse_id=$stock->warehouse_id;
            $ledger->warehouse_name=Warehouse::find($stock->warehouse_id)->name;
            $ledger->qty_in=$stock->qty_in;
            $ledger->qty_out=$stock->qty_out;
            $ledger->save();
        }
        $this->ledgerDetailAppend($stock);
    }
    private function ledgerDetailAppend($stock){
        $ledger=new LedgerDetail();
        if($stock->grid_code!=null)
            $ledger->grid_code=$stock->grid_code;
        if($stock->barcode!=null)
            $ledger->barcode=$stock->barcode;

        $ledger->date=$stock->date;
        $ledger->reference_id=$stock->reference_id;
        $ledger->reference_no=$stock->reference_no;
        $ledger->reference_type=$stock->reference_type;
        $ledger->item_id=$stock->item_id;
        $ledger->item_name=$stock->item->item_name;
        $ledger->warehouse_id=$stock->warehouse_id;
        $ledger->warehouse_name=Warehouse::find($stock->warehouse_id)->name;
        $ledger->qty_in=$stock->qty_in;
        $ledger->qty_out=$stock->qty_out;
        $ledger->save();
    }
}