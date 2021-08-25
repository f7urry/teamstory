<?php
namespace App\Http\Controllers\Inventory\Report;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Report\LedgerDetail;
use App\Models\Inventory\Report\LedgerSummary;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use Illuminate\Http\Request;

class LedgerDetailController extends Controller {

    public function index() {
        $map["warehouses"]=Warehouse::all();
        return view("report.inventory.ledger-detail.index",$map);
    }
    
    public function store(Request $request) {
        $qry=LedgerDetail::query();
        if($request->warehouse_id!=null)
            $qry=$qry->where("warehouse_id",$request->warehouse_id);
        if($request->date_from!=null)
            $qry=$qry->where("warehouse_id",$request->date_from);
        $map["stock"]=$qry->get();
        return view("report.inventory.ledger-detail.print", $map);
    }
}