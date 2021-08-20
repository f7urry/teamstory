<?php
namespace App\Http\Controllers\Sales\Report;

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
use App\Models\Sales\SalesOrder;
use Illuminate\Http\Request;

class SalesSummaryController extends Controller {

    public function index() {
        $map["warehouses"]=Warehouse::all();
        return view("pages.sales.report.sales-summary.index",$map);
    }
    
    public function store(Request $request) {
        $qry=SalesOrder::query();
        if($request->customer!=null)
            $qry->where("party_id","=", $request->customer);
        if($request->status!=null)
            $qry->where("status", $request->status);
        $qry->whereMonth("date", "=", $request->month);
        $qry->whereYear("date", "=", $request->year);
        $map["sales"]=$qry->get();
        return view("pages.sales.report.sales-summary.print", $map);
    }
}