<?php
namespace App\Http\Controllers\Inventory\Report;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemGroup;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\Report\LedgerSummary;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use Illuminate\Http\Request;

class LedgerSummaryController extends Controller {

    public function index() {
        $map["warehouses"]=Warehouse::all();
        return view("pages.inventory.report.ledger-summary.index",$map);
    }
    
    public function store(Request $request) {
        $qry=LedgerSummary::query();
        if($request->warehouse_id!=null)
            $qry=$qry->where("warehouse_id",$request->warehouse_id);
        if($request->date_from!=null)
            $qry=$qry->where("warehouse_id",$request->date_from);
        $map["stock"]=$qry->get();
        return view("pages.inventory.report.ledger-summary.print", $map);
    }
}